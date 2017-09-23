<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GoIndo.me - The Official Website</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.2/css/bulma.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </head>
    <body>
        <section class="section" id="navigation">
            <div class="topbar level">
                <div class="level-left">
                    <h3 class="level-item">Explore Indonesia...</h3>
                </div>
                <div class="level-right">
                    <ul class="level-item social-top">
                        <li class=" wow bounceInUp"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class=" wow bounceInUp" data-wow-delay=".2s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class=" wow bounceInUp" data-wow-delay=".4s"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class=" wow bounceInUp" data-wow-delay=".6s"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="hero-section level">
                    <div class="level-left">
                        <div class="level-item">
                            <img src="<?php echo base_url();?>assets/img/logo-flag.png" alt="Main logo" width="180">
                        </div>
                    </div>
                    <div class="level-right control">
                        <input type="search" value="" placeholder="Search everything..." class="level-item input">
                    </div>
                </div>
            </div>
            <div class="container">
                <nav class="navbar is-light">

                    <div class="navbar-menu" id="navMenuTransparentExample">
                        <div class="navbar-start">
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link is-active" href="#">
                                    Home
                                </a>
                                <div class="navbar-dropdown is-boxed">
                                    <a class="navbar-item " href="#">
                                        About Us
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Contact Us
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Site Content Attributions
                                    </a>
                                    <hr class="navbar-divider">
                                    <div class="navbar-item">
                                        <div>
                                            <a class="bd-view-all-versions" href="#">Say Hi!</a>
                                        </div>
                                    </div>
                                </div> <!-- navbar-dropdown is boxed kelar -->
                            </div> <!-- kelar Navbar-Item -->
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link " href="#">
                                    Editor's Pick
                                </a>
                                <div id="blogDropdown" class="navbar-dropdown is-boxed" data-style="width: 18rem;">
                                    <a class="navbar-item" href="">
                                        First loves
                                    </a>
                                    <a class="navbar-item" href="">
                                        Current favorites
                                    </a>
                                    <a class="navbar-item" href="">
                                        Places to see
                                    </a>
                                    <a class="navbar-item" href="">
                                        Things to do
                                    </a>
                                    <a class="navbar-item" href="">
                                        Where to eat
                                    </a>
                                </div>
                            </div> <!-- kelar Navbar-Item -->
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="#">
                                    Top 10
                                </a>
                                <div class="navbar-dropdown is-boxed">
                                    <a class="navbar-item " href="#">
                                        Destinations
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Accomodations
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Dining, Drinking, Nightlife
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Activities
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Adventures
                                    </a>

                                    <a class="navbar-item is-active" href="#">
                                        Cultures
                                    </a>
                                </div> <!-- navbar-dropdown is boxed kelar -->
                            </div>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="#">
                                    Provinces
                                </a>
                                <div class="navbar-dropdown is-boxed">
                                <?php foreach ($listprovince as $key => $value) { ?>
                                    <a class="navbar-item " href="<?php echo base_url();?>go_island/d/<?php echo $value->idPROVINCE;?>/<?php echo replacesymbolforslug(strtolower($value->namePROVINCE));?>">
                                        <?php echo $value->namePROVINCE;?>
                                    </a>
                                <?php } ?>
                                </div> <!-- navbar-dropdown is boxed kelar -->
                            </div>
                            <!-- <a class="navbar-item " href="#">Provinces</a> -->
                            <a class="navbar-item " href="#">Book Now</a>
                            <a class="navbar-item " href="#">Partners</a>
                        </div> <!-- Navbar-Start -->
                    </div>

                </nav>
            </div> <!-- kelar Container Nav -->
        </section>

        <section class="section" id="main-content">
            <div class="container">
                <div class="columns">

                    <div class="column" id="main">

                        <div class="ad-banner">
                            <p>Banner Halaman Utama</p>
                            <h4>Place your ads here.</h4>
                        </div>

                        <div class="media head">
                            <figure class="media-left">
                                <img src="<?php echo $getprovince->imagePROVINCE;?>" alt="<?php echo $getprovince->namePROVINCE;?>">
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <h4><strong><?php echo $getprovince->namePROVINCE;?></strong></h4>
                                    <div class="level stats">
                                        <div class="level-item wow fadeInUp">
                                            <div>
                                                <p>Population</p>
                                                <h5><?php echo $getprovince->populationPROVINCE;?></h5>
                                            </div>
                                        </div>
                                        <div class="level-item wow fadeInUp" data-wow-delay=".2s">
                                            <div>
                                                <p>Density</p>
                                                <h5><?php echo $getprovince->densityPROVINCE;?></h5>
                                            </div>
                                        </div>
                                        <div class="level-item wow fadeInUp" data-wow-delay=".4s">
                                            <div>
                                                <p>Area</p>
                                                <h5><?php echo $getprovince->areaPROVINCE;?></h5>
                                            </div>
                                        </div>
                                        <div class="level-item wow fadeInUp" data-wow-delay=".6s">
                                            <div>
                                                <p>Capital City</p>
                                                <h5><?php echo $getprovince->capitalPROVINCE;?></h5>
                                            </div>
                                        </div>
                                        <div class="level-item wow fadeInUp" data-wow-delay=".8s">
                                            <div>
                                                <p>Largest City</p>
                                                <h5><?php echo $getprovince->largestcityPROVINCE;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $getprovince->descPROVINCE;?>
                                </div> <!-- kelar Content -->
                            </div> <!-- kelar Media-Content -->
                        </div>

                        <div class="tile is-ancestor">
                        <?php
                            if(!empty($moreprovince)){
                                foreach ($moreprovince as $key => $more) {
                        ?>
                            <div class="tile is-parent">
                                <article class="tile is-child features">
                                    <h3><?php echo $more->titleDESC;?></h3>
                                    <p><?php echo $more->moreDESC;?></p>
                                    <a href="#" class="button is-primary">Read more</a>
                                </article>
                            </div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="column is-one-quarter" id="sidebar">

                        <div class="menu side-menu">
                            <h3 class="menu-label">Menu</h3>
                            <ul class="menu-list">
                                <li><a href="#">Accomodation</a></li>
                                <li><a href="#">Places to Visit</a></li>
                                <li><a href="#">Things to Do</a></li>
                                <li><a href="#">Eating, Drinking, &amp; Nightlife</a></li>
                            </ul>
                            <hr class="dark">
                            <a href="#">Service Directory <span><i class="fa fa-angle-right"></i></span></a>
                        </div>

                        <div class="ad-banner mb2em  wow bounceInUp">
                            <p>Banner Halaman Utama</p>
                            <h4>Place your ads here.</h4>
                        </div>

                        <div class="maps" id="maps"></div>

                        <div class="ad-banner mb2em purple wow bounceInUp">
                            <p>Banner Halaman Utama</p>
                            <h4>Place your ads here.</h4>
                        </div>
                        <div class="ad-banner mb2em tosca  wow bounceInUp" data-wow-delay=".2s">
                            <p>Banner Halaman Utama</p>
                            <h4>Place your ads here.</h4>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="level site-links">
                    <div class="level-item">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About PT Little Blue Planet Indonesia</a></li>
                            <li><a href="#">User Login</a></li>
                        </ul>
                    </div>
                    <div class="level-item">
                        <ul>
                            <li><a href="#">Advertise with Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Visit Our Blog</a></li>
                        </ul>
                    </div>
                    <div class="level-item">
                        <ul>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Disclaimer</a></li>
                            <li><a href="#">Site Content Attributions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="content has-text-centered">
                    <p>This website is owned and operated by</p>
                    <h2 class="lbp wow fadeInUp">Little Blue Planet Indonesia</h2>
                </div>
            </div>
            <div class="bottom-bar level">
                <p class="level-left">&copy; 2017 PT Little Blue Planet Indonesia - All rights reserved.</p>
                <p class="level-right">Last updated: 20:05 WIB 09/09/2017</p>
            </div>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        <script>new WOW().init();</script>

        <script>
            function initMap() {
                var uluru = {lat: 1.69991, lng: 103.9760852};
                var map = new google.maps.Map(document.getElementById('maps'), {
                  zoom: 8,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
            }
        </script>

        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlV-4G4LxeiYHwPF9HVob_x663ySBJprU&callback=initMap">
        </script>

    </body>
</html>

