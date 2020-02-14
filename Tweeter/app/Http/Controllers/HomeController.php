<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        if(Auth::check()){
            $tweets = \App\Tweet::whereIn('user_id', \App\Follow::where('user_id', Auth::user()->id)->get('followed_by'))
                            ->orWhere('user_id', Auth::user()->id)
                            ->latest()
                            ->get();
            return view('home')->with(['tweets'=>$tweets]);
        } else {
            return redirect('/login');
        }
    }
}
