            <?php 
                session_start();
                include "../includes/contact-details.php";
                include "../includes/conn.php";
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

                    <meta property="og:title" content="BizCraft - Responsive Html5 Template">
                    <meta property="og:description" content="This is meta description">
                    <meta property="og:type" content="website">
                    <meta property="og:url" content="index.html">
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
                                                    <a class=dropdown-item href=../auth/signup.php>Sign Up</a>
                                                    <a class=dropdown-item href=..//auth/signin.php>Login</a>
                                                </div>
                                            </li>
                                            <li class=nav-item>
                                                <a class=nav-link href=../index.php>Contact</a></a>
                                            </li>
                                        </ul>

                                    </div>
                                </nav>
                            </div>
                        </header>


                        <div id=banner-area>
                            <img src=../images/banner/about.jpeg onerror="this.src='../images/banner/about.jpeg'" alt>
                            <div class=parallax-overlay></div>
                            <div class=banner-title-content>
                                <div class=text-center>
                                    <h2> WE ARE GMALLY </h2>
                                    <nav aria-label=breadcrumb>
                                        <ol class="breadcrumb justify-content-center">
                                            <li class=breadcrumb-item><a href=../index.php>Home</a></li>
                                            <li class="breadcrumb-item text-white" aria-current=page>ABOUT GOSPEL MUSIC
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
                                        <h2 class="title classic">GOSPEL MUSIC ALLY Profile</h2>
                                    </div>
                                </div>
                                <div class="row landing-tab">
                                    <div class="col-md-3 col-sm-5">
                                        <div class="nav flex-column nav-pills border-right" id=v-pills-tab role=tablist
                                            aria-orientation=vertical>
                                            <a class="animated fadeIn nav-link py-4 active d-flex align-items-center"
                                                data-toggle=pill href=#who-are-we role=tab aria-selected=true>
                                                <i class="fa fa-info-circle mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Who Are We</span>
                                            </a>
                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#our-company role=tab aria-selected=true>
                                                <i class="fa fa-briefcase mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Our Vision</span>
                                            </a>
                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#what-we-do role=tab aria-selected=true>
                                                <i class="fa fa-book mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Our Mission</span>
                                            </a>
                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#modern-design role=tab aria-selected=true>
                                                <i class="fa fa-pagelines mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Our Slogan</span>
                                            </a>
                                            <a class="animated fadeIn nav-link py-4 d-flex align-items-center"
                                                data-toggle=pill href=#dedicated-support role=tab aria-selected=true>
                                                <i class="fa fa-support mr-4"></i>
                                                <span class="h4 mb-0 font-weight-bold">Membership and
                                                    Responsibility</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-7">
                                        <div class=tab-content id=v-pills-tabContent>
                                            <div class="tab-pane pl-sm-5 fade show active animated fadeInLeft"
                                                id=who-are-we role=tabpanel>
                                                <i class="fa fa-info- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">We are an
                                                    all believers in Christ Organization
                                                </h3>
                                                <p>Since the year 2020, we have been using diffrent avenues to promote
                                                    Jesus to the ends of the earth through spreading gospel
                                                    contents by capturing the media for Christ.
                                                    We have a mandate to hold all believers' meetings and
                                                    conferences that both train and equip the believer for the great
                                                    work of spreading the
                                                    gospel.</p>
                                            </div>
                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=our-company
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">We have Vision to promote Jesus</h3>
                                                <p>To promote Jesus to the ends of the earth through spreading gospel
                                                    contents and capturing the social media for Christ</p>
                                            </div>
                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=what-we-do
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#f58634">We have the Mission of uniting believers</h3>

                                                <p>1. To hold all believers meetings and conferences that both train and
                                                    equip the believer for the great work of spreading the gospel
                                                    2. ⁠To discover talents and gifts of believers in order to
                                                    encourage, support and team up to achieve greater heights that
                                                    builds and expands God’s kingdom on earth
                                                    3. ⁠To create a support system that discourage believers in
                                                    compromising God’s standards in life, business, career and ministry
                                                    4. ⁠To own up to fellow members in helping to encourage, strengthen,
                                                    partner and stand by in times of need both spiritual and physical
                                                </p>
                                            </div>

                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=modern-design
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#79b908">GMALLY is bonded by a slogan</h3>
                                                <p>Our slogan Call: GM Ally
                                                <h6> Response: Promoting Jesus </h6>
                                                Call: GM ALLY
                                                <h6>Response: I am Righteous and Rich</p>
                                                </h6>
                                            </div>

                                            <div class="tab-pane pl-sm-5 fade animated fadeInLeft" id=dedicated-support
                                                role=tabpanel>
                                                <i class="fa fa- icon text-warning mb-4"></i>
                                                <h3 style="color:#79b908">Membership and Responsibility</h3>
                                                <p>
                                                    Membership
                                                    Young Allies 1 Children and teenagers, who’s parents are members
                                                    Young Allies 2 (Students of all ages and grades)
                                                    Allies (Adults between 30-50)
                                                    Elders forum (Adults between 50-70)
                                                    Glory Allies ( Fathers and Mothers between 70-250) <br><br>

                                                <h6 style="color: #79b908;"> Platform rules </h6> <br>
                                                1. No forwarded posts or shares of any kind allowed except in
                                                response to admins post. <br>
                                                2. ⁠All posts are to be sent to the News Room for examination and
                                                approval <br>
                                                3. ⁠No sharing of music and entertainment or devotionals or messages
                                                on the platform, all are to be sent to the content approving board <br>
                                                4. ⁠All members are to respect and honor their elders and seniors on
                                                all professional forums and squad, state or country platforms
                                                <br><br>

                                                <h6 style="color: #79b908;">Responsibility of members </h6>
                                                1. Attend all meetings both online and offline <br>
                                                2. ⁠Pay your monthly dues in the following 6 categories <br>
                                                a. Young allies N500 or it’s equivalent in your currency (Students
                                                only)
                                                b. Progressive allies N1,000 or $1.5 <br>
                                                c. Silver allies N2,000 or $2.5<br>
                                                d. Gold allies N5,000 or $6<br>
                                                e. Diamond allies N10,000 or $13<br>
                                                f. Emerald allies N20,000 or $25 <br>

                                                3. Pay all levies as instructed <br>
                                                4. ⁠Give free will donations
                                                5. ⁠Invite members to celebrations and ceremonies after doing the
                                                following <br>
                                                1. Inform the house a month before
                                                2. ⁠Prepare refreshments for members and seclude it
                                                3. ⁠Officially welcome the allies to your occasion, introduce the
                                                leaders among them and take official pictures <br><br>


                                                <h6 style="color: #79b908;">Membership is Free </h6>
                                                Member must be on WhatsApp and YouTube user and must share a
                                                screenshot of subscription to our YouTube channel

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class=gap-60></div>

                            <!-- <section id=team class=team>
                                <div class=container>
                                    <div class=row>
                                        <div class="col-md-12 heading">
                                            <span class="title-icon float-left"><i class="fa fa-weixin"></i></span>
                                            <h2 class=title>Meet with our Team <span class=title-desc>A Quality
                                                    Experience Team with 4 years experience</span></h2>
                                        </div>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="team wow fadeInUp" data-wow-delay=.0s>
                                                <div class=img-hexagon>
                                                    <img src=../images/team/team1.jpg alt="Vosgi Varduhi">
                                                    <span class=img-top></span>
                                                    <span class=img-bottom></span>
                                                </div>
                                                <div class=team-content>
                                                    <h3>Vosgi Varduhi</h3>
                                                    <p>Web Designer</p>
                                                    <div class=team-social>
                                                        <a class=fb href=#><i class="fa fa-facebook"></i></a>
                                                        <a class=twt href=#><i class="fa fa-twitter"></i></a>
                                                        <a class=gplus href=#><i class="fa fa-google-plus"></i></a>
                                                        <a class=linkdin href=#><i class="fa fa-linkedin"></i></a>
                                                        <a class=dribble href=#><i class="fa fa-dribbble"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    </div>
                    </section>
                    </section> -->

                            <section id="team" class="team">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 heading">
                                            <span class="title-icon float-left"><i class="fa fa-weixin"></i></span>
                                            <h2 style="color:#F58634;" class="title">TEAM MEMBERS<span
                                                    class="title-desc">
                                                    A dedicated team running the GM ALLY Vision
                                                </span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
            $queryTeam = mysqli_query($conn, "SELECT * FROM team_members");

            while ($rowResult = mysqli_fetch_assoc($queryTeam)) {
                ?>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="team wow fadeInUp" data-wow-delay=".6s">
                                                <div class="img-hexagon">
                                                    <!-- Convert binary image data to base64 and embed it -->
                                                    <?php
                        // Check if image content exists and is not empty
                        if (!empty($rowResult['image_content'])) {
                            // Convert binary data to base64 encoded string
                            $imageData = base64_encode($rowResult['image_content']);
                            // Output HTML with embedded image
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="' . $rowResult['team_name'] . '">';
                        } else {
                            // Output placeholder image if no image content exists
                            echo '<img src="images/team/team1.jpg" alt="' . $rowResult['team_name'] . '">';
                        }
                        ?>
                                                    <span class="img-top"></span>
                                                    <span class="img-bottom"></span>
                                                </div>

                                                <div class="team-content">
                                                    <h3><?php echo $rowResult['team_name']; ?></h3>
                                                    <p style="color: #F58634;">
                                                        <?php echo $rowResult['team_position']; ?></p>
                                                    <p><?php echo $rowResult['team_number']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </section>




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