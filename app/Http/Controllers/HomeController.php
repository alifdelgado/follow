<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('users.index', compact('users'));
    }

    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function ajax(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $response = auth()->user()->toggleFollow($user);
        return redirect('home');
    }
}
