<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $data = $request->only(['email', 'password']);
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->failed($errors, 422);
        }

        if (!Auth::attempt($data)) {
            return response()->failed("Email & Password does not match with our record.", 401);
        }

        $user = User::where('email', $request->email)->first();
        $userData['user']=$user;
        $userData['api_token']=$user->createToken("API TOKEN")->plainTextToken;
        return response()->success($userData, 200);
    }
}
