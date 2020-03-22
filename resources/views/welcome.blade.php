<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sales Ruby Limited, Lagos, Nigeria">
    <meta name="keywords" content="Sales Ruby Limited, Lagos, Nigeria">
    <meta name="author" content="Chilaka Michael Obinna, Johnson Inya, Hannah Okwelum">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Ruby | Sales CRM Solution</title>
    <link rel="stylesheet" href="{{asset('theme-login/bcss/bootstrap.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('theme-login/bcss/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('theme-login/bcss/style.css')}}">
    <link rel="shortcut icon" href="{{asset('theme-login/img/SR-favicon.png')}}" type="image/x-icon">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

<section class="nav-section">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('theme-login/img/srlogo-smallwhite.png')}}" alt="Sales CRM Solutions" class="home-logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if (Route::has('login'))
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li><a style="color: white;" href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li><a style="color: white;" href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a style="color: white;" href="{{ route('register') }}">Register</a></li>
                                @endif
                                @endauth
                    </ul>
                @endif
            </div>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>

<section class="hero-section">
    <div class="container">
        <div class="row row-grid">
            <div class="col-md-6">
                <h1>Helps sales process <br> inefficiency in all<span> industries</span> avialable.</h1>
                <p>Calls. Email Tracking. Closed Deal</p>
                <div class="social">
                </div>
            </div>
            <div class="col-md-6">
                <div class="cont-data">
                    <img src="{{asset('theme-login/img/header-img.png')}}" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1></h1>
            </div>
        </div>
        <div class="row row-grid">
            <div class="col-md-4">
                <div class="abt-card text-center">
                    <!-- <img src="Assets/img/strategic.png"> -->
                    <h4>Calls</h4>
                    <p>We've also been very fortunate to establish strategic partnerships in places like Buffalo and New
                        York
                        City which have been instrumental to our success. </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="abt-card text-center">
                    <!-- <img src="Assets/img/impact.png"> -->
                    <h4>Emails Tracking</h4>
                    <p>Today we're working on 16 different environment related projects around the state of New York and
                        are
                        actively looking for more people to join our team.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="abt-card text-center">
                    <!-- <img src="Assets/img/passion.png"> -->
                    <h4>Closed Deal</h4>
                    <p>We're a lot more than a group of environmentalists. We're a team of volunteers that is committed
                        to
                        helping the environment and the communities around us.</p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>

<section class="projects-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>About Sales Ruby CRM</h1>
                <p class="projects">The Customer Relationship Management (CRM) is a technology that enhances business
                    ability to cultivate and nuture customer relationships. It improves business relationships, it helps
                    companies stay connected within and to customers, streamline processes, and improve
                    profitability.</p>
            </div>
        </div>
        <br><br><br>
        <div class="row row-grid">
            <div class="col-md-4">
                <div class="proj-card">
                    <!-- <img src="Assets/img/image_1.png" class="img-responsive"> -->
                </div>
                <h5>Why is it important for your business?</h5>
                <p class="text-justify">CRM enables businesses to establish long-term relationships with their prospects
                    and customers by making personalized, meaningful interactions. This helps businesses not only
                    increase profitability but improve customer retention. <br>
                    <!-- <a href="#">Read more</a> -->
                </p>
            </div>
            <div class="col-md-4">
                <div>
                    <h5>Who can use CRM?</h5>
                    <p class="text-justify">Whether you are a startup, a small business, or an enterprise, in the B2B or
                        B2C space, a CRM brings order and clarity, helps improve interactions with customers, optimizes
                        sales performance, and streamlines business processes.<br>
                        - Marketing teams need to be in absolute sync with sales teams to measure the return on
                        investment (ROI) on their efforts.<br>
                        - Sales teams can use CRM tools to get a deeper understanding of their prospects and customers,
                        and manage their sales pipeline better. <br>
                        - Customer support teams can use CRM to help improve customer retention rates. <br>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="proj-card">
                    <h5>Benefits of using CRM Software</h5>
                    <p class="text-justify">From prospect to customer, their journey is captured in the CRM.<br>
                        CRM lets you automate mundane tasks like creating contacts from signup forms and sending welcome
                        emails to new prospects. <br>
                        The CRM system becomes a single source of truth for every member of your team.<br>
                        <!-- <a href="#">Read more</a> -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Contact Us</h1>
            </div>
        </div>

        <div class="contact-card">
            <div class="row row-grid contact-form">
                <div class="col-md-6">
                    <label class="form1">Your Name</label>
                    <p><input type="text" placeholder="John Wick"></p><br><br>
                    <label class="form1">Your Email</label>
                    <p><input type="email" placeholder="example@gmail.com"></p><br><br>
                    <label class="form1">Enter your Message</label>
                    <p><textarea placeholder="Hey! I need some help from you people. Please mail me. Thanks"
                                 id="Hey! I need some help from you people. Please mail me. Thanks" cols="30"
                                 rows="4"></textarea></p>

                    <button type="submit">Send Message</button>
                </div>
                <div class="col-md-6">
                    <div class="contact-data">
                        <p><img src="{{asset('theme-login/img/address_icon.svg')}}" alt=""> &nbsp &nbsp Address: No 14
                            Amara-Olu, Lagos,
                            Nigeria
                        </p><br><br><br>
                        <p><img src="{{asset('theme-login/img/Phone _icomn.svg')}}" alt=""> &nbsp &nbsp Phone: 09070047688,
                            09070047683
                        </p><br><br><br>
                        <p><img src="{{asset('theme-login/img/Email_icon.svg')}}" alt=""> &nbsp &nbsp Mail:
                            sales@salesruby.com</p><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="foot-logo">
                    <img src="{{asset('theme-login/img/srlogo-small.png')}}" alt="Sales CRM Solutions" class="footer-logo">
                    &nbsp
                    <!-- <p> -->
                    <span> &copy SalesRuby Limited 2020</span>
                    <ul class="social-icon">
                        <li><a href="https://www.facebook.com/salesruby/?ref=br_rs"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://twitter.com/SalesRubyNG"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/salesruby/"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/salesruby"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('theme-login/js/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('theme-login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme-login/js/main.js')}}"></script>
</body>

</html>