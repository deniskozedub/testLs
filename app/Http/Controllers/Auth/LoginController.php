<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @api {post} /login Login
     * @apiName Login
     * @apiVersion 0.1.0
     * @apiGroup Auth
     * @apiParam {String} email student's email
     * @apiParam {String} password student's password
     * @apiSampleRequest  /login
     *
     */

    public function login(Request $request){
         $v = $request->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);

            if ($v && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                if ($user) {
                    $token = $user->createToken('StudentLifeToken')->accessToken;
                    return response()->json(['token' => 'Bearer' . ' ' . $token]);
                }
            } else {
                return response()->json(['message' => 'Не верный логин или пароль'], 401);
            }
    }
}
