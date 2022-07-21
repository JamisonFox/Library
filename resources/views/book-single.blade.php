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
  <style>
      .col-md-6 {

      }
  </style>

  <body>

  <div class="site-wrap">
    @include('layouts.navigation')

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('index')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$data->name}}</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
          <form action="{{route('req_data')}}" method="post">
        <div class="row">
                @csrf
          <div class="col-md-6">
            <img src="{{asset('images/book_7.jpg')}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6" >
            <h2 class="text-black">Book name: {{$data->name}}</h2>
             <h3 class="text-black">Book authors: {{$data->authors}}</h3>
              <h4 class="text-black">Description: {{$data->description}}</h4>
              <p>Categories: <strong class="text-primary h4">
                      @foreach($categories as $el)
                          {{$el->name}}
                      @endforeach
                  </strong></p>
                  <input type="hidden" id="username" name="username" value="{{Auth::user()->name}}">
                 <input type="hidden" id="book_name" name="book_name" value="{{$data->name}}">
              <input type="hidden" id="book_authors" name="book_authors" value="{{$data->authors}}">
              <textarea rows="5" cols="45" name="desc" id="desc" class="mb-5" placeholder="Return time, for what"></textarea>
                  <input type="submit" class="buy-now btn btn-sm btn-primary" value="Tap to Request">
          </div>
        </div>
          </form>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
                @foreach($data_all as $el)
                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="{{asset('images/book_7.jpg')}}" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{route('book_id')}}">{{$el->name}}</a></h3>
                                <p class="mb-0">{{$el->authors}}</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

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
