
<!doctype html>
<html lang="en">
<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
<style>
    .user_profile {
        max-width: 300px;
        max-height: 440px;
        border: 1px solid black;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 5px;


    }
</style>
@include('layouts.navigation')
    <div id="user_profile" class="user_profile">
        <div id="avatar" class="avatar"><img src="{{asset('images/avatar.jpg')}}" alt=""></div>
        <div id="name" class="user_name_email"><h1 class="">{{Auth::user()->name}}</h1></div>
        <div id="email" class="user_name_email"><h2>{{Auth::user()->email}}</h2></div>
        <div id="role" class="user_name_email" >
            <h2 class="text-black">{{Auth::user()->role}}</h2>
        </div>
        <div id="logout"><a href="{{route('register')}}">Logout</a></div>
    </div>
@include('layouts.footer')

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
