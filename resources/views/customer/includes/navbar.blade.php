<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-2">
                <div id="fh5co-logo"><a href="{{ route('customer.home') }}">Al-Zahra</a></div>
            </div>
            <div class="col-md-6 col-xs-6 text-center menu-1">
                <ul>
                    <li><a href="{{ route('customer.home') }}">Products</a></li>
                    <li><a href="{{ route('customer.about') }}">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                <ul>
                    {{-- <li class="search">
                        <div class="input-group">
                            <input type="text" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </li> --}}
                    <li><a href="{{ route('login') }}"><span><i class="icon-user"></i></span></a></li>
                </ul>
            </div>
        </div>

    </div>
</nav>
