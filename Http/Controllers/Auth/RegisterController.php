<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showRegistration()
    {
        return view('pages.register');
    }

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
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'id_card' => 'required|string|size:18|unique:users',
            'phone' => 'required|string|size:11|unique:users',
            'captcha' => 'required|captcha',
            'company_area' => 'required|string',
            'pro_num' => 'required|string|unique:users',
        ],[
            'captcha.required' => '图形验证码不能为空',
            'captcha.captcha' => '请输入正确的图形验证码',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            //'email' => $data['email'],
            'id_card' => $data['id_card'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'company_area' => $data['company_area'],
            'pro_num' => $data['pro_num'],
        ]);
    }
}
