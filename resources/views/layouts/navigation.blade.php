<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="{{ route('search') }}" method="get" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                        <input type="text" class="form-control border-0" id="search" name="search" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="{{route('index')}}" class="js-logo-clone">Shoppers</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <li><a href="{{route('personal')}}"><span class="icon icon-person">{{Auth::user()->name}}</span></a></li>

                            <li>
                                @if(Auth::user()->role === 'admin')
                                         <a href="{{route('admin_cart')}}" class="site-cart">
                                    @else
                                        <a href="{{route('cart')}}" class="site-cart">
                                    @endif

                                    <span class="icon icon-shopping_cart"></span>
                                        </a>

                            </li>
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li class="has-children active">
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="">
                    <a href="{{route('about')}}">About</a>
                </li>
                <li><a href="{{route('catalog')}}">Catalog</a></li>
                @if(Auth::user()->role === 'admin')
                    <li><a href="{{route('admin_index')}}">Admin Panel</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>

