<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Socialite;

class UserController extends Controller
{
    public function welcome()
    {
        // return view('welcome');
        return redirect()->to('/discover');
    }

    public function info()
    {
        $pix_count = DB::table('pixs')->count();
        $user_count = DB::table('users')->count();
        return response()->json(['pixs' => $pix_count, 'users' => $user_count]);
    }

    public function user()
    {
        if (session()->get('user')) {
            return response()->json(session()->get('user'));
        } else {
            return response()->json(false);
        }
    }

    public function users()
    {
        $users = DB::table('users')->get();
        return view('users')->with(['users' => $users]);
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
