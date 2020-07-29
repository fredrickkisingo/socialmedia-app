@extends('layouts.master')

@section('title')
Account
@endsection

@section('content')
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header><h3>Your Account</h3></header>
        {!!Form::open(['action'=> 'UserController@postSaveAccount', 'method'=>'POST', 'enctype'=> 'multipart/form-data']) !!}
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
            </div>
            <div class="form-group">
                <label for="image">Image (only .jpg)</label><br>
               {{Form::file('cover_image')}}
            </div>
            <button type="submit" class="btn btn-primary">Save Account</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
       {!! Form::close() !!}
    </div>
</section>
    <section class="row new-post">

    <div class="col-md-6 col-md-offset-3">
        <img class="img-fluid" style="max-width:100%; max-height:100%;"  src="/storage/cover_images/{{$user->cover_image}}">
    </div>
</section>
{{-- @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <img src="{{ URL::to('img/' . $file)  }}" alt="" class="img-responsive">
        </div>
    </section>
@endif --}}
@endsection