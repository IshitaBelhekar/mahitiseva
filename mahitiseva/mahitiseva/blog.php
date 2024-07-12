<?php include("adminp/aconnection.php"); include("adminp/functions.php"); ?>


<!DOCTYPE html>
<html lang="en">


<!-- Collin IT Solution -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Blogs </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/fav.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/fav.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/fav.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="gardon HTML 5 Template " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/gardon-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/alagambe-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />
    <link rel="stylesheet" href="assets/vendors/twenty-twenty/twentytwenty.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/gardon.css" />
    <link rel="stylesheet" href="assets/css/gardon-responsive.css" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
<?php include 'header.php'; ?>
        
        
        
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->


        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Blog</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>></span></li>
                        <li>Our Blogs</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Page Start-->
        <section class="blog-page">
            <div class="container">
                <div class="row">
                
                      <?php  $wo=0;
          
            
            $qo = "SELECT * FROM blog_details as c
       INNER JOIN blog_categories as b ON c.bca_id=b.bca_id ";
            
            if(isset($_GET['c'])){
                $qo = "SELECT * FROM blog_details as c
       INNER JOIN blog_categories as b ON c.bca_id=b.bca_id
     WHERE c.bca_id=".$_GET['c']."";
           }
            
            $queryh = mysqli_query($conf, $qo);
            $delay=0.3;
            while ($res = mysqli_fetch_array($queryh)) {
                $e_mainimage=null;
                $blog_id=$res['blog_id'];
                $blog_slug=$res['blog_slug'];
                $blog_date=$res['blog_date'];
                $qot = "SELECT * FROM blog_images WHERE blog_id='$blog_id'";
                
                
                $queryht = mysqli_query($con, $qot);
                
                while ($rest = mysqli_fetch_array($queryht)) { 
                    
                    $e_mainimage=$rest['bimg_url'];
                    break;
                }
                $delay=$delay+0.4;
               
       ?>
       
                    <!--Blog One single Start-->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="assets/images/rotatri-img-1.jpg" alt="" style="width:370px", height="239px">
                                    <a href="tree-blog.php">
                                        <span class="blog-one__plus"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <div class="blog-one__date">
                                    <p><?php convertdate($blog_date) ?></p>
                                </div>
                                                     
                                <h3 class="blog-one__title"><a href="blog-details.php?e=<?php echo $blog_id; ?>&s=<?php echo $blog_slug; ?>"><?php echo substr($res['blog_title'], 0,30) ;?></a></h3>
                                <p class="blog-one__text"><?php echo $res['bca_title']; ?>
                                </p>
                            </div>
                            <div class="blog-one__hover-content">
                                <div class="blog-one__hover-date">
                                    <p><?php convertdate($blog_date) ?></p>
                                </div>
                                <h3 class="blog-one__hover-title"><a href="blog-details.php?e=<?php echo $blog_id; ?>&s=<?php echo $blog_slug; ?>"><?php echo substr($res['blog_title'], 0,30) ;?></a></h3>
                                <p class="blog-one__hover-text"><?php echo $res['bca_title']; ?>
                                </p>
                                <div class="blog-one__hover-btn-box">
                                    <a href="blog-details.php?b=<?php echo $blog_id; ?>&s=<?php echo $blog_slug; ?>">Read More<span class="icon-right-arrow-1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Blog One single End-->
                   <?php } ?>
                </div>
            </div>
        </section>
        <!--Blog Page End-->

<?php include 'footer.php'; ?>


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/mseva-logo-1-95x95.png" width="100"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">info@mahitiseva.in</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:9960925252">9960925252</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>


    <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="assets/vendors/vegas/vegas.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/timepicker/timePicker.js"></script>
    <script src="assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/circleType/jquery.lettering.min.js"></script>
    <script src="assets/vendors/twenty-twenty/twentytwenty.js"></script>
    <script src="assets/vendors/twenty-twenty/jquery.event.move.js"></script>




    <!-- template js -->
    <script src="assets/js/gardon.js"></script>
</body>


<!-- Collin IT Solution -->
</html>