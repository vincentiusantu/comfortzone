<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\Chat;
use App\Models\User;

class AdminController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('name', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.list-chat');
        } else {
            return redirect()->back()->with('error', 'Login Failed');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function listChat(){
        $users = User::all();
        $chats = Chat::orderBy('created_at', 'asc')->get();
        foreach ($users as $user) {
            foreach ($chats as $chat) {
                if ($user->id == $chat->user_id){
                    $user->chat = $chat->chat;
                    $user->timestamp = $chat->created_at;
                }
            }
        }

        for ($i = 1; $i < count($users); $i++) {
            if($users[$i]->timestamp > $users[$i-1]->timestamp){
                $temp = $users[$i];
                $users[$i] = $users[$i-1];
                $users[$i-1] = $temp;
            }
        }
        
        return view('dashboard.admin.chat', compact('users'));
    }

    public function chatView($id)
    {
        $users = User::where('users.id', $id)->get();
        $chats = Chat::where('chats.user_id', $id)->orderBy('created_at', 'asc')->get();
        return view('dashboard.admin.chatUser', compact('id', 'users','chats'));
    }

    public function createChat($id, Request $request)
    {
        Chat::create([
            'user_id' => $id,
            'is_admin' => 1,
            'chat' => $request->chat
        ]);
        return redirect()->back();
    }

    public function goHome(){
        return redirect()->route('admin.list-chat');
    }
}
