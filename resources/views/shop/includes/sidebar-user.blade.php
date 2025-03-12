<div class="sidebar">
    <div class="logo-details">
        {{-- <i class="bx bxl-c-plus-plus icon"></i> --}}
        <div class="logo_name">AL-ZAHRA</div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('cs.account') }}">
                <i class="bx bx-user"></i>
                <span class="links_name">Akun</span>
            </a>
            <span class="tooltip">Akun</span>
        </li>
        <li>
            <a href="#">
                <i class="bx bx-chat"></i>
                <span class="links_name">Mail</span>
            </a>
            <span class="tooltip">Mail</span>
        </li>
        <li>
            <a href="{{ route('shop.cart') }}">
                <i class="bx bx-cart-alt"></i>
                <span class="links_name">Keranjang</span>
            </a>
            <span class="tooltip">Keranjang</span>
        </li>

        <li class="profile hover-here" id="openModalBtn">
            <span class="logout-span">Keluar</span>
            <i class="bx bx-log-out" id="log_out"></i>
        </li>
    </ul>
</div>
