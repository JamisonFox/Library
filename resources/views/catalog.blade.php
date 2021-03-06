
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
      .line-limit-length {
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap; // Текст не переносится, поэтому часть, которая превышает одну строку, перехватывается и отображается ...
      }
  </style>
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
                    <a href="{{route('book_id',['id' => $el->id])}}"><img src="{{asset('images/book_7.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{route('book_id',['id' => $el->id])}}">{{$el->name}}</a></h3>
                    <p class="line-limit-length mb-0">{{$el->description}}</p>
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
                      @if($books->CurrentPage() * $books->Perpage() > $books->total())
                        <h1>{{$books->CurrentPage() * $books->Perpage() - ($books->CurrentPage() * $books->Perpage() - $books->total())}}--{{$books->total()}}</h1>
                      @else <h1>{{ $books->CurrentPage() * $books->Perpage() }}--{{$books->total()}}</h1>
                          @endif
                    <li>{{ $books->appends(['search' => request()->search, 'category' => request()->category])->links('vendor/pagination/default') }}</li>

                  </ul>
                </div>
              </div>
            </div>
          </div>



            <div class="border p-4 rounded mb-4">


                <div class="mb-4">
                    <form action="{{route('catalog')}}" method="get">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                    @foreach(\App\Models\Category::all() as $el)
                    <label for="s_sm" class="d-flex">
                        <input type="checkbox" id="{{$el->id}}" name="category[]" value="{{$el->id}}"class="mr-2 mt-1"><span class="text-black">{{$el->name}}</span>
                    </label>
                    @endforeach
                    <input type="submit" value="Choose">
                    </form>
                </div>


            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center">

                    <h2>Categories</h2>

                </div>
                @include('layouts.collections')

            </div>
          </div>
        </div>

      </div>
    </div>

  @include('layouts.footer')
  // убран тег div от wrap

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
