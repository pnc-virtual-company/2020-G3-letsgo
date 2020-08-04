<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use Auth;
use App\Join;
use DB;
class ExploreEventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exploreEvents = Event::all();
        // dd( $exploreEvents);
        $joins= Join::all();
        $joinEvent = Join::where('user_id',Auth::id())->get();
        return view('exploreEvent.exploreEvent',compact('exploreEvents', 'joins','joinEvent'));
    }


    public function eventJoinOnly()
    {
        $exploreEvents = Event::all()->groupBy("startDate");
        $joins= Join::all();
        // dd( $exploreEvents);
        $joinEvent = Join::where('user_id',Auth::id())->get();
        return view('exploreEvent.eventJoinOnly',compact('exploreEvents', 'joins','joinEvent'));
    }


    public function userCheck($data)
    {
        $user = User::find(Auth::id());
        $user -> check = $data;
        $user->save();
        return redirect('exploreEvent');
    }
    public function userNotCheck($data)
    {
        $user = User::find(Auth::id());
        $user -> check = $data;
        $user->save();
        return redirect('eventJoinOnly');
    }

    //end view explore event by carlendar//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function join($id)
    {

        $event = Event::find($id);
        $user = Auth::id();
        $join = new Join;
        $join->user_id = $user;
        $join->event_id = $event->id;
        $join->save();
        return back();
    }

    public function quit($id){     
        $join = Join::find($id);
        $join->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}