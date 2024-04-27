<?php
  include "../includes/conn.php";
  session_start();
?>


<!doctype html>
<html lang=en-us>

    <head>
        <meta charset=utf-8>
        <title>Sign up</title>
        <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
        <meta name=description content="This is meta description.">
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
        <link rel="shortcut icon" href=../images/favicon.png type=image/x-icon>
        <link rel=icon href=../images/favicon.png type=image/x-icon>
        <meta property="og:title" content="Contact Us">
        <meta property="og:description" content="This is meta description.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="index.html">
    </head>

    <body>
        <div class=body-inner>

            <?php include "auth-header.php";?>


            <div id=banner-area>
                <img src=../images/banner/banner1.jpg onerror="this.src='../images/banner/banner1.jpg'" alt>
                <div class=parallax-overlay></div>
                <div class=banner-title-content>
                    <div class=text-center>
                        <h2>Register </h2>
                        <nav aria-label=breadcrumb>
                            <ol class="breadcrumb justify-content-center">
                                <li class=breadcrumb-item><a href=../index.html>Home</a></li>
                                <li class="breadcrumb-item text-white" aria-current=page>Signup</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>



            <section id=main-container>
                <div class=container>

                    <?php
                                if(isset($_SESSION['message'])){
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>


                    <div class=col-md-5>
                        <div class=contact-info>
                            <h3>Forgot Your Password?</h3>
                            <p>
                            <p>Don't worry, we'll mail you a new Passwrod.</p>
                        </div>
                    </div>
                    <div class=row>
                        <div class=col-md-7>
                            <form id=contact-form action="process/forgotprocess.php" method=post role=form>
                                <div class=row>


                                    <div class=col-md-4>
                                        <div class=form-group>

                                            <label>Enter your Email</label>
                                            <input class=form-control name=email id=email placeholder type=email>
                                        </div>
                                    </div>

                                    <div class=text-right><br>
                                        <button class="btn btn-primary solid blank" name="submit" type=submit>Submit
                                        </button> <br><br>



                                    </div>

                                    <div class=col-md-4>
                                        <div class=form-group>
                                        </div>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>





            <section id=copyright class="copyright angle">
                <div class=container>
                    <div class=row>
                        <div class="col-md-12 text-center">

                        </div>
                    </div>
                    <div class=row>
                        <div class="col-md-12 text-center">
                            <div class=copyright-info>Designed By <a href=https://themefisher.com />Themefisher</a> &
                                Developed By <a href=https://gethugothemes.com />Gethugothemes</a></div>
                        </div>
                    </div>
                    <div id=back-to-top data-spy=affix data-offset-top=10 class="back-to-top affix position-fixed">
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