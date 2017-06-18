<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->error('Email or password is incorrect',401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
 //           return $this->response->error(['error' => 'could_not_create_token'], 500);
            return response()->errorInternal();
        }

        Storage::disk('local')->put('token', $token);
        return redirect('api/profile');
    }

    public function show(){
        return view('auth.login');
    }

    public function profile(){
        return view('profile');
    }

    public function logout(){
        Storage::disk('local')->delete('token');
        return redirect('api/login');
    }
}
