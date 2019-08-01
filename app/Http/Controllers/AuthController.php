<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Redirect;

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

        if(!session('user')) {
            return view('auth.login');
        }
        else {
            return Redirect::to('/');
        }
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
                    return Redirect::to('/login')->withErrors('Terjadi kesalahan saat login. Pastikan Anda mengecek kembali username dan password Anda.');
                }
            }
            else {
                return Redirect::to('/login')->withErrors('Terjadi kesalahan saat login. Pastikan Anda mengecek kembali username dan password Anda.');
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
