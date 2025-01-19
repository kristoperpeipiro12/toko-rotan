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
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Log-out
                </button>
            </li>

        </ul>
        <div class="user-section-cus" id="user-section-cus">
            <a href="#" class=""><i class="fa-color-cus fa-solid fa-user"></i></a>
            <a href="{{ route('shop.cart') }}"><i class="fa-color-cus fa-solid fa-cart-shopping"></i></a>
        </div>
        <i class="fa-solid fa-bars" id="hum-menu-cus"></i>
    </nav>

    <!-- Log Out Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
