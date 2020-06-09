<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function from10to62($dec)
{
    $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    do {
        $result = $dict[$dec % 62] . $result;
        $dec = intval($dec / 62);
    } while ($dec != 0);
    return $result;
}

class PixController extends Controller
{
    public function id($id)
    {
        $pix = DB::table('pixs')
            ->join('users', 'pixs.user_id', 'users.id')
            ->where(['pixs.id' => $id])
            ->select('*', 'pixs.id as pix_id', 'users.name as user_name', 'users.id as user_id', 'users.avatar as avatar', 'users.bio as user_bio')
            ->first();
        if ($pix == null) {
            return view('404');
        } else {
            DB::table('pixs')
                ->where(['id' => $id])
                ->increment('view');
            return view('view')->with(['pix' => $pix]);
        }
    }
    public function new()
    {
        $code = "'.01234567','89ABCDEFG'";
        return view('new')->with(['code' => $code, 'title' => '', 'size' => 10]);
    }

    public function fork($id)
    {
        $pix = DB::table('pixs')->where(['id' => $id])->first();
        if ($pix == null) {
            return view('404');
        } else {
            return view('new')->with(['title' => $pix->title, 'code' => $pix->code, 'size' => $pix->size]);
        }
    }

    public function save(Request $request)
    {
        if (session()->get('user')) {
            $user_id = session()->get('user')->id;
            $title = $request->input('title');
            $code = $request->input('code');
            $size = $request->input('size');
            if ($title == "") {
                $title = "未命名像素画";
            }
            DB::table('pixs')->insert(['title' => $title, 'code' => $code, 'size' => $size, 'user_id' => $user_id]);
            return response()->json(['err' => false, 'msg' => 'saved']);
        } else {
            return response()->json(['err' => true, 'msg' => 'session']);
        }
    }

    public function discover()
    {
        $pixs = DB::table('pixs')
            ->join('users', 'pixs.user_id', '=', 'users.id')
            ->orderBy('time', 'desc')
            ->select('pixs.id as pix_id', 'pixs.title as title', 'pixs.size as size', 'pixs.code as code', 'users.id as user_id', 'users.name as username', 'users.avatar as avatar')
            ->paginate(10);
        return view('discover')->with(['pixs' => $pixs]);
    }
}
