<?php

namespace App\Http\Requests;

use App\Models\OurServicesModel;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OurServicesRequest extends FormRequest
{
    use ResponseAPI;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->id?true:false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            OurServicesModel::ID=>"bail|required_if:action,update,enable,disable|nullable|exists:our_services,id",
            OurServicesModel::SERVICE_NAME=>"bail|required_if:action,update,insert|nullable|string|max:500",
            OurServicesModel::SERVICE_DETAILS=>"bail|required_if:action,update,insert|nullable|string|max:500",
            OurServicesModel::SERVICE_ICON=>"bail|required_if:action,update,insert|nullable|string|max:100",
            OurServicesModel::POSITION=>"required_if:action,update,insert|numeric|gt:0",
            "action"=>"bail|required|in:insert,update,enable,disable"
        ];
    }

    public function messages()
    {
        return [
            "position.required_if"=>"Sorting number is required.",
            "position.strnumericing"=>"Sorting number should be a number.",
            "position.gt"=>"Sorting number should be greater than 0.",

        ];
    }

    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(),200));
    }
}
