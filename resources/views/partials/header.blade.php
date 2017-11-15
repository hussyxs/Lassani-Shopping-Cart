@push('styles-header')
    <link rel="stylesheet" href="{{ URL::to('css/header.css') }}">
@endpush

<section id="header">
    <div class="logo">
        <a href="{{ route('product.index') }}">
            <img src="{{ URL::to('img/LOGO.jpeg')}}" alt="Lassani Tandoori">
        </a>
    </div>
    <div id="menu" class="menu">
        <ul>
            <li>
               <a href="{{ route('product.shoppingCart') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shopping Cart
                <span class="badge">
                    {{Session::has('cart') ? Session::get('cart')->totalQty : ''}}
                </span>
                </a>
                
            </li>
            <li class="drpdwn">
                <a href="javascript:void(0)">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    User Management
                </a>
                <div class="dropdown-content">
                    <ul>
                        @if (Auth::check())
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    User Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.logout') }}">
                                    Sign Out
                                </a>
                            </li>
                        @else
                           <li>
                                <a href="{{ route('user.signup') }}">
                                    Sign Up
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.signin') }}">
                                    Sign In
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
            <li class="icon">
                <a href="javascript:void(0);" onclick="myFunction()">
                    &#9776;
                </a>
            </li>
        </ul> 
    </div>
</section>

@push('scripts-header')
    <script type="text/javascript" src="{{ URL::to('js/header.js')}}"></script>
@endpush