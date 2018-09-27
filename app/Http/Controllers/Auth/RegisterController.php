<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    use RegistersUsers;


    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * @api {post} /register Registration
     * @apiName Registration
     * @apiVersion 0.1.0
     * @apiGroup Auth
     * @apiParam {String} name student's name
     * @apiParam {String} email student's email UNIQUE
     * @apiParam {String} password student's password
     * @apiParam {String} password_confirmation confirm student's password
     * @apiSampleRequest /register
     *
     */

    protected function create(Request $request)
    {
      $v =  $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6|confirmed'
      ]);
      if ($v) {
          User::create(
              [
                  'name' => $v['name'],
                  'email' => $v['email'],
                  'password' => bcrypt($v['password'])
              ]);
          return response()->json(['success' => 'Вы успеншно зарегистрировались! Теперь   можете сделать вход'],201);
      }
      return response()->json(['message' => 'false']);

    }
}
