<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();
        if ($finduser) {
            Auth::login($finduser);
            return redirect('/');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'vaitro_id' => 1,
                'password' => bcrypt('123456'),
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        $finduser = KhachHang::where('facebook_id', $user->id)->first();
        if ($finduser) {
            Auth::login($finduser);
            return redirect('/majestic');
        } else {
            $newUser = KhachHang::create([
                'tenkh' => $user->name,
                'email' => $user->email,
                'sdt' => "",
                'diachi' => "",
                'facebook_id' => $user->id,
                'matkhau' => bcrypt('123456'),
            ]);
            Auth::login($newUser);
            return redirect('/majestic');
        }
    }
}
