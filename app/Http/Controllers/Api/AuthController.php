<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama'=>'required|string|max:255',
            'username' => 'required|max:12| unique:users',
            'email'=>'required|string|max:255|unique:users',
            'password'=>'required|string|min:8',
            'id_role' => 'required'
        ]);
        
        if ($validator->fails()){

            return response()->json($validator->errors());
        }
        $user = User::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make ($request->password),
            'id_role' => $request->id_role
        ]);

        $token = $user->createToken ('auth_token')->plainTextToken;

        return response()-> json([
            'data'=>$user,
            'access_token'=>$token,
            'token_type' =>'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message'=>'Unauthorized'
            ],401);
        }  
        
        $user = User::where('email',$request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json([
            'message'=>'Login Success',
            'access_token'=> $token,
            'token_type'=>'Bearer'
        ]);
    }
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message'=>'logout success'
        ]);
    }
}
