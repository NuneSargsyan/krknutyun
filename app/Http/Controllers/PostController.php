<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function store(PostRequest $request){
        if ($request->hasFile('file')) {
            if($request->file('file')->isValid()) {
                try {
                    $file = $request->file('file');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $request->file('file')->move("images", $name);

                    $post= new Post();
                    $post->image ='images/'.$name;
                    $post->content = $request->post_content;
                    $post->user_id = Auth::id();
                    $post ->save();
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }

        return redirect()->back();
    }
    function delete($id){
        if(Post::find($id)){
            Post::where('id',$id)->delete();
            return redirect()->back();
        }
    }
}
