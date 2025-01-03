@extends('customer.layouts.app')
@section('title', 'AL-ZAHRA')
@section('content')
    <div class="fh5co-loader"></div>

    <div id="page">
        @include('customer.includes.navbar')
        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
            style="background-image:url(images/img_bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>Product Details</h1>
                                <h2>Free html5 templates by <a href="https://themewagon.com/theme_tag/free/"
                                        target="_blank">Themewagon</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="fh5co-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 animate-box">
                        <div class="owl-carousel owl-carousel-fullwidth product-carousel">
                            <div class="item">
                                <div class="active text-center">
                                    <figure>
                                        <img src="images/product-single-1.jpg" alt="user">
                                    </figure>
                                </div>
                            </div>
                            <div class="item">
                                <div class="active text-center">
                                    <figure>
                                        <img src="images/product-single-2.jpg" alt="user">
                                    </figure>
                                </div>
                            </div>
                            <div class="item">
                                <div class="active text-center">
                                    <figure>
                                        <img src="images/product-single-3.jpg" alt="user">
                                    </figure>
                                </div>
                            </div>
                            <div class="item">
                                <div class="active text-center">
                                    <figure>
                                        <img src="images/product-single-4.jpg" alt="user">
                                    </figure>
                                </div>
                            </div>
                            <div class="item">
                                <div class="active text-center">
                                    <figure>
                                        <img src="images/product-single-5.jpg" alt="user">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                <h2>Hauteville Rocking Chair</h2>
                                <p>
                                    <a href="#" class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
                                    <a href="#" class="btn btn-primary btn-outline btn-lg">Compare</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="fh5co-tabs animate-box">
                            <ul class="fh5co-tab-nav">
                                <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i
                                                class="icon-file"></i></span><span class="hidden-xs">Product
                                            Details</span></a></li>
                                <li><a href="#" data-tab="2"><span class="icon visible-xs"><i
                                                class="icon-bar-graph"></i></span><span
                                            class="hidden-xs">Specification</span></a></li>
                                <li><a href="#" data-tab="3"><span class="icon visible-xs"><i
                                                class="icon-star"></i></span><span class="hidden-xs">Feedback &amp;
                                            Ratings</span></a></li>
                            </ul>

                            <!-- Tabs -->
                            <div class="fh5co-tab-content-wrap">

                                <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                                    <div class="col-md-10 col-md-offset-1">
                                        <span class="price">SRP: $350</span>
                                        <h2>Hauteville Rocking Chair</h2>
                                        <p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                            adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta
                                            eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam
                                            officiis est.</p>

                                        <p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam
                                            fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus
                                            libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h2 class="uppercase">Keep it simple</h2>
                                                <p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="uppercase">Less is more</h2>
                                                <p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="fh5co-tab-content tab-content" data-tab-content="2">
                                    <div class="col-md-10 col-md-offset-1">
                                        <h3>Product Specification</h3>
                                        <ul>
                                            <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                                adipisci dignissimos consectetur magni quas eius</li>
                                            <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit
                                                soluta eligendi</li>
                                            <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                            <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis
                                                fugit? Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                        </ul>
                                        <ul>
                                            <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                                adipisci dignissimos consectetur magni quas eius</li>
                                            <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit
                                                soluta eligendi</li>
                                            <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                            <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis
                                                fugit? Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="fh5co-tab-content tab-content" data-tab-content="3">
                                    <div class="col-md-10 col-md-offset-1">
                                        <h3>Happy Buyers</h3>
                                        <div class="feed">
                                            <div>
                                                <blockquote>
                                                    <p>Paragraph placeat quis fugiat provident veritatis quia iure a
                                                        debitis adipisci dignissimos consectetur magni quas eius nobis
                                                        reprehenderit soluta eligendi quo reiciendis fugit? Veritatis
                                                        tenetur odio delectus quibusdam officiis est.</p>
                                                </blockquote>
                                                <h3>&mdash; Louie Knight</h3>
                                                <span class="rate">
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <blockquote>
                                                    <p>Paragraph placeat quis fugiat provident veritatis quia iure a
                                                        debitis adipisci dignissimos consectetur magni quas eius nobis
                                                        reprehenderit soluta eligendi quo reiciendis fugit? Veritatis
                                                        tenetur odio delectus quibusdam officiis est.</p>
                                                </blockquote>
                                                <h3>&mdash; Joefrey Gwapo</h3>
                                                <span class="rate">
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-started">
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
        </div>

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
                            <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
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
