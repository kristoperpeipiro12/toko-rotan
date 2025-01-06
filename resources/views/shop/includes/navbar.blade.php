<div class="wrap-nav-cus-1">
    <nav class="nav-cus-1">
        <span class="brand-cus">AL-ZAHRA</span>
        <ul class="nav-item-wrap-cus" id="nav-hide-cus">
            <li class="nav-item-cus"><a class="hover-eff-cus hover-eff-mq-cus" href="{{ route('shop.home') }}">Home</a>
            </li>
            <li class="nav-item-cus"><a class="hover-eff-cus hover-eff-mq-cus" href="{{ route('shop.shop') }}">Shop</a>
            </li>
            <li class="nav-item-cus"><a class="hover-eff-cus hover-eff-mq-cus"
                    href="{{ route('shop.about') }}">About</a></li>
            <li class="nav-item-cus"><a class="hover-eff-cus hover-eff-mq-cus"
                    href="{{ route('shop.home') . '#contact' }}">Contact</a></li>
            {{-- <li class="nav-item-cus hidden-tablet">
                <a class="btn-dropdown-cus-1 hover-eff-cus hover-eff-mq-cus" href="#">iTech</a>
                <ul class="dropdown-cus-1" id="dd-cus">
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Log-out</a></li>
                </ul>
            </li> --}}
            <li class="nav-item-cus hidden-li-cus hover-eff-mq-cus"><a href="#">Account</a></li>
            <li class="nav-item-cus hover-eff-mq-cus">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link" style="text-decoration: none; color: inherit; padding: 0; border: none; background: none;">
                        Log-out
                    </button>
                </form>
            </li>
        </ul>
        <div class="user-section-cus" id="user-section-cus">
            <a href="#" class=""><i class="fa-color-cus fa-solid fa-user"></i></a>
            <a href="{{ route('shop.cart') }}"><i class="fa-color-cus fa-solid fa-cart-shopping"></i></a>
        </div>
        <i class="fa-solid fa-bars" id="hum-menu-cus"></i>
    </nav>


</div>
