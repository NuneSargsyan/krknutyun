<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StudentRequest;
use App\Lesson;
use App\LessonUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessonsUsers = LessonUser::with(['group', 'user'])->get();
        $groups =Group::where('user_id',Auth::id())->get();
        return  view('students/student')->with('groups',$groups)->with('lessonsUsers',$lessonsUsers);
    }
    public function main($id) {
        $lessonsUsers = LessonUser::where('user_id', $id)->with(['group', 'user'])->get();
        $groups =Group::get();
        return view('students/studenrprofile')->with('groups',$groups)->with('lessonsUsers',$lessonsUsers);
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
    public function store(StudentRequest $request)
    {
        $userId = User::where('email', $request->email)->first()['id'];
        if ($userId != NULL){
            $userLessonsCount = LessonUser::all()->where('user_id', $userId)->where('group_id',$request->group_id);
            $teacher = $userId['teacher'];
            if(count($userLessonsCount)<=0 && $teacher == 1){
                 $usersLessons  = new LessonUser();
                $usersLessons->user_id = $userId;
                $usersLessons->group_id = $request->group_id;
                $usersLessons->save();
                return redirect()->back();
            }else{
                echo 'ays mardy ays xmbic e';
            }

        }
        else {
            echo 'Tvyal user@ chi grancvel';
        }
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
        if(LessonUser::find($id)){
            LessonUser::where('id',$id)->delete();
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
