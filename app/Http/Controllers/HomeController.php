<?php

namespace App\Http\Controllers;
use App\Event;
use App\User;
use Auth;
use App\Join;
use DB;
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
        $exploreEvents = Event::all();
        $joins= Join::all();
        $joinEvent = Join::where('user_id',Auth::id())->get();
        return view('exploreEvent.exploreEvent',compact('exploreEvents', 'joins','joinEvent'));
    }
}
