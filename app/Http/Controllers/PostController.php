<?php
namespace App\Http\Controllers;
use App\Post;
use App\PASSWORD_DEFAULT;
use Illuminate\Http\Request;

class PostController extends Controller
{
        public function postCreatePost(Request $request)
        {

            $this->validate($request,[
                'body'=>'required|max:1000'
            ]);
            //validation
            $post=new Post();
            $post->body=$request['body'];

            //create a connection to the user
           if ($request->user()->posts()->save($post)){
               $message= 'Post successfully created!';
           }
            return redirect()->route('dashboard')->with(['message'=>$message]);
        }
}