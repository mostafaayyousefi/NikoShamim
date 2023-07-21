<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreCustomerRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*
* @return bool
*/
public function authorize()
{
return true;
}
public function rules() {

    switch ($this->method()) {
        case 'POST':
            return [
                'Firstname'=>'unique:customers',
                'Email'=>'unique:customers',
                ];
            break;
        case 'PUT':
            return [  ];
            break;
        default:
        return [
            'Firstname'=>'required|min:4|max:100',
            'Lastname'=>'required|min:4|max:100',
            'DateOfBirth'=>'required|date',
            'PhoneNumber'=>'required|numeric',
            'Email'=>'required|email',
            'BankAccountNumber'=>'required|numeric',
            ];
            break;
    }



}
/**
* Get the error messages for the defined validation rules.*
* @return array
*/
protected function failedValidation(Validator $validator)
{
throw new HttpResponseException(response()->json([
'errors' => $validator->errors(),
'status' => true
], 422));
}
}
