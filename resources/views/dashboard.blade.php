@extends('layouts.master')

@section('content')
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
                <header><h3>What do you have to Say?</h3></header>
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
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, necessitatibus 
                    ex dignissimos aperiam sit iure velit voluptas, voluptatem inventore, reprehenderit tempora
                     enim numquam? Modi alias numquam porro esse placeat facere.
                </p>
                <div class="info">
                    Posted by Fred on 12th July 2020
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Disike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
                <br>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem,
                     necessitatibus ex dignissimos aperiam sit iure velit voluptas, voluptatem inventore,
                      reprehenderit tempora enim numquam? Modi alias numquam porro esse placeat facere.
                </p>
                <div class="info">
                    Posted by Fred on 12th July 2020
                </div>
                <br>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Disike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>

        </div>
    </section>    
 @endsection
