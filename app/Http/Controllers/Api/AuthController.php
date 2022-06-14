<?php

namespace App\Http\Controllers\Api;

use App\Helper\HasApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use HasApiResponse;

    //login with username and password
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('PersonalAccessToken')->accessToken;
            $user = auth()->user();
            $user->token = $token;
            return $this->httpCreated($user, 'Login success');
        } else {
            return $this->httpUnauthorizedError('Invalid username or password');
        }
    }

    //register with username and password and gmail or phone number
    public function register(RegisterRequest $request)
    {
        // $request->merge(['password' => Hash::make($request->password)]);
        $password = Hash::make($request->password);
        $user = User::create([
            'username' => $request->username,
            'contact' => $request->contact,
            'password' => $password,
        ]);
        // $token = $user->createToken('PersonalAccessToken');
        return $this->httpCreated($user, 'Register success');
    }
}