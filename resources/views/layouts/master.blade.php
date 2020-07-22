<!DOCTYPE html>

<html >
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        {{-- font awesome link --}}
        <script src="https://use.fontawesome.com/bc90ac9303.js"></script>

        {{-- secure metthod to use the asset() for the specified path --}}
        <link rel="stylesheet" href="{{URL::to('src/css/main.css') }}">
    </head>
    <body>
    @include('includes.header')
       <div class="container">
            @yield('content')
       </div>

       {{-- jquery cdn link --}}

       <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
       
       {{-- bootstrap javascript,Popper.js j-query link --}}
       <script src="https://code.jquery.com/jquery-3.1.1.min.js">
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       
       <script src="{{URL::to('src/js/app.js') }}"></script> 
    </body>
</html>