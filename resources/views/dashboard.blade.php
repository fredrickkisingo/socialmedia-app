@extends('layouts.master')

@section('content')
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
                <header><h3>What do you have to say?</h3></header>
        <form action="{{route('post.create') }}" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                    </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{Session::token() }}" name="_token">
            </form>
            </div>        
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
            <article class="post">
                <p>{{$post->body }}</p>
                <span style="font-style:italic">
               <b> Posted by {{$post->user->first_name}} on {{ $post->created_at }}</b>
                </span>
                
                <div class="container">
                
                </div>
                <div class="interaction">
                   <a href="#"> <i class="fa fa-heart"  aria-hidden="true"></i></a>
                   <a href=""> <i class="fa fa-thumbs-down"></i></a>
                   @if(Auth::user() == $post->user)
                   <a href="#">Edit</a>
                   <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                   @endif   
                </div>
                <br>
            </article>
            @endforeach
        </div>
    </section>    
 @endsection
