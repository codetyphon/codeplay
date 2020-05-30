<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;

class UserController extends Controller
{
    public function welcome()
    {
        if (session()->get('user')) {
            $user_name = session()->get('user')->name;
            return redirect()->to('/' . $user_name);
        } else {
            return view('welcome');
        }
    }

    public function about()
    {
        return view('about');
    }

    public function username($username)
    {
        $user = DB::table('users')->where(['name' => $username])->first();
        if ($user == null) {
            return view('404');
        } else {
            $pixs = DB::table('pixs')->where(['user_id' => $user->id])->orderBy('time', 'desc')
            ->paginate(10);
            return view('list')->with(['user' => $user, 'pixs' => $pixs]);
        }
    }

    public function page_logout()
    {
        session()->flush();
        return redirect()->to('/');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {
        $info = Socialite::driver('github')->user();
        $username = $info->user['login'];
        $email = $info->user['email'];
        $avatar = $info->user['avatar_url'];

        $user = DB::table('users')->where(['email' => $email])->first();
        if ($user == null) {
            //新用户
            DB::table('users')->insert(['email' => $email, 'name' => $username, 'avatar' => $avatar]);
            $user = DB::table('users')->where(['email' => $email])->first();
            session()->put('user', $user);
        } else {
            //老用户
            session()->put('user', $user);
        }
        return redirect()->to('/');
    }
}
