<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseContoller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;


class UserController extends BaseContoller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' =>['required','email'],
            'password' => ['required']
        ]);

        if($validator->fails()){
            return $this->responseError('Login failed', 422, $validator->errors());
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $response=[
                'email'=>$user->email,
                'token'=> $user->createToken('Mytoken')->accessToken,
                
            ];
            return $this->responseOk($response);

        }else{
            return $this->responseError('Wrong email or password',401);
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email' =>['required','email','unique:users'],
            'password' => ['required'],
            
        ]);

        if($validator->fails()){
            return $this->responseError('Register failed', 422, $validator->errors());
        }

        $params = [
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'role' => 'orangtua',

        ];
        if ($user = User::create($params)){
            $token = $user->createToken('MyToken')->accessToken;
            
            $response = [
                'user' => $user,
                'token' => $token,
            ];

           return $this->responseOk($response);
        }else{
            return $this->responseError('Registration failed', 400);
        }

    }

    public function logout(Request $request)
    {
       $token= $request->user()->token();
       $token->revoke();
       return response()->json([
         'message' => 'Berhasil Keluar'
       ]);
    }
}
