    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <a class="navbar-brand text-white"
                            href="{{ route('store.index') }}">{{ __('Dokkan ELMansoura') }}</a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form role="search" id="search-form-nav" action="{{ route('store.search') }}">
                            <div class="input-group">
                                <input type="search" placeholder="{{ __('Search for product') }}" class="form-control"
                                    name="search_word">
                                <button class="btn bg-white rounded" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @auth
                        <div class="col-md-5 my-auto">
                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart.view') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ __('Cart') }} <span class="badge badge-pill bg-danger cart_counter"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('wish.list.view') }}">
                                        <i class="fa fa-heart"></i> {{ __('Wish') }}
                                        <span class="badge badge-pill bg-success wish_list_counter"></span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                        {{ Auth::user()->first_name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('profile.view') }}"><i
                                                    class="fa fa-user"></i>{{ __('Profile') }}</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('orders.all') }}"><i
                                                    class="fa fa-list"></i>{{ __('My Orders') }}</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('wish.list.view') }}"><i
                                                    class="fa fa-heart"></i> {{ __('My Wishlist') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ route('cart.view') }}"><i
                                                    class="fa fa-shopping-cart"></i>{{ __('My Cart') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i>
                                                {{ __('Logout') }}
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    @guest
                        <div class="col-md-5 my-auto">
                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="{{ route('store.index') }}">
                    Dokkan ELMansoura
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'bg-info' : '' }}"
                                href="{{ route('store.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('store/search') ? 'bg-info' : '' }}"
                                href="{{ route('store.search') }}">{{ __('All Products') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('store/categories') ? 'bg-info' : '' }}"
                                href="{{ route('store.categories') }}">{{ __('Categories') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('store/merchants/all') ? 'bg-info' : '' }}"
                                href="{{ route('merchants.all') }}">{{ __('Merchants') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Electronics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fashions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accessories</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('set.locale', 'en') }}">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('set.locale', 'ar') }}">العربية</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
