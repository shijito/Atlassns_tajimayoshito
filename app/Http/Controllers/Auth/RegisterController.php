<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'username' => 'required|string|between:2,12',  
            'mail' => 'required|string|email|between:5,40|unique:users',
            'password' => 'required|string|between:8,20|alpha_num|confirmed',
        ]);
        //required(必須)、string(文字列)、between:min,mix(最低文字数～最大文字数)、unique:users(登録済みのアドレス使用不可)、alpha_num(英数字のみ)、confirmed(一致しているかどうか)
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $username = $request->input('username');

            $validator = $this->validator($data);
                if($validator->fails()){
                    return redirect()->back()
                    ->withErrors($validator);
                }
            $this->create($data);
            return view('auth.added')->with('name', $username);

        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
