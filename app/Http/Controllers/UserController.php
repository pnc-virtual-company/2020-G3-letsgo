<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
class UserController extends Controller
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
        // $user = new User;
        // $user->firstname = $request->get('firstname');
        // $user->lastname = $request->get('lastname');
        // $user->email = $request->get('email');
        // $user->password = $request->get('password');      
        // $user->save();
        // return view('auth.login');
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
        // $user = User::find($id);
        // return view('user.edit_user_profile',compact('user'));
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
        // $user = User::find($id);
        // $user ->firstname=$request->get('firstname');
        // $user ->lastname=$request->get('lastname');
        // $user ->email=$request->get('email');
        // $user->password = bcrypt($request->get('password'));
       
        // $user->save();
        // return view('home');

        // if($request->input('password') == $request->input('confirm')){
        //     $user = User::find($id);
        //     $user->firstname = $request->get('firstname');
        //     $user->lastname = $request->get('lastname');
        //     $user->email = $request->get('email');
        //     $user->password = bcrypt($request->get('password'));
        //     $user->save();
        //     return back();
        // }else{
        //     return "not match the new password and confirm password";
        // }

        $request->validate([ 
          
            'confirm' => ['same:newpassword'],
        ]);
        $user = User::find($id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return back();
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