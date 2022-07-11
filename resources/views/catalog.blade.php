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
          <div class="col-md-12 mb-0"><a href="{{route('index')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Latest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Men</a>
                      <a class="dropdown-item" href="#">Women</a>
                      <a class="dropdown-item" href="#">Children</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevance</a>
                      <a class="dropdown-item" href="#">Name, A to Z</a>
                      <a class="dropdown-item" href="#">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Price, low to high</a>
                      <a class="dropdown-item" href="#">Price, high to low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">

             @foreach($books as $el)
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="{{route('book_id',['id' => $el->id])}}"><img src="images/cloth_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{route('book_id',['id' => $el->id])}}">{{$el->name}}</a></h3>
                    <p class="mb-0">{{$el->description}}</p>
                    <p class="text-primary font-weight-bold">{{$el->authors}}</p>
                  </div>
                </div>
              </div>
                @endforeach


            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                      <h1>{{ $books->CurrentPage() * $books->Perpage() }}--{{$books->total()}}</h1>

                    <li>{{ $books->appends(['search' => request()->search])->links('vendor/pagination/default') }}</li>

                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
                <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                </div>

                <div class="mb-4">
                    <form action="{{route('catalog')}}" method="get">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                    @foreach(\App\Models\Category::all() as $el)
                    <label for="s_sm" class="d-flex">
                        <input type="checkbox" id="{{$el->id}}" name="category[]" value="{{$el->id}}"class="mr-2 mt-1"><span class="text-black">{{$el->name}}</span>
                    </label>
                    @endforeach
                    <input type="submit">
                    </form>
                </div>

                <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                    </a>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                    </a>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                    </a>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                    </a>
                </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Categories</h2>
                  </div>
                </div>
                @include('layouts.collections')

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
