@extends('layouts.master')
@section('title')
        SugarApp
@endsection
@section('content')
           @include('includes.message')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            {{-- this one is to hit the routes in the web.php --}}
            {!!Form::open(['action'=> 'UserController@postSignup', 'method'=>'POST', 'enctype'=> 'multipart/form-data']) !!}
            <div class="form-group {{ $errors->has('email')?'is-invalid':''}}">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control"  type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group{{ $errors->has('first_name') ? 'is-invalid' :''}}">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>

                <div class="form-group">
                    <label for="cover_image">Image (only .jpg)</label><br>
                   {{Form::file('cover_image')}}
                </div>

                <div class="form-group{{ $errors->has('password') ? 'is-invalid':''}}">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password"value="{{ Request::old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            {!! Form::close() !!}
        </div>   

             <div class="col-md-6">
                   <h3>Sign In</h3>
                    <form action="{{route('signin') }}" method="post">
                        <div class="form-group">
                            <label for="email">Your E-Mail</label>
                            <input class="form-control" type="text" name="email" id="email"value="{{ Request::old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password"value="{{ Request::old('password') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{Session::token() }}">
                    </form>  
               </div>      
    </div>
@endsection