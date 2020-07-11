<?php

namespace App\Http\Controllers;

use App\YourEvent;
use Illuminate\Http\Request;

class YourEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('your_event.view_your_event');
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
     * @param  \App\YourEvent  $yourEvent
     * @return \Illuminate\Http\Response
     */
    public function show(YourEvent $yourEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\YourEvent  $yourEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(YourEvent $yourEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\YourEvent  $yourEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YourEvent $yourEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\YourEvent  $yourEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(YourEvent $yourEvent)
    {
        //
    }
}
