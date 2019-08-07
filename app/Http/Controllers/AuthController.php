<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use JWTAuthException;
use App\Blog;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Redirect;
use Session;

class AuthController extends Controller
{
    /*
        Homepage. Will list all of blogs
    */

    private function getToken($username, $password) {
        $token = null;
        try {
            if(!$token = JWTAuth::attempt(['username'=>$username, 'password'=>$password])) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'Username/password tidak valid',
                    'token' => $token,
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'Gagal membuat token',
            ]);
        }
        return $token;
    }

    /*
        Post Request of Login
     */
    public function login(Request $request) {
        $user = User::where('username',$request->username)->first();
        $checkedHash = \Hash::check($request->password, $user->password);
        if($user && $checkedHash) {
            $token = self::getToken($request->username,$request->password);
            $user->save();
            $response = [
                'success' => true,
                'data' => [
                    'id_user' => $user->id_user,
                    'token_auth' => $token,
                    'name' => $user->name,
                    'username' => $user->username,
                ],
            ];
        }
        else {
            $response = [
                'success' => false,
                'data' => 'Data user tidak ditemukan',
            ];
        }

        return response()->json($response, 201);
    }

    /*
        Register
    */
    public function register(Request $request) {
        $userData = [
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'name' => $request->name,
            'token_auth' => '',
        ];
        $user = new User($userData);
        if($user->save()) {
            $token = self::getToken($request->username,$request->password);
            if(!is_string($token)) {
                return response()->json([
                    'success' => false,
                    'data' => 'Gagal membuat token',
                ], 201);
            }
            $user = User::where('username',$request->username)->first();
            $user->save();
            $response = [
                'success' => true,
                'data' => [
                    'id_user' => $user->id_user,
                    'token_auth' => $token,
                    'name' => $user->name,
                    'username' => $user->username,
                ],
            ];
         }
         else {
             $response = [
                 'success' => false,
                 'data' => 'Gagal membuat user',
             ];
         }
         return response()->json($response, 201);

    }
}
