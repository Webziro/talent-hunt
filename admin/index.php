<?php
    session_start();
    include "../includes/conn.php";
    include "includes/properties.php";
  //echo password_hash("Admin@2424", PASSWORD_DEFAULT);
?>

<!doctype html>
<html lang=en-us>

    <head>
        <meta charset=utf-8>
        <title>
            <? echo $title;?>
        </title>
        <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
        <meta name=description content="<? echo $content;?>">
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
        <link rel=icon href=../images/gmally-logo.jpeg type=image/x-icon>
        <meta property="og:title" content="Contact Us">
        <meta property="og:description" content="<? echo $content;?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="index.html">
    </head>

    <body>
        <div class=body-inner>

            <?php //include "auth-header.php";?>


            <div id=banner-area>
                <img src=../images/banner/banner1.jpg onerror="this.src='../images/landing/main-bg.jpg'" height="300px "
                    width="1680px" alt>
                <div class=parallax-overlay></div>
                <div class=banner-title-content>
                    <div class=text-center>
                        <h2>Admin Login </h2>

                    </div>
                </div>
            </div>

            <section id=main-container>
                <div class=container>

                    <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                    <div class=col-md-8>
                        <div class=contact-info>
                            <h3>Welcome Back Admin!</h3>
                        </div>
                        <div class=row>
                            <div class=col-md-7>
                                <form id=contact-form action="process/admin_signin.php" method=POST role=form>
                                    <div class=row>
                                        <div class=col-md-8>
                                            <div class=form-group>
                                                <label>Email</label>
                                                <input class=form-control name=email id=email placeholder="Email"
                                                    type=email required>
                                            </div>
                                        </div>

                                        <div class=col-md-8>
                                            <div class=form-group>
                                                <label>Password</label>
                                                <input class=form-control name=password id=password
                                                    placeholder="Password" type=password required>
                                            </div>
                                        </div>

                                        <div class=text-right><br>
                                            <button class="btn btn-primary solid blank" name="submit" type="submit">
                                                Sign In
                                            </button>
                                        </div>



                                </form>

                            </div>

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

                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                        Copyright BWEC &copy; 2023 - <?php echo date("Y"); ?>
                    </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        Developed by <a href="https://wa.link/k5cji9" target="_blank">WEBON </a>
                    </span>
                </div>

                <div id=back-to-top data-spy=affix data-offset-top=10 class="back-to-top affix position-fixed">
                    <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button>
                </div>

        </div>
        </section>
        </div>


        <!--Hide and show password field script -->

        <script>
        const passwordInput = document.getElementById('password');

        // Function to temporarily show the password
        function showPasswordTemporarily(event) {
            // Change the input type to text to show the password
            passwordInput.type = 'text';

            // Use a setTimeout to change the input type back to password after a short delay
            setTimeout(() => {
                passwordInput.type = 'password';
            }, 500);
        }

        // Attach the event listener to the password input field
        passwordInput.addEventListener('input', showPasswordTemporarily);
        </script>

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