<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function login(Request $request){
        try{
            $validator = Validator::make($request->all, [
                'email'=> 'required|email',
                'password'=>'required'
            ]);

            if($validator->fails()){
                return response()->json([
                    'message'=> $validator->errors()
                ], 400);
            }

            $user = User::where('email', $request->email())->first();
            if(!$user || Hash::check($request->password, $user->password)){
                return response()->json([
                    'message' => 'Incorrect'
                ], 400);
            }

            $token = $user->createToken($request->email)->plainTextToken;
            return response()->json([
                'message' =>'login success',
                'token' => $token,
            ]);

        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
