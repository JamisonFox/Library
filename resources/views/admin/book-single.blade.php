@extends('layouts.app')

    <!DOCTYPE html>
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

<div class="site-wrap">
    @include('layouts.navigation')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{route('admin_index')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$data_id->book_name}}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/book_7.jpg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <form action="{{route('req_res')}}" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id" value={{$data_id->id}}>
                        <a href=""><h2 class="text-black">Book name: {{$data_id->book_name}}</h2></a>
                    <p>User Description: {{$data_id->description}}</p>
                    <p><strong class="text-primary h4">Book Authors: {{$data_id->book_authors}}</strong></p>
                    <div class="mb-1 d-flex">
                    </div>
                    <div class="mb-5">


                    </div>
                    <h3 class="text-black">From: {{$data_id->username}}</h3>
                        <input type="submit" name="result" id="result" value="accept" class="buy-now btn btn-sm btn-primary bg-success">
                        <input type="submit" name="result" id="result" value="reject" class="buy-now btn btn-sm btn-primary bg-danger">
{{--                    <button class="btn btn-outline-primary js-btn-plus" name="accept" id="accept" type="submit">Accept</button>--}}
{{--                    <button class="btn btn-outline-primary js-btn-plus" name="reject" id="accept" type="submit">Reject</button>--}}

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.last_books')

    @include('layouts.footer')
</div>

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
