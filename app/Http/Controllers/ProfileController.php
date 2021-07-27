<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\ProfileRequest;
use App\LessonUser;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    function __constructor(){
//        return $this->middleware('auth');
//    }
    public function index()
    {

        $groups = Group::where('user_id', Auth::id())->get();
        $ids = [];
        foreach($groups as $key){
            $ids[]=$key['id'];
        }
        $userLessons = LessonUser::whereIn('group_id',$ids)->get();
//
//        $user = \App\User::find(Auth::id());
//        $newDateFormat = $user->updated_at->modify('+7 day')->format('d/m/Y');
//        $newDateFormat1 = $user->updated_at->modify('+7 day');
//        $ldate = date('d/m/Y');
//        var_dump( $newDateFormat,$ldate);
//        var_dump( $newDateFormat==$ldate);
//        if($newDateFormat==$ldate){
//            echo 'vardzy uxarki';
//            User::where('id',Auth::id())->update(['updated_at'=>$newDateFormat1]);
//        }
//        die();
        $posts = Post::with(['user'])->orderBy('id','desc')->get();
        return view('profile')->with('posts', $posts);
    }
    public function index2(){
        return view('update');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        if(User::find($id)){
            User::where('id',$id)->update(['name'=>$request->name, 'email'=>$request->email]);
            return redirect()->back();
        }
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
