<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationMasterRequest;
use App\Models\DestinationsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class DestinationController extends Controller
{
    protected $name = "";
    protected $password = "";
    protected $value_partner_id = "";
    protected $user_id = null;
    use CommonFunctions;

    public function destinationMaster()
    {
        return view("Dashboard.Pages.destinationsAdmin");
    }

    public function saveDestinations(DestinationMasterRequest $request)
    {
        Cache::forget('destinations');
        switch ($request->input("action")) {
            case "insert":
                $return = $this->insertDestination($request);
                break;
            case "update":
                $return = $this->updateDestination($request);
                break;
            case "enable":
                $return = $this->enableDestination($request);
                break;
            case "disable":
                $return = $this->disableDestination($request);
                break;
            default:
                $return = ["status" => false, "message" => "Unknown action.", "data" => null];
        }
        return response()->json($return);
    }
    public function insertDestination(DestinationMasterRequest $request)
    {
        $checkDuplicate = DestinationsModel::where(DestinationsModel::DESTINATION_NAME, $request->input(DestinationsModel::DESTINATION_NAME))->first();

        if ($checkDuplicate) {
            $return = $this->returnMessage("Destination name is already taken");
        } else {
            $createNewDestination = new DestinationsModel();
            $DestinationrImage = $this->DestinationImageUpload($request);
            if ($DestinationrImage["status"]) {
                $createNewDestination->{DestinationsModel::DESTINATION_NAME} = $request->input(DestinationsModel::DESTINATION_NAME);
                $createNewDestination->{DestinationsModel::DESTINATION_IMAGE} = $DestinationrImage["data"];
                $createNewDestination->{DestinationsModel::SORTING_NUMBER} = $request->input(DestinationsModel::SORTING_NUMBER);
                $createNewDestination->{DestinationsModel::DESTINATION_DETAILS} = $request->input(DestinationsModel::DESTINATION_DETAILS);
                $createNewDestination->{DestinationsModel::STATUS} = 1;
                $createNewDestination->{DestinationsModel::CREATED_BY} = Auth::user()->id;
                $createNewDestination->save();
                $return = $this->returnMessage("Saved successfully.", true);
                 
            } else {
                $return = $DestinationrImage;
            }
        }
        return $return;
    }

    public function updateDestination(DestinationMasterRequest $request)
    {
        $checkDuplicate = DestinationsModel::where(DestinationsModel::DESTINATION_NAME, $request->input(DestinationsModel::DESTINATION_NAME))
            ->where(DestinationsModel::ID, "<>", $request->input(DestinationsModel::ID))->first();
        if ($checkDuplicate) {
            $return = $this->returnMessage("Destination name is already taken");
        } else {
            $updateModel = DestinationsModel::find($request->input(DestinationsModel::ID));
            if ($request->file(DestinationsModel::DESTINATION_IMAGE)) {
                $DestinationrImage = $this->DestinationImageUpload($request);
                if ($DestinationrImage["status"]) {
                    $updateModel->{DestinationsModel::DESTINATION_IMAGE} = $DestinationrImage["data"];
                } else {
                    return $DestinationrImage;
                }
            }
            $updateModel->{DestinationsModel::DESTINATION_NAME} = $request->input(DestinationsModel::DESTINATION_NAME);
            $updateModel->{DestinationsModel::SORTING_NUMBER} = $request->input(DestinationsModel::SORTING_NUMBER);
            $updateModel->{DestinationsModel::DESTINATION_DETAILS} = $request->input(DestinationsModel::DESTINATION_DETAILS);
            $updateModel->{DestinationsModel::STATUS} = 1;
            $updateModel->{DestinationsModel::UPDATED_BY} = Auth::user()->id;
            $updateModel->save();
             
            $return = $this->returnMessage("Updated successfully.", true);
        }
        return $return;
    }

    public function enableDestination(DestinationMasterRequest $request)
    {
        $check = DestinationsModel::where(DestinationsModel::ID, $request->input(DestinationsModel::ID))->first();
        if ($check) {
            $check->{DestinationsModel::STATUS} = 1;
            $check->{DestinationsModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Enabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }

    public function disableDestination(DestinationMasterRequest $request)
    {
        $check = DestinationsModel::where(DestinationsModel::ID, $request->input(DestinationsModel::ID))->first();
        if ($check) {
            $check->{DestinationsModel::STATUS} = 0;
            $check->{DestinationsModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Disabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }
    public function DestinationImageUpload(DestinationMasterRequest $request)
    {
        $maxId = DestinationsModel::max(DestinationsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request, DestinationsModel::DESTINATION_IMAGE, "/website/uploads/destination_images/", "Destination_$maxId");
    }
    public function destinationsData()
    {

        $query = DestinationsModel::select(
            DestinationsModel::DESTINATION_NAME,
            DestinationsModel::DESTINATION_IMAGE,
            DestinationsModel::DESTINATION_DETAILS,
            DestinationsModel::SORTING_NUMBER,
            DestinationsModel::STATUS,
            DestinationsModel::ID
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';

                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable(' . $row->{DestinationsModel::ID} . ')" class="btn btn-danger btn-sm">Disable Destination</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable(' . $row->{DestinationsModel::ID} . ')" class="btn btn-primary btn-sm">Enable Destination</a>';
                if ($row->{DestinationsModel::STATUS} == 1) {
                    return $btn_edit . $btn_disable;
                } else {
                    return $btn_edit . $btn_enable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getHomePageDestinations(){
        $data = $this->allDestinations();
        return response()->json($data);
    }

    public function allDestinations(){
        try{
            $destinations = Cache::get("destinations");
            if(empty($destinations)){
                Cache::forget("destinations");
                $destinations = DestinationsModel::where(DestinationsModel::STATUS,1)
                ->select(DestinationsModel::DESTINATION_NAME,
                DestinationsModel::DESTINATION_DETAILS,
                DestinationsModel::DESTINATION_IMAGE)
                ->orderBy(DestinationsModel::SORTING_NUMBER,"asc")->get();
                Cache::forever("destinations",$destinations);
            
            }
            return $destinations;
        }catch(Exception $exception){            
            $this->reportException($exception);
        }
    }

}
