<?php
    session_start();
    include "../includes/conn.php";
    include "../includes/contact-details.php";

  
?>


<!doctype html>
<html lang=en-us>

    <head>
        <meta charset=utf-8>
        <title>Sign up</title>
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
        <link rel="shortcut icon" href=.../images/gmally-logo.jpeg type=image/x-icon>
        <link rel=icon href=../images/gmally-logo.jpeg type=image/x-icon>
        <meta property="og:title" content="Sign in">
        <meta property="og:description" content="<?php echo $about;?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="../index.php">
    </head>

    <body>
        <div class=body-inner>

            <?php include "auth-header.php";?>


            <div id=banner-area>
                <img src=../images/banner/banner1.jpg onerror="this.src='../images/landing/main-bg.jpg'" width="1680px"
                    height="500px">
                <div class=parallax-overlay></div>
                <div class=banner-title-content>
                    <div class=text-center>
                        <h2>LOGIN </h2>
                        <nav aria-label=breadcrumb>
                            <ol class="breadcrumb justify-content-center">
                                <li class=breadcrumb-item><a href=../index.php>Home</a></li>
                                <li class="breadcrumb-item text-white" aria-current=page>Signup</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>



            <section id=main-container>
                <div class=container>

                    <div class="col-md-5">
                        <h3>Welcome Back!</h3>
                        <p class="btn btn-primary">Don't Joke with your life!</p>
                    </div>

                    <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                    <div class=row>
                        <div class=col-md-7>
                            <form id=contact-form action="process/signin.php" method=post role=form>
                                <div class=row>




                                    <div class=col-md-4>
                                        <div class=form-group>
                                            <label>Email</label>
                                            <input class=form-control name=Uemail id=email placeholder type=email
                                                required>
                                        </div>
                                    </div>

                                    <div class=col-md-4>
                                        <div class=form-group>
                                            <label>Password</label>
                                            <input class=form-control name=Upassword id=password placeholder
                                                type=password required>
                                        </div>
                                    </div>

                                    <div class=text-right><br>
                                        <button class="btn btn-primary solid blank" name="submit" type=submit>Sign In
                                        </button> <br><br>



                                    </div>

                                    <div class=col-md-4>
                                        <div class=form-group>
                                            <a style="font-size:13px; font-weight:bold; color:black; white-space: nowrap;"
                                                href="forgotpassword.php">Forgot
                                                Password? Reset Password Here</a>
                                            <br>
                                            <a style="font-size:13px; font-weight: bold; white-space: nowrap;"
                                                href="signup.php">Don't have
                                                an Account
                                                yet? Sign up Here</a>
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
                        Copyright
                        <? echo $client_name; ?>
                        &copy;
                        2023 - <?php echo date("Y"); ?></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Developed by
                            <a href="https://wa.link/k5cji9" target="_blank">WEBON
                            </a> </span>
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