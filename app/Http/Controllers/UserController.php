<?php
namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

   
    //here is the post sign up page function
    public function postSignUp(Request $request)//dependency injection
    {
        //helpers to validate first  with the request and array of rules
        $this->validate($request, [
            'email'=> 'required|email|unique:users',
            'first_name'=> 'required|max:120',
            'password'=> 'required|min:4',
            'cover_image' =>'image|nullable|max:1999',

        ]);

        if($request->hasFile('cover_image')){
            //get just filename with the extension
            $filenameWithExt= $request->file('cover_image')->getClientOriginalName();
            
             $filename= pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just ext
                $extension= $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;

                $path= $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore= 'noimage.jpg';
        }

        $email= $request['email'];
        $first_name= $request['first_name'];
        $password= bcrypt($request['password']);

        $user = new User();
        $user->email= $email;
        $user->cover_image= $fileNameToStore;
        $user->first_name =$first_name;
        $user->password=$password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)  
    {

        $this->validate($request, [
            'email'=> 'required',  
            'password'=> 'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);

            if (Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])) {
                return redirect()->route('dashboard');
            }
            return redirect()->back();
          
            
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    public function getAccount()
    {
        return view('account',['user'=>Auth::user()]);
    }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|max:120',
            'cover_image'=> 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
            //get just filename with the extension
            $filenameWithExt= $request->file('cover_image')->getClientOriginalName();
              $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
                $extension= $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;

              $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore= 'noimage.jpg';
        }

        $user= Auth::user();
       
        $user->first_name= $request['first_name'];
        $user->cover_image= $fileNameToStore;
        $user->update();
        
        // $file=$request->file('image');
        // $filename=$request['first_name'].'_'.$user->id.'.jpg';

        //the get file makes you to store the actual file
        // if($file) {
        //     Storage::disk('local')->put($filename, File::get($file));
       
        // }

        return redirect()->route('account');
    }

  public function getUserImage($filename) 
  {
      $file=Storage::disk('local')->get($filename);
      return new Response($file, 200);
  }
}