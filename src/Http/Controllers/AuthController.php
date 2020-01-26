<?php

namespace TopDigital\Auth\Http\Controllers;

use Hash;
use Auth;

use TopDigital\Auth\Models\User;
use TopDigital\Auth\Helpers\PasswordHelper;
use TopDigital\Auth\Helpers\AuthTokenHelper;

use TopDigital\Auth\Http\Requests\LoginRequest;
use TopDigital\Auth\Http\Requests\ChangePasswordRequest;
use TopDigital\Auth\Http\Resources\UserResource;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(LoginRequest $request) : JsonResponse
    {
        if (
            !($user = User::where('email', $request->input('email'))->first()) ||
            !PasswordHelper::checkPassword($request->input('password'), $user)
        ) {
            return response()->json([
                'errors' => [
                    'password' => __('auth.failed')
                ]
            ], 404);
        }

        return response()->json(AuthTokenHelper::createToken($user));
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['status' => 'success']);
    }

    public function view()
    {
        return response(UserResource::make(Auth::user()));
    }

    public function changePassword(ChangePasswordRequest $request, ?User $user)
    {
        $user = !!$user ? $user : Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'success']);
    }
}
