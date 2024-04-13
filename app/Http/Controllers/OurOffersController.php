<?php

namespace App\Http\Controllers;

use App\Http\Requests\OurOffersRequest;
use App\Models\OurOffersModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OurOffersController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Dashboard.Pages.ourOffersAdmin");
    }

     

    /**
     * Store a newly created resource in storage.
     *
     * @param  OurOffersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurOffersRequest $request)
    {
        Cache::forget("ourOffers");
        if(in_array($request->input("action"),["enable","disable"])){
            $return = $this->enableDisable($request);
        }else{
            $checkDuplicate = OurOffersModel::where(OurOffersModel::OFFER_NAME, $request->input(OurOffersModel::OFFER_NAME))->first();

            if (!empty($checkDuplicate) && $checkDuplicate->{OurOffersModel::ID}!=$request->input(OurOffersModel::ID)) {
                $return = $this->error("Offer name is already taken",200);
            } else {
                if($request->input(OurOffersModel::ID)){
                    $object = OurOffersModel::find($request->input(OurOffersModel::ID));
                    if(empty($object)){
                        return $this->error("Offer details not found.",200);
                    }
                }else{
                    $object = new OurOffersModel();
                }
                
                $object->{OurOffersModel::OFFER_NAME} = $request->input(OurOffersModel::OFFER_NAME);
                if($request->file(OurOffersModel::OFFER_IMAGE)){
                    $image = $this->ourServiceImageUpload($request);
                    if ($image["status"]) {
                        $object->{OurOffersModel::OFFER_IMAGE} = $image["data"];
                    }else{
                        return $this->error($image["message"]??"Image upload fail.",200);
                    }
                }
                $object->{OurOffersModel::STATUS} = 1;
                $object->{OurOffersModel::CREATED_BY} = Auth::user()->id;
                $object->save();
                $return = $this->success("Saved successfully.", []);
            }
        }
        return $return;
    }
    public function enableDisable(OurOffersRequest $request)
    {
        $ourOffersModel = OurOffersModel::find($request->input("id"));
        if($ourOffersModel){
            Cache::forget("ourOffers");
            $action = request()->input("action");
            $ourOffersModel->{OurOffersModel::UPDATED_BY} = Auth::id();
            if($action=="disable"){
                $ourOffersModel->{OurOffersModel::STATUS} = 0;
                $return = $this->success("Disabled successfully.",[]);
                
            }elseif($action=="enable"){
                $ourOffersModel->{OurOffersModel::STATUS} = 1;
                $return = $this->success("Enabled successfully.",[]);
            }else{
                $return = $this->error("Invalid action.",200);
            }
            $ourOffersModel->save();
        }else{
            $return = $this->error("Invalid offer id.",200);
        }
        
        return $return;
    }
    public function manageOffersData(){
        $query = OurOffersModel::select(
            OurOffersModel::OFFER_IMAGE,
            OurOffersModel::OFFER_NAME,
            OurOffersModel::STATUS,
            OurOffersModel::ID
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';

                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable(' . $row->{OurOffersModel::ID} . ')" class="btn btn-danger btn-sm">Disable Destination</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable(' . $row->{OurOffersModel::ID} . ')" class="btn btn-primary btn-sm">Enable Destination</a>';
                if ($row->{OurOffersModel::STATUS} == 1) {
                    return $btn_edit . $btn_disable;
                } else {
                    return $btn_edit . $btn_enable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function ourServiceImageUpload(OurOffersRequest $request)
    {
        $maxId = OurOffersModel::max(OurOffersModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request, OurOffersModel::OFFER_IMAGE, "/website/uploads/offer_images/", "offer_$maxId");
    }

    public function getHomePageOffers(){
        $testimonials = Cache::rememberForever('ourOffers', function () {
            return OurOffersModel::where([
                [OurOffersModel::STATUS,1]
            ])
            ->select(OurOffersModel::OFFER_NAME,DB::raw("concat('".url("/")."',".OurOffersModel::OFFER_IMAGE.") as ".OurOffersModel::OFFER_IMAGE))->orderBy(OurOffersModel::ID,"asc")
            ->get();
        });
        if(empty($testimonials)){
            Cache::forget("ourOffers");
        }
        return $testimonials;
    }
}
