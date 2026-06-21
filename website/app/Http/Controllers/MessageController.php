<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\LaravelPdf\Facades\Pdf;
class MessageController extends Controller
{
    public function getMessages()
    {
        $messages = DB::table('userChat')
            ->where('idU', Auth::user()->id)
            ->select()
            ->orderBy('id', 'asc')
            ->get();

        $msg = view('components/message', ['messages' => $messages])->render();

        return response()->json(array('msg'=> $msg), 200);
    }

    public function sendMessage(Request $request)
    {
        $messages = DB::table('userChat')
            ->insert([
                'message' => $request->input('msg'),
                'idU' => Auth::user()->id,
                'sender' => 'user',
            ]);

        return $this->getMessages();
    }

    public function sendAdminMessage(Request $request)
    {
        DB::table('userChat')
            ->insert([
                'message' => $request->input('msg'),
                'idU' => $request->input('userId'),
                'sender' => 'admin',
            ]);
    }

    public function getIdMessages($id, $last)
    {
        $messages = DB::table('userChat')
            ->where('idU', $id)
            ->where('id', '>', $last)
            ->select()
            ->orderBy('id', 'asc')
            ->get();

        return response()->json($messages, 200);
    }

    public function getUsers()
    {
        $users = DB::table('userChat')
            ->join('users', 'users.id', '=', 'userChat.idU')
            ->select('users.id', 'ragSoc')
            ->orderBy('userChat.id', 'desc')
            ->distinct()
            ->get();


        return response()->json($users, 200);
    }
}