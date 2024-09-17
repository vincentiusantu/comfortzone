<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Hash;
use Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('name', 'password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('user.chat');
        } else {
            return redirect()->back()->with('error', 'Login Failed');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }

    public function chat(){
        $id = Auth::id();
        $chats = Chat::where('chats.user_id', $id)->orderBy('created_at', 'asc')->get();
        return view('dashboard.user.chat', compact('chats'));
    }

    public function createChat(Request $request){
        $id = Auth::id();
        Chat::create([
            'user_id' => $id,
            'is_admin' => 0,
            'chat' => $request->chat
        ]);
        return redirect()->route('user.chat');
    }
}
