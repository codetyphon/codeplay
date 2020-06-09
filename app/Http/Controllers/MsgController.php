<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MsgController extends Controller
{
    //list by pixid
    public function list($pix)
    {
        $messages = DB::table('messages')
            ->join('users', 'messages.user_id', 'users.id')
            ->where(['messages.pix_id' => $pix])
            ->select('*', 'users.name as user_name', 'users.id as user_id', 'users.avatar as avatar', 'users.bio as user_bio')
            ->get();
            return response()->json($messages);
    }

    public function save(Request $request)
    {
        if (session()->get('user')) {
            $user_id = session()->get('user')->id;
            $text = $request->input('text');
            $pix = $request->input('pix');//pixid
            if($text==""){
                $text="啥都没说";
            }
            DB::table('messages')->insert(['pix_id' => $pix, 'text' => $text, 'user_id' => $user_id]);
            return response()->json(['err' => false, 'msg' => 'saved']);
        } else {
            return response()->json(['err' => true, 'msg' => 'session']);
        }
    }
}
