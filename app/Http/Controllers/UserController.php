<?php

namespace App\Http\Controllers;
use DB;
use Auth;
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
        $user = User::find($id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        if($request->hasFile('picture')) {
            $image = $request->file('picture');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('image/'), $filename);
            $user->picture = $request->file('picture')->getClientOriginalName();
        }
        $user->save();
        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update([
            'picture' => 'user.png', 
        ]);
        return back();
    }
    function addProfilePicture(Request $request,$id){
        $user = User::find($id);
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/image/' . $filename ) );
            $user->picture = $filename;
        }else{
            return $request;
            $user->image='';
        }
        $user->save();
        return redirect('home');
    }
}
