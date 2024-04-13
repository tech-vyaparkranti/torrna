<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialsRequest;
use App\Models\TestimonialsModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TestimonialsController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;
        
    /**
     * viewTestimonialsMaster
     *
     * @return void
     */
    public function viewTestimonialsMaster()
    {
        $approval_statuses = ["under_review"=>"Under Review","approved"=>"Approved","discarded"=>"Discarded"];
        return view("Dashboard.Pages.testimonialsAdmin",compact("approval_statuses"));
    }

    /**
     * saveTestimonialsMaster
     *
     * @param  mixed $request
     * @return void
     */
    public function saveTestimonialsMaster(TestimonialsRequest $request)
    {
        Cache::forget("testimonials");
        switch ($request->input("action")) {
            case "insert":
                $return = $this->insertData($request);
                break;
            case "update":
                $return = $this->updateData($request);
                break;
            case "enable":
                $return = $this->enableRow($request);
                break;
            case "disable":
                $return = $this->disableRow($request);
                break;
            default:
                $return = ["status" => false, "message" => "Unknown action.", "data" => null];
        }
        return response()->json($return);
    }
    
    /**
     * insertData
     *
     * @param  mixed $request
     * @return void
     */
    public function insertData(TestimonialsRequest $request)
    {
        $checkDuplicate = TestimonialsModel::
        where([
            [TestimonialsModel::CLIENT_NAME, $request->input(TestimonialsModel::CLIENT_NAME)],
            [TestimonialsModel::CLIENT_EMAIL, $request->input(TestimonialsModel::CLIENT_EMAIL)],
            [TestimonialsModel::REVIEW_TEXT, $request->input(TestimonialsModel::REVIEW_TEXT)],
            [TestimonialsModel::APPROVAL_STATUS, $request->input(TestimonialsModel::APPROVAL_STATUS)]
            ])->first();
        if ($checkDuplicate) {
            $return = $this->returnMessage("Service name is already taken");
        } else {
            $image = $this->saveImage($request);
            if ($image["status"]) {
                if(empty($request->input(TestimonialsModel::ITEM_PRIORITY))){
                    $maxId = TestimonialsModel::max(TestimonialsModel::ID);
                    $maxId++;
                    
                }else{
                    $maxId = $request->input(TestimonialsModel::ITEM_PRIORITY);
                }
                $createNewRow = new TestimonialsModel();
                $createNewRow->{TestimonialsModel::CLIENT_NAME} = $request->input(TestimonialsModel::CLIENT_NAME);
                $createNewRow->{TestimonialsModel::CLIENT_EMAIL} = $request->input(TestimonialsModel::CLIENT_EMAIL);
                $createNewRow->{TestimonialsModel::CLIENT_IMAGE} = $image["data"];
                $createNewRow->{TestimonialsModel::ITEM_PRIORITY} = $maxId;
                $createNewRow->{TestimonialsModel::REVIEW_TEXT} = $request->input(TestimonialsModel::REVIEW_TEXT);
                $createNewRow->{TestimonialsModel::APPROVAL_STATUS} = $request->input(TestimonialsModel::APPROVAL_STATUS);
                $createNewRow->{TestimonialsModel::STATUS} = 1;
                $createNewRow->{TestimonialsModel::CREATED_BY} = Auth::user()->id;
                $createNewRow->save();
                $return = $this->returnMessage("Saved successfully.", true);
            } else {
                return $image;
            }
            
        }
        return $return;
    }
    
    /**
     * saveImage
     *
     * @param  mixed $request
     * @return void
     */
    public function saveImage(TestimonialsRequest $request){
        $maxId = TestimonialsModel::max(TestimonialsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request, TestimonialsModel::CLIENT_IMAGE, "/website/uploads/testimonial_images/", "testimonial_$maxId",150,150);
        
    }
    
    /**
     * updateData
     *
     * @param  mixed $request
     * @return void
     */
    public function  updateData(TestimonialsRequest $request)
    {
        $new_image = "";
        if(!empty($request->input(TestimonialsModel::CLIENT_IMAGE))){
            $image =  $this->saveImage($request);
            if($image["status"]){
                $new_image = $image["data"];
            }else{
                return $image;
            }
        }
        
        $updateModel = TestimonialsModel::find($request->input(TestimonialsModel::ID));
        if($new_image){
            $updateModel->{TestimonialsModel::CLIENT_IMAGE} = $new_image;
        }
        $updateModel->{TestimonialsModel::CLIENT_NAME} = $request->input(TestimonialsModel::CLIENT_NAME);
        $updateModel->{TestimonialsModel::CLIENT_EMAIL} = $request->input(TestimonialsModel::CLIENT_EMAIL);
        $updateModel->{TestimonialsModel::ITEM_PRIORITY} = $request->input(TestimonialsModel::ITEM_PRIORITY);
        $updateModel->{TestimonialsModel::REVIEW_TEXT} = $request->input(TestimonialsModel::REVIEW_TEXT);
        $updateModel->{TestimonialsModel::APPROVAL_STATUS} = $request->input(TestimonialsModel::APPROVAL_STATUS);
        $updateModel->{TestimonialsModel::STATUS} = 1;
        $updateModel->{TestimonialsModel::UPDATED_BY} = Auth::user()->id;
        $updateModel->save();
        $return = $this->returnMessage("Saved successfully.", true);
        return $return;
    }
    
    /**
     * enableRow
     *
     * @param  mixed $request
     * @return void
     */
    public function enableRow(TestimonialsRequest $request)
    {
        $check = TestimonialsModel::where(TestimonialsModel::ID, $request->input(TestimonialsModel::ID))->first();
        if ($check) {
            $check->{TestimonialsModel::STATUS} = 1;
            $check->{TestimonialsModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Enabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }
    
    /**
     * disableRow
     *
     * @param  mixed $request
     * @return void
     */
    public function disableRow(TestimonialsRequest $request)
    {
        $check = TestimonialsModel::where(TestimonialsModel::ID, $request->input(TestimonialsModel::ID))->first();
        if ($check) {
            $check->{TestimonialsModel::STATUS} = 0;
            $check->{TestimonialsModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Disabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }
    
    /**
     * testimonialsData
     *
     * @return void
     */
    public function testimonialsData()
    {

        $query = TestimonialsModel::select(
            TestimonialsModel::CLIENT_NAME,
            TestimonialsModel::CLIENT_IMAGE,
            TestimonialsModel::CLIENT_EMAIL,
            TestimonialsModel::ITEM_PRIORITY,
            TestimonialsModel::REVIEW_TEXT,
            TestimonialsModel::APPROVAL_STATUS,
            TestimonialsModel::STATUS,
            TestimonialsModel::ID
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<a data-row_id="' . $row->{TestimonialsModel::ID} . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';

                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable(' . $row->{TestimonialsModel::ID} . ')" class="btn btn-danger btn-sm">Disable</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable(' . $row->{TestimonialsModel::ID} . ')" class="btn btn-primary btn-sm">Enable</a>';
                if ($row->{TestimonialsModel::STATUS} == 1) {
                    return $btn_edit . $btn_disable;
                } else {
                    return $btn_edit . $btn_enable;
                }
            })
            ->rawColumns(['action','review_text'])
            ->make(true);
    }

    public function getHomePageTestimonials(){
        $testimonials = Cache::rememberForever('testimonials', function () {
            return TestimonialsModel::where([
                [TestimonialsModel::STATUS,1],
                [TestimonialsModel::APPROVAL_STATUS,TestimonialsModel::APPROVED]
            ])
            ->select(TestimonialsModel::REVIEW_TEXT,DB::raw("concat('".url("/")."',".TestimonialsModel::CLIENT_IMAGE.") as ".TestimonialsModel::CLIENT_IMAGE),
            TestimonialsModel::CLIENT_NAME)->orderBy(TestimonialsModel::ITEM_PRIORITY,"asc")
            ->get();
        });
        if(empty($testimonials)){
            Cache::forget("testimonials");
        }
        return response()->json($testimonials);
    }
    public function getTestimonialRowData(Request $request){
        try{
            if($request->input("id")){
                $testimonials = TestimonialsModel::find($request->input("id"));
                if($testimonials){
                    $return = $this->success("Success",$testimonials);
                }else{
                    $return = $this->error("No data found.",200);
                }
            }else{
                $return = $this->error("Id is required.",200);
            }
        }catch(Exception $exception){
            $this->reportException($exception);
            $return = $this->error("Something went wrong.",200);
        }
        return $return;
    }
}
