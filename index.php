            <?php 
                session_start();
                include "includes/contact-details.php"
            ?>


            <!doctype html>
            <html lang=en-us>

                <head>
                    <meta charset=utf-8>
                    <title>
                        <?php echo $header ?>
                    </title>
                    <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
                    <meta name=description content="This is meta description">
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

                    <meta property="og:title" content="BizCraft - Responsive Html5 Template">
                    <meta property="og:description" content="This is meta description">
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


                                    <!--Links Starts-->
                                    <?php 
                                        include "includes/links.php" ; 
                                    ?>

                                    <!--Links Ends-->



                                    <!--Banner Starts-->
                                    <?php
                            include "includes/banner.php";
                        ?>

                                    <!--Banner Ends-->


                                    <!--Services Starts-->
                                    <?php
                                include "includes/services.php";
                            ?>

                                    <!--Services Ends-->


                                    <!--About Starts-->
                                    <?php
                            include "includes/about.php";
                        ?>
                                    <!--About Ends-->



                                    <!--Team Starts-->
                                    <?php
                            include "includes/team.php";
                        ?>
                                    <!--Team Starts-->



                                    <!--Action Starts-->
                                    <?php
                            include "includes/action.php";
                        ?>
                                    <!--Action Ends-->



                                    <!--Clients Starts-->
                                    <?php
                            include "includes/clients.php";
                        ?>
                                    <!--Clients End-->



                                    <!--Footer Starts-->
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


                                                <!--gallery Starts-->

                                                <?php
                                                    include "includes/gallery.php";
                                                ?>
                                                <!--gallery Ends-->


                                                <!--Details Starts-->

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
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class=row>
                                                <div class="col-md-12 text-center">
                                                    <span
                                                        class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                                                        <? echo $client_name; ?>
                                                        &copy;
                                                        2020 - <?php echo date("Y"); ?></span>
                                                    <span
                                                        class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
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
                            <script src="
                            https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js
                            "></script>
                            <link href="
                            https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css
                            " rel="stylesheet">
                            <?php if(isset($_SESSION['msg'])){ ?>
                            <script>
                            Swal.fire({
                                // title: "Good job!",
                                text: "<?= $_SESSION['msg'] ?>",
                                icon: "success"
                            });
                            </script>
                            <?php unset($_SESSION['msg']); } ?>
                </body>

            </html>