<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderShippedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request){
        $login  = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $login)
            ->first();

        if (Hash::check($password, $user->password)){
            return response()->json([
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);
        }

        return response()->json([
            'error' => 'error text'
        ]);


    }
}
