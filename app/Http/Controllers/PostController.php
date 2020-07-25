<?php
namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\PASSWORD_DEFAULT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

        public function postEditPost(Request $request)
        {
            $this->validate($request, [
                    'body'=>'required'
            ]);

            $post= Post::find($request['postId']);
            
            if(Auth::user() !=$post->user){
                return redirect()->route('dashboard');
            }
            $post->body= $request['body'];
            $post->update();
            return response()->json(['new_body'=> $post->body], 200);

            }


            public function postLikePost(Request $request)
            {
                $post_id= $request['postId'];
                $is_like= $request['isLike'] === 'true';
                $update =false;
                $post= Post::find($post_id);
                if(!$post){
                    return null;
                }
                $user= Auth::user();
                $like= $user->likes()->where('post_id', $post_id)->first();
                if($like){
                    $already_like = $like->like;
                    $update= true;

                    //if we like and we again click on the dislike 
                    if ($already_like == $is_like){
                        $like->delete();
                        return null;
                    }
                }else{
                    //i dont have a like and i like now
                    $like = new Like();

                }
                $like->like= $is_like;
                $like->user_id= $user->id;
                $like->post_id= $post->id;
                //update we already had an entry here
                if($update){
                    $like->update();
                }else{
                    $like->save();
                }
                return null;
            }
}