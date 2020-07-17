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

       

    </body>
</html>