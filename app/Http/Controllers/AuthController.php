<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Hashing\BcryptHasher;

class AuthController extends Controller
{
    /*
        Homepage. Will list all of blogs
    */
    public function home() {
        return view('blogs.index');
    }

    /*
        Login page
    */
    public function login() {
        return view('auth.login');
    }
    

    /*
        Post Request of Login
     */
    public function loginAction(Request $request) {
        if($request->has(['username','password'])) {

            $username = $request->username;
            $password = $request->password;
            $user = User::where('username',$username)->first();

            if($user) {
                $userData = array('username' => $user->username,'name' => $user->name);
                $hash = new BcryptHasher();
                if($hash->check($password,$user->password)) {
                    $request->session()->put('user',$userData);
                    return Redirect::to('/');
                }
                else {
                    return Redirect::to('/')->withErrors('Username/password salah');
                }
            }
            else {
                return Redirect::to('/')->withErrors('Username tidak ditemukan');
            }
        }
    }

    /*
        LogOut
    */
    public function logout(Request $request) {
        if(!session('user')) {
            return Redirect::to('/')->withErrors('Halaman tidak ditemukan');
        }
        else {
            $request->session()->flush();
            return Redirect::to('/');
        }
    }
}
