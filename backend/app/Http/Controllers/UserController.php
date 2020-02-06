<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //create a new user
    public function add(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');

        $user=new User();
        $user->name=$name;
        $user->email=$email;
        $user->password=Hash::make($password);
        $user->rol='user';

        $user->save();

        $credencials=$request->only(['email','password']);
        try{
            if(!$token=JWTAuth::attempt($credencials)){
                return response()->json(['error'=>'credenciales invalidas']);
               }
            } catch (JWTException $e) {
                return response()->json(['error'=>'cloud_not_create']);
            }

            $response=compact(['token']);

            $user->token=$response['token'];

        

        return $user;
    }
}
