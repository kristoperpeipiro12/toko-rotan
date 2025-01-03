@extends('customer.layouts.app')
@section('title', 'AL-ZAHRA')
@section('content')
    <div class="fh5co-loader"></div>
    <div id="page">
        @include('customer.includes.navbar')

        <aside id="fh5co-hero" class="js-fullheight">
            <div class="flexslider js-fullheight">
                <ul class="slides">
                    <li style="background-image: url('{{ asset('clone/images/img_bg_1.jpg') }}');">

                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$800</span>
                                        <h2>Alato Cabinet</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove.</p>
                                        <p><a href="{{ route('customer.detail') }}"
                                                class="btn btn-primary btn-outline btn-lg">Beli Sekarang</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url('{{ asset('clone/images/img_bg_2.jpg') }}');">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$530</span>
                                        <h2>The Haluz Rocking Chair</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in
                                            Bookmarksgrove.</p>
                                        <p><a href="{{ route('customer.detail') }}"
                                                class="btn btn-primary btn-outline btn-lg">Beli Sekarang</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url('{{ asset('clone/images/img_bg_3.jpg') }}');">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$750</span>
                                        <h2>Alato Cabinet</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                        </p>
                                        <p><a href="{{ route('customer.detail') }}"
                                                class="btn btn-primary btn-outline btn-lg">Beli Sekarang</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url('{{ asset('clone/images/img_bg_4.jpg') }}');">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">$540</span>
                                        <h2>The WW Chair</h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                        </p>
                                        <p><a href="{{ route('customer.detail') }}"
                                                class="btn btn-primary btn-outline btn-lg">Beli
                                                Sekarang</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <div id="fh5co-services" class="fh5co-bg-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-credit-card"></i>
                            </span>
                            <h3>Credit Card</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-wallet"></i>
                            </span>
                            <h3>Save Money</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-paper-plane"></i>
                            </span>
                            <h3>Free Delivery</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fh5co-product">
                <div class="container">
                    {{-- <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Cool Stuff</span>
                    <h2>Products.</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div> --}}

                    <div class="row">
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ asset('clone/images/product-1.jpg') }});">
                                    <div class="inner">
                                        <p>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-shopping-cart"></i></a>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('customer.detail') }}">Hauteville Concrete Rocking Chair</a></h3>
                                    <span class="price">$350</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ asset('clone/images/product-2.jpg') }});">
                                    <span class="sale">Sale</span>
                                    <div class="inner">
                                        <p>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-shopping-cart"></i></a>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('customer.detail') }}">Pavilion Speaker</a></h3>
                                    <span class="price">$600</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ asset('clone/images/product-3.jpg') }});">
                                    <div class="inner">
                                        <p>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-shopping-cart"></i></a>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('customer.detail') }}">Ligomancer</a></h3>
                                    <span class="price">$780</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ asset('clone/images/product-4.jpg') }});">
                                    <div class="inner">
                                        <p>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-shopping-cart"></i></a>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('customer.detail') }}">Alato Cabinet</a></h3>
                                    <span class="price">$800</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ asset('clone/images/product-5.jpg') }});">
                                    <div class="inner">
                                        <p>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-shopping-cart"></i></a>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('customer.detail') }}">Earing Wireless</a></h3>
                                    <span class="price">$100</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ asset('clone/images/product-6.jpg') }});">
                                    <div class="inner">
                                        <p>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-shopping-cart"></i></a>
                                            <a href="{{ route('customer.detail') }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('customer.detail') }}">Sculptural Coffee Table</a></h3>
                                    <span class="price">$960</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-testimonial" class="fh5co-bg-section">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <span>Testimony</span>
                            <h2>Happy Clients</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row animate-box">
                                <div class="owl-carousel owl-carousel-fullwidth">
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <figure>
                                                <img src="{{ asset('clone/images/person1.jpg') }}" alt="user">

                                            </figure>
                                            <span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
                                            <blockquote>
                                                <p>&ldquo;Far far away, behind the word mountains, far from the countries
                                                    Vokalia and Consonantia, there live the blind texts. Separated they live
                                                    in Bookmarksgrove right at the coast of the Semantics, a large language
                                                    ocean.&rdquo;</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <figure>
                                                <img src="{{ asset('clone/images/person2.jpg') }}" alt="user">
                                            </figure>
                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                            <blockquote>
                                                <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the
                                                    Semantics, a large language ocean.&rdquo;</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <figure>
                                                <img src="{{ asset('clone/images/person3.jpg') }}" alt="user">
                                            </figure>
                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                            <blockquote>
                                                <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the
                                                    blind texts. Separated they live in Bookmarksgrove right at the coast of
                                                    the Semantics, a large language ocean.&rdquo;</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fh5co-counter" class="fh5co-bg fh5co-counter"
                style="background-image:url({{ asset('clone/images/img_bg_5.jpg') }});">

                {{-- <div class="container">
        <div class="row">
            <div class="display-t">
                <div class="display-tc">
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-eye"></i>
                            </span>

                            <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Creativity Fuel</span>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-shopping-cart"></i>
                            </span>

                            <span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Happy Clients</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-shop"></i>
                            </span>
                            <span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">All Products</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-clock"></i>
                            </span>

                            <span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Hours Spent</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
            </div>

            {{-- <div id="fh5co-started">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Newsletter</h2>
                <p>Just stay tune for our latest Product. Now you can subscribe</p>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-inline">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

            <footer id="fh5co-footer" role="contentinfo">
                <div class="container">
                    <div class="row row-pb-md">
                        <div class="col-md-4 fh5co-widget">
                            <h3>Shop.</h3>
                            <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta
                                adipisci architecto culpa amet.</p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                            <ul class="fh5co-footer-links">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Meetups</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                            <ul class="fh5co-footer-links">
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Handbook</a></li>
                                <li><a href="#">Held Desk</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                            <ul class="fh5co-footer-links">
                                <li><a href="#">Find Designers</a></li>
                                <li><a href="#">Find Developers</a></li>
                                <li><a href="#">Teams</a></li>
                                <li><a href="#">Advertise</a></li>
                                <li><a href="#">API</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row copyright">
                        <div class="col-md-12 text-center">
                            <p>
                                <small class="block">&copy; 2018 Free HTML5. All Rights Reserved.</small>
                                <small class="block">Designed by <a href="http://freehtml5.co/"
                                        target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/"
                                        target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/"
                                        target="_blank">Unsplash</a></small>
                            </p>
                            <p>
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            </ul>
                            </p>
                        </div>
                    </div>

                </div>
            </footer>
        </div>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
        </div>


    @endsection
