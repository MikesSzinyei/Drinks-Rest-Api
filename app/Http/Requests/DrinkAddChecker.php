<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DrinkAddChecker extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "drink"=>"required",
            "amount"=>"required|numeric",
            "type"=>"required",
            "package"=>"required"
        ];
    }
    public function messages(){
        return[
            "drink.required"=>"Italnév elvárt",
            "amount.required"=>"Mennyiség elvárt",
            "amount.numeric"=>"Szám elvárt",
            "type.required"=>"Típus elvárt",
            "package.required"=>"Kiszerelés elvárt",
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
