<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Event;
use Auth;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.eventview',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $events = Event::all();
        return view('your_event.view_your_event', compact('events', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request -> validate([
            'title' => 'required',
            'start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'start_time' => 'required',
            'end_date' => 'required|date|date_format:Y-m-d|after:startDate',
            'end_time' => 'required',
            'description' => 'required',
            'city' => 'required',
        ]);
        $user = Auth::id();
        $yourevent = new Event;
        $yourevent -> title = $request-> title;
        $yourevent -> category_id = $request-> category;
        $yourevent -> start_date = $request-> start_date;
        $yourevent -> end_date = $request-> end_date;
        $yourevent -> start_time = $request-> start_time;
        $yourevent -> end_time = $request-> end_time;
        $yourevent -> city = $request-> city;
        $yourevent -> description = $request-> description;
        $yourevent -> user_id = auth::id();
        $yourevent->save();
        return back();
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
        $user = Auth::id();
        $event = Event::find($id);
        $event ->title = $request->get('title');
        $event ->category_id = $request->get('category');
        $event ->start_date = $request->get('start_date');
        $event ->end_date = $request->get('end_date');
        $event ->start_time = $request->get('start_time');
        $event ->end_time = $request->get('end_time');
        $event ->city = $request->get('city');
        $event ->description = $request->get('description');
        // $event->picture = $request->file('picture')->getClientOriginalName();
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/image/'), $imageName);
        $event -> picture = $imageName;
        $event ->user_id = $user;
        $event->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $image = Event::findOrFail($id);
        
        if(\File::exists(public_path("image/{$image->picture}"))){
            \File::delete(public_path("image/{$image->picture}"));
        }
        $image = Event::findOrFail($id)->where('id',$image->id)->update([
            'picture' => 'event.png',
        ]);
   
        return back();
    }

    public function delete($id)
    {
        $user_id = Auth::id();
            $events=Event::where('id', $id)->where('user_id',$user_id);
            if(!is_null($events)){
                $events->delete();
            } 
        return back();
    }

    function updateProfilePicEvent($id){
        
        $event = Event::find($id);
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/image/'), $imageName);
        $event -> picture = $imageName;
        $event ->save();
        return back();

    }
}