<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups =Group::where('user_id',Auth::id())->get();
        return view('groups/group')->with('groups',$groups);
    }
    public function main(){
        return view('grouplist');
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
    public function store(GroupRequest $request)
    {
        if ($request->hasFile('file')) {
            if($request->file('file')->isValid()) {
                try {
                    $file = $request->file('file');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $request->file('file')->move("images", $name);

                    $group= new Group();
                    $group->image ='images/'.$name;
                    $group->name = $request->name;
                    $group->user_id = Auth::id();
                    $group ->save();
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        return redirect()->back();
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

    function delete($id){
        if(Group::find($id)){
            Group::where('id',$id)->delete();
            return redirect()->back();
        }
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
