<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\Category;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $categories -> user_id = auth::id();
        return view ('Category.view_category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form input
        $messages = ['name.required'=> 'Name is required'];
        $this->validate($request, [
            'name' => 'required|unique:categories| |max:255',
        ],$messages);

        //For Data insertion
        $category = new Category;
        $category -> name = $request-> name;
        $category -> user_id = auth::id();
        $category-> save();
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
        $categories =Category::find($id);
        $categories -> name = $request -> get('category');
        $categories -> user_id = auth::id();
        $categories -> save();
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
        $categories = Category::find($id);
        $categories -> user_id = auth::id();
        $categories->delete();
        return back();
    }


    //function to check if category already exist

    public function existCategory(Request $request )
    {
            $category = $request->get('result');

            if($request->ajax()){
                $dataCategory = DB::table('categories')->where('name', $category)->get();
                return $dataCategory;
            }
    }


}
