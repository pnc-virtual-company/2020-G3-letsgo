<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Image;
use Illuminate\Support\Facades\Hash;

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
        $user = User::find($id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
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
        $image = User::findOrFail($id);
        
        if(\File::exists(public_path("image/{$image->picture}"))){
            \File::delete(public_path("image/{$image->picture}"));
        }
        $image = User::findOrFail($id)->where('id', Auth::user()->id)->update([
            'picture' => 'user.png',
        ]);
   
        return back();
    }
    
    function updateProfilePic($id){
        $user = User::find($id);
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('image/'), $imageName);
        $user -> picture = $imageName;
        $user ->save();
        return redirect('home');

    }
    public function changePassword(Request $request){
        request()->validate([
            'old-password' => 'required|min:8',
            'new-password' => 'required|min:8',
            'password-confirmation' => 'required|min:8',
        ]);
            $old_pwd = $request->get('old-password');
            $value = Auth::user()->password;
            $verify_password = Hash::check($old_pwd,$value);
            if($verify_password){
                $new_pwd = $request->get('new-password');
                $confirm_pwd = $request->get('password-confirmation');
                if($new_pwd == $confirm_pwd){
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($new_pwd);
                    $user->save();
                    return back();
                }
             }
    }
}