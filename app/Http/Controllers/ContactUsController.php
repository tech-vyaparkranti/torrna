<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUsModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;
    public function saveContactUsDetails(ContactUsRequest $request){
        try{
            $check = ContactUsModel::where([
                [ContactUsModel::EMAIL,$request->input(ContactUsModel::EMAIL)],
                [ContactUsModel::PHONE_NUMBER,$request->input(ContactUsModel::PHONE_NUMBER)],
            ])->whereRaw("date(created_at)=date(now())")->first();
            if($check){
                $response = $this->error("You alread sent a message for today.");
            }else{
                $newContactUs = new ContactUsModel();
                $newContactUs->{ContactUsModel::FIRST_NAME} = $request->input(ContactUsModel::FIRST_NAME);
                $newContactUs->{ContactUsModel::LAST_NAME} = $request->input(ContactUsModel::LAST_NAME);
                $newContactUs->{ContactUsModel::EMAIL} = $request->input(ContactUsModel::EMAIL);
                $newContactUs->{ContactUsModel::COUNTRY_CODE} = $request->input(ContactUsModel::COUNTRY_CODE);
                $newContactUs->{ContactUsModel::PHONE_NUMBER} = $request->input(ContactUsModel::PHONE_NUMBER);
                $newContactUs->{ContactUsModel::MESSAGE} = $request->input(ContactUsModel::MESSAGE);
                $newContactUs->{ContactUsModel::IP_ADDRESS} = $this->getIp();
                $newContactUs->{ContactUsModel::USER_AGENT} = $request->userAgent();
                $newContactUs->save();
                $this->sendContactUsEmail($newContactUs);
                $response = $this->success("Thank you for your message. We will contact you shortly.",[]);
            }
        }catch(Exception $exception){
            report($exception);
            $response = $this->error("Something went wrong. ".$exception->getMessage());
        }
        return $response;
    }

    public function manageContactUs(){
        return view("Dashboard.Pages.manageContactUs");
    }

    public function ContactUsData(){
        

        $query = ContactUsModel::select(
            ContactUsModel::FIRST_NAME,
            ContactUsModel::LAST_NAME,
            ContactUsModel::EMAIL,
            ContactUsModel::COUNTRY_CODE,
            ContactUsModel::PHONE_NUMBER,
            ContactUsModel::MESSAGE,
            ContactUsModel::IP_ADDRESS,
            ContactUsModel::ID,
            DB::raw("date_format(".ContactUsModel::CREATED_AT.", '%M %d %Y %r') as created_at_date")
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
