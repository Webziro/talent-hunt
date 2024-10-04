            <?php 
                session_start();
                include "../includes/contact-details.php";
                
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
                    <link rel=stylesheet href=../plugins/bootstrap/bootstrap.min.css>
                    <link rel=stylesheet href=../plugins/fontawesome/font-awesome.min.css>
                    <link rel=stylesheet href=../plugins/animate.css>
                    <link rel=stylesheet href=../plugins/prettyPhoto.css>
                    <link rel=stylesheet href=../plugins/owl/owl.carousel.css>
                    <link rel=stylesheet href=../plugins/owl/owl.theme.css>
                    <link rel=stylesheet href=../plugins/flex-slider/flexslider.css>
                    <link rel=stylesheet href=../plugins/cd-hero/cd-hero.css>
                    <link rel=stylesheet href=../scss/style.css media=screen>
                    <link id=style-switch href=../presets/preset3.css media=screen rel=stylesheet type=text/css>

                    <link rel="shortcut icon" href=../images/gmally-logo.jpeg type=image/x-icon>
                    <link rel=icon href=../images/gmally-logo.jpeg type=image/x-icon>

                    <meta property="og:title" content="<?php echo $about;?>">
                    <meta property="og:description" content="<?php echo $about;?>">
                    <meta property="og:type" content="website">
                    <meta property="og:url" content="../index.php">
                </head>

                <body>
                    <div class=body-inner>


                        <header id=header class="fixed-top header" role=banner>

                            <a class="navbar-brand navbar-bg" href=index.php>
                                <img class="img-fluid float-right" src=../images/gmally-logo.jpeg
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
                                                <a class=nav-link href=../index.php>Home</a>
                                            </li>
                                            <li class=nav-item>
                                                <a class=nav-link href=../about/index.php>About</a></a>
                                            </li>


                                            <li class=nav-item>
                                                <a class=nav-link href=../index.php>Contact</a></a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href=# role=button
                                                    data-toggle=dropdown aria-haspopup=true aria-expanded=false>
                                                    Signup/Login
                                                </a>
                                                <div class=dropdown-menu>
                                                    <a class=dropdown-item href=../auth/signup.php>Sign Up</a>
                                                    <a class=dropdown-item href=../auth/signin.php>Login</a>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </nav>
                            </div>
                        </header>


                        <div id=banner-area>
                            <img src=../images/banner/contact.png onerror="this.src='../images/banner/contac.png'"
                                width="1680px" height="500px" alt="Contact-us Image">
                            <div class=parallax-overlay></div>
                            <div class=banner-title-content>
                                <div class=text-center>
                                    <h2> Let's Talk </h2>
                                    <nav aria-label=breadcrumb>
                                        <ol class=" breadcrumb justify-content-center">
                                            <li class=breadcrumb-item><a href=../index.php>Home</a></li>
                                            <li class="breadcrumb-item text-white" aria-current=page>Talk to us

                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>




                        <section id=main-container>
                            <div class=container>
                                <div class=row>
                                    <div class=col-md-7>


                                        <?php
                                        if(isset($_SESSION['message'])){
                                          echo $_SESSION['message'];
                                          unset($_SESSION['message']);
                                        }
                                    ?>
                                        <form id=contact-form action="contactprocess.php" method=POST role=form>
                                            <div class=row>
                                                <div class=col-md-4>
                                                    <div class=form-group>
                                                        <label>Name</label>
                                                        <input class=form-control name=name id=name placeholder
                                                            type=text>
                                                    </div>
                                                </div>
                                                <div class=col-md-4>
                                                    <div class=form-group>
                                                        <label>Phone</label>
                                                        <input class=form-control name=number id=number placeholder
                                                            type=number>
                                                    </div>
                                                </div>
                                                <div class=col-md-4>
                                                    <div class=form-group>
                                                        <label>Subject</label>
                                                        <input class=form-control name=subject id=subject placeholder>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=form-group>
                                                <label>Message</label>
                                                <textarea class=form-control name=message id=message placeholder
                                                    rows=10></textarea>
                                            </div>
                                            <div class=text-right><br>
                                                <button class="btn btn-primary solid blank" name="submit"
                                                    type="submit">Send
                                                    Message</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class=col-md-5>
                                        <div class=contact-info>
                                            <h3>Contact Details</h3>
                                            <p>
                                            <p>Talk to us, we are active</p>
                                            </p>
                                            <br>
                                            <p><i class="fa fa-home info"></i> <?php echo $address;?></p>
                                            <p><i class="fa fa-phone info"></i><?php echo $phone;?></p>

                                            <p><i class="fa fa-envelope-o info"></i> <span><?php echo $email;?></span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer id=footer class=footer>
                            <div class=container>
                                <div class=row>

                                    <div class="col-md-4 col-sm-12 footer-widget">
                                        <h3 class=widget-title>About Us</h3>
                                        <p><?php echo $about;?></p>
                                    </div>


                                    <div class="col-md-4 col-sm-12 footer-widget">
                                        <h3 class=widget-title>GALLERY</h3>
                                        <div class=img-gallery>
                                            <div class=img-container>
                                                <a class=thumb-holder data-rel=prettyPhoto href=../images/gallery/1.jpg>
                                                    <img src=../images/gallery/1.jpg alt>
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-3 col-sm-12 footer-widget footer-about-us">
                                        <h3 class=widget-title>About Us</h3>
                                        <p><?php echo $about;?></p>
                                        <h4>Address</h4>
                                        <p><?php echo $address;?></p>
                                        <div class=mb-4>
                                            <h4>Email:</h4>
                                            <p>
                                                <a<span <?php echo $email;?> </span></a>
                                            </p>
                                        </div>
                                        <div class=mb-4>
                                            <h4>Phone No.</h4>
                                            <p><?php echo $phone;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <section id=copyright class="copyright angle">
                            <div class=container>

                                <div class=row>
                                    <div class="col-md-12 text-center">
                                        <span
                                            class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                                            <? echo $client_name; ?>
                                            &copy;
                                            2023 - <?php echo date("Y"); ?>
                                        </span>
                                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                            Developed by
                                            <a href="https://wa.link/k5cji9" target="_blank">WEBON
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
                    <script src=../plugins/jQuery/jquery.min.js></script>
                    <script src=../plugins/bootstrap/bootstrap.min.js></script>
                    <script src=../plugins/style-switcher.js></script>
                    <script src=../plugins/owl/owl.carousel.js></script>
                    <script src=../plugins/jquery.prettyPhoto.js></script>
                    <script src=../plugins/flex-slider/jquery.flexslider.js></script>
                    <script src=../plugins/cd-hero/cd-hero.js></script>
                    <script src=../plugins/isotope.js></script>
                    <script src=../plugins/ini.isotope.js></script>
                    <script src=../plugins/wow.min.js></script>
                    <script src=../plugins/jquery.easing.1.3.js></script>
                    <script src=../plugins/jquery.counterup.min.js></script>
                    <script src=../plugins/waypoints.min.js></script>
                    <script src=../js/script.min.js></script>
                </body>

            </html>