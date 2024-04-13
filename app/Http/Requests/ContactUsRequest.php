<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactUsRequest extends FormRequest
{
    use ResponseAPI;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name"=>"required|string|max:50",
            "last_name"=>"required|string|max:50",
            "email"=>"required|email|max:100",
            "phone_number"=>"required|integer",
            "message"=>"required|string|max:1000",
            "captcha"=>"required|captcha",
            "country_code"=>"nullable|string|max:10"
        ];
    }

    public function messages()
    {
        return ["captcha.captcha"=>"Invalid captcha text."];
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
