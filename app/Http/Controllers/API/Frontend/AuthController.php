<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        try{
            $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);
            $user = User::where('email',$request->email)->first();
            if(!$user && !Hash::check($request->password,$user->password)){
                return response()->json([
                    'message'=>"Invalid Creadintial ",
                ],401);
            }

            //create API Token...
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([
                'message'=>"Login Success",
                'token'=>$token,

                'role'=>$user->role
            ]);
        }catch(\Exception $e){
               return response()->json([
                'success'=>false,
                'message'=>"something went wrong!!!".$e->getMessage(),
                'data'=>null
            ]);
        }

    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
