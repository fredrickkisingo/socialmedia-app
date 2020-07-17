<?php
namespace App\Http\Controllers;
use App\Post;
use App\PASSWORD_DEFAULT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function getDashboard()
    {
        //fetch post ,all fetches all posts
        $posts= Post::orderBy('created_at','desc')->get();
        return view('dashboard',['posts'=>$posts]);
    }
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


        public function getDeletePost($post_id)
        {
            //here we are getting  a single post
            $post=Post::where('id', $post_id)->first();
                //checking if the logged in user is the one who posted it
            if(Auth::user() !=$post->user){
                return redirect()->route('dashboard');
            }
            $post->delete();
            return redirect()->route('dashboard')->with(['message'=>'Successfully deleted!']);
        }
}