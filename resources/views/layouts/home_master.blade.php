<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
<title>e-Barter</title>
<link rel="shortcut icon" type="image/jpg" href="{{ asset('image/barter.png') }}"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/home.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js/home.js') }}">

    @yield('styles')
</head>
<body>
@include('partials.header')

@yield('content-wan')

<div class="container">
    @yield('content')
</div>


<script src="https://cdnjs.cloudflare.com/.../Chart.js/2.9.3/Chart.min.js"></script>
<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@yield('scripts')
</body>
<style>
body
{

  background:-webkit-linear-gradient(bottom, #0250c5, #ff98007a);

}
</style>
</html>