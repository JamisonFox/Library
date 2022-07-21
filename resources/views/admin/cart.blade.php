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
<style>
    .my_containers {
        max-width: 500px;
        max-height: 650px;
        border: 1px solid black;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 5px
    }
    .my_wrap {
        min-width: 400px;
        min-height: 270px;
        display: flex;
        align-items: flex-start;
        justify-content: space-around;
        flex-direction: row;
    }
    .my_textarea {
       font-size:15px;
    }
</style>
<div class="site-wrap">
    @include('layouts.navigation')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{route('admin_index')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="site-blocks-table">

                        <form action="{{route('admin_post')}}" method="post">
                            @csrf

                            <div class="my_containers">
                                <div class="my_wrap">
                                <div class="my_sec_cont">

                                    <p><input type="text" name="name" id="name" placeholder="Book name"></p>
                                    <p><input type="text" name="authors" id="authors" placeholder="authors"></p>
                                    <p><input type="text" name="pages" id="pages" placeholder="pages"></p>
                                    <p><textarea class="my_textarea" rows="7" cols="25" name="description" id="description" placeholder="description"></textarea></p>
                                    <p><input type="text" name="year" id="year" placeholder="year"></p>
                                </div>
                                <div class="my_third_cont">
                                    <p><strong>Выбери категории</strong></p>
                                    <p><select name="categories[]" multiple>
                                            @foreach(\App\Models\Category::all() as $el)
                                                <option value="{{$el->id}}">{{$el->name}}</option>
                                            @endforeach
                                    </select></p>
                                </div>
                                </div>
                            <input type="submit" value="Send">
                            </div>
                        </form>


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
