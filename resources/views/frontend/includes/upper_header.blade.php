<!-- upper header section -->
<?php
    use App\Model\Admin\Paintings;

    $cartCount = Paintings::cartCount();
?>
    <div class="py-1 bg-primary">
        <div class="container mt-2">
            <div class="row no-gutters d-flex align-items-start align-items-center">
                <div class="row d-flex col-md-12">
                    <div class="col-md-4 d-flex  align-items-start">
                        <form action="{{url('/searchPainting')}}">
                            @csrf
                            <input type="text" name="paintings" placeholder="Search Painting" style="border-radius: 3px;">
                            {{-- <button type="submit" style="border:0px; height:33px; margin-left:-3px">Search</button> --}}
                        </form>
                    </div>
                    <div class="col-md-4 d-flex text-lg-right justify-content-center">
                        <a href="{{url('/myOrders')}}" class="nav-link" style="border:0px; height:33px;">Track my Order</a></li>
                    </div>
                    <div class="col-md-4 d-flex  text-lg-right justify-content-end">
                        <a href="{{url('/cart')}}" class="nav-link" style="border:0px; height:33px;">Cart</a><span class="icon-shopping_cart" style="border:0px; height:33px; margin-top:4%;"></span><p style="margin-top: 3%;">[{{ $cartCount }}]</p></a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- navigation bar section -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">ArtsyWish</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exhibition</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{url('/ongoingExhibition')}}">Ongoing Exhibition</a>
                            <a class="dropdown-item" href="{{url('/comingExhibition')}}">Coming Exhibition</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">Contact</a></li>

                    @if (empty(Auth::guard('customers')->check()))
                        <li class="nav-item"><a href="{{ url('/loginCustomer') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ url('/registerCustomer') }}" class="nav-link">Sign Up</a></li>
                    @else
                        <li class="nav-item"><a href="#" class="nav-link">{{ \Auth::guard('customers')->user()->name }}'s Account</a></li>
                        <li class="nav-item"><a href="{{url('/userLogout')}}" class="nav-link">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
