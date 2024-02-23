<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterChecker extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|max:20|unique:users",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6",
            "confirm_password"=>"required|same:password"
        ];
    }

    public function messages() {

        return [
            "name.required" => "Név elvárt",
            "name.max"=> "Túl hosszú név",
            "email.required"=> "Email elvárt",
            "email.email"=> "Invalid email cím",
            "password.required" => "Jelszó elvárt",
            "password.min" => "Túl rövid a jelszó",
            "confirm_password.required"=>"Hiányzó jelszó megerősítés",
            "confirm_password.same" => "Nem egyező jelszó" 
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            "success"=>false,
            "message"=>"Adatbeviteli hiba",
            "data"=>$validator->errors()
        ]));
    }
}
