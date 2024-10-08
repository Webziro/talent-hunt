            <?php 
                session_start();
                include "includes/contact-details.php";
                include "includes/conn.php";
            ?>



            <!doctype html>
            <html lang=en-us>

                <head>
                    <meta charset=utf-8>
                    <title>
                        <?php echo $header ?>
                    </title>
                    <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
                    <meta name=description content="<?php echo $about;?>">
                    <meta name=author content="Themefisher">
                    <meta name=generator content="Hugo 0.92.0">
                    <link rel=stylesheet href=plugins/bootstrap/bootstrap.min.css>
                    <link rel=stylesheet href=plugins/fontawesome/font-awesome.min.css>
                    <link rel=stylesheet href=plugins/animate.css>
                    <link rel=stylesheet href=plugins/prettyPhoto.css>
                    <link rel=stylesheet href=plugins/owl/owl.carousel.css>
                    <link rel=stylesheet href=plugins/owl/owl.theme.css>
                    <link rel=stylesheet href=plugins/flex-slider/flexslider.css>
                    <link rel=stylesheet href=plugins/cd-hero/cd-hero.css>
                    <link rel=stylesheet href=scss/style.css media=screen>
                    <link id=style-switch href=presets/preset3.css media=screen rel=stylesheet type=text/css>

                    <link rel="shortcut icon" href=images/gmally-logo.jpeg type=image/x-icon>
                    <link rel=icon href=images/gmally-logo.jpeg type=image/x-icon>

                    <meta property="og:title" content="<?php echo $about;?>">
                    <meta property="og:description" content="<?php echo $about;?>">
                    <meta property="og:type" content="website">
                    <meta property="og:url" content="index.html">
                </head>



                <body>
                    <div class=body-inner>

                        <header id=header class="fixed-top header" role=banner>

                            <a class="navbar-brand navbar-bg" href=index.php>
                                <img class="img-fluid float-right" src=images/gmally-logo.jpeg
                                    alt="GMALLY OFFICIAL Logo" height="75px" width="75px">
                            </a>

                            <div class=container>
                                <nav class="navbar navbar-expand-lg navbar-dark">
                                    <button class="navbar-toggler ml-auto border-0 rounded-0 text-white" type=button
                                        data-toggle=collapse data-target=#navigation aria-controls=navigation
                                        aria-expanded=false aria-label="Toggle navigation">
                                        <span class="fa fa-bars"></span>
                                    </button>


                                    <div class="collapse navbar-collapse text-center" id=navigation>
                                        <ul class="navbar-nav ml-auto">
                                            <li class=nav-item>
                                                <a class=nav-link href=index.php>Home</a>
                                            </li>
                                            <li class=nav-item>
                                                <a class=nav-link href=index.php>About</a></a>
                                            </li>
                                            <li class=nav-item>
                                                <a class=nav-link href=#>Categories</a></a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href=# role=button
                                                    data-toggle=dropdown aria-haspopup=true aria-expanded=false>
                                                    Signup/Login
                                                </a>
                                                <div class=dropdown-menu>
                                                    <a class=dropdown-item href=auth/signup.php>Sign Up</a>
                                                    <a class=dropdown-item href=auth/signin.php>Login</a>
                                                </div>
                                            </li>
                                            <li class=nav-item>
                                                <a class=nav-link href=index.php>Contact</a></a>
                                            </li>
                                        </ul>

                                    </div>
                                </nav>
                            </div>
                        </header>


                        <div id=banner-area>
                            <img src=images/banner/tnc.jpg onerror="this.src='images/banner/tnc.jpg'" width="1680px"
                                height="500px" alt>
                            <div class=parallax-overlay></div>
                            <div class=banner-title-content>
                                <div class=text-center>
                                    <h2> Terms and Conditions </h2>
                                    <nav aria-label=breadcrumb>
                                        <ol class="breadcrumb justify-content-center">
                                            <li class=breadcrumb-item><a href=index.php>Home</a></li>
                                            <li class="breadcrumb-item text-white" aria-current=page>TERMS AND
                                                CONDITIONS GOSPEL MUSIC
                                                ALLY
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>


                        <section id=main-container>
                            <div class=container>
                                <div class=row>
                                    <div class="col-md-12 heading">
                                        <span class="title-icon classic float-left"><i class=fa></i></span>
                                        <h2 class="title classic">Our Policy documents</h2>
                                    </div>
                                </div>
                                <div class="row landing-tab">
                                    <div class="col-md-3 col-sm-5">
                                        <div class="nav flex-column nav-pills border-right" id=v-pills-tab role=tablist
                                            aria-orientation=vertical>
                                            <a class="animated fadeIn nav-link py-4 active d-flex align-items-center"
                                                data-toggle=pill href=#terms role=tab aria-selected=true>
                                                <i class="fa fa-info-circle mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Terms and Conditions</span>
                                            </a>

                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#cookies role=tab aria-selected=true>
                                                <i class="fa fa-briefcase mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Cookies Policy</span>
                                            </a>

                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#data-usage role=tab aria-selected=true>
                                                <i class="fa fa-book mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Data usage Policy</span>
                                            </a>
                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#indemity role=tab aria-selected=true>
                                                <i class="fa fa-pagelines mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Indemility</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="col-md-9 col-sm-7">
                                        <div class=tab-content id=v-pills-tabContent>


                                            <div class="tab-pane pl-sm-5 fade show active animated fadeInLeft" id=terms
                                                role=tabpanel>
                                                <i class="fa fa-info- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">We are bounded by the following terms and
                                                    conditions
                                                </h3>
                                                <p>Terms and conditiosn</p>
                                            </div>


                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=cookies
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">Cookie Policy</h3>
                                                <p>Cookies</p>
                                            </div>

                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=data-usage
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">Data Usagw</h3>
                                                <p>Data Usage</p>
                                            </div>


                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=indemity
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">Indemility</h3>

                                                <p>
                                                    Indemility
                                                </p>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class=gap-60></div>




                            <footer id=footer class=footer>
                                <div class=container>
                                    <div class=row>
                                        <div class="col-md-4 col-sm-12 footer-widget">
                                            <h3 class=widget-title>GM ALLY IS PROMOTING JESUS</h3>
                                            <div class="latest-post-items media mb-3">
                                                <div class="latest-post-content media-body">
                                                    <p><?php echo $about;?></p>

                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-4 col-sm-12 footer-widget">

                                        </div>


                                        <div class="col-md-3 col-sm-12 footer-widget footer-about-us">
                                            <h3 class=widget-title>About Us</h3>
                                            <p><?php echo $about;?></p>
                                            <h4 style="color: #F58634;">Address</h4>
                                            <p><?php echo $address;?></p>

                                            <div class=mb-4>
                                                <h4 style="color: #F58634;">Email:</h4>
                                                <p><?php echo $email;?></p>

                                            </div>
                                            <div class=mb-4>
                                                <h4 style="color: #F58634;">Phone No.</h4>
                                                <p><?php echo $phone;?></p>

                                            </div>
                                        </div>
                                        <!--gallery Ends-->

                                    </div>
                                </div>
                            </footer>

                            <section id=copyright class="copyright angle">
                                <div class=container>
                                    <div class=row>
                                        <div class="col-md-12 text-center">
                                            <ul class="footer-social unstyled">
                                                <li>
                                                    <a title=facebook
                                                        href=https://web.facebook.com/groups/724459561636634>
                                                        <span class="icon-pentagon wow bounceIn"><i
                                                                class="fa fa-facebook"></i></span>
                                                    </a>

                                                    <a title=telegram href=#>
                                                        <span class="icon-pentagon wow bounceIn"><i
                                                                class="fa fa-telegram"></i></span>
                                                    </a>
                                                    <a title=twitter href=#>
                                                        <span class="icon-pentagon wow bounceIn"><i
                                                                class="fa fa-twitter"></i></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class=row>
                                        <div class="col-md-12 text-center">
                                            <span
                                                class="text-muted d-block text-center text-sm-left d-sm-inline-block ">Copyright
                                                <? echo $client_name;?>
                                                &copy;
                                                2020 - <?php echo date("Y"); ?>
                                            </span>
                                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                                Developed by <a href="https://wa.link/k5cji9" target="_blank"
                                                    style="color: #F58634;"> <?php echo $company_name;?>
                                                </a> </span>
                                        </div>
                                    </div>
                                    <div id=back-to-top data-spy=affix data-offset-top=10
                                        class="back-to-top affix position-fixed">
                                        <button class="btn btn-primary" title="Back to Top"><i
                                                class="fa fa-angle-double-up"></i></button>
                                    </div>
                                </div>
                            </section>
                    </div>




                    <script data-cfasync="false"
                        src="https://demo.gethugothemes.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
                    </script>
                    <script src=plugins/jQuery/jquery.min.js></script>
                    <script src=plugins/bootstrap/bootstrap.min.js></script>
                    <script src=plugins/style-switcher.js></script>
                    <script src=plugins/owl/owl.carousel.js></script>
                    <script src=plugins/jquery.prettyPhoto.js></script>
                    <script src=plugins/flex-slider/jquery.flexslider.js></script>
                    <script src=plugins/cd-hero/cd-hero.js></script>
                    <script src=plugins/isotope.js></script>
                    <script src=plugins/ini.isotope.js></script>
                    <script src=plugins/wow.min.js></script>
                    <script src=plugins/jquery.easing.1.3.js></script>
                    <script src=plugins/jquery.counterup.min.js></script>
                    <script src=plugins/waypoints.min.js></script>
                    <script src=js/script.min.js></script>
                </body>

            </html>