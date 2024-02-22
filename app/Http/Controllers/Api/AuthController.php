<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRegisterChecker;
use App\Http\Requests\UserLoginChecker;

class AuthController extends ResponseController {
    public function register(UserRegisterChecker $request) {

        $request->validated();
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success ["name"] =$user->name;

        return $this->sendResponse($success, "Sikeres regisztráció");
    }

    public function login(UserLoginChecker $request) {
        $request->validated();
        if( Auth::attempt(["email" => $request->email, "password" =>$request->password])){

            $user = Auth::user();
            $success["token"]=$user->createToken($user->name."token")->plainTextToken;
            $success["name"] = $user->name;
            return $this->sendResponse($success, "Sikeres bejelentkezés");
        }else{

            return $this->sendError("Adatbeviteli hibe", ["Hibás email vagy jelszó"], 401);

        };
    }

    public function logout(Request $request) {

        auth("sanctum")->user()->currentAccessToken()->delete();

    
        return $this->sendResponse([], "Sikeres kijelentkezés");
    }
}
