<?php include("adminp/aconnection.php"); include("adminp/functions.php"); 

function embedYouTubeVideo($youtubeUrl) {
     // Extract the video ID from the YouTube URL
     $videoId = getYouTubeVideoId($youtubeUrl);
     
     // Check if a valid video ID is found
     if ($videoId) {
         // Construct the embedded link
         $embeddedLink = "https://www.youtube.com/embed/$videoId";
         
         // You can customize the embedded link by adding additional parameters, e.g., autoplay, controls, etc.
         // $embeddedLink .= "?autoplay=1&controls=1";
         
         return $embeddedLink;
     } else {
         return false; // Invalid YouTube URL
     }
 }
 
 function getYouTubeVideoId($youtubeUrl) {
     // Extract the video ID from various YouTube URL formats
     $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
     preg_match($pattern, $youtubeUrl, $matches);
     
     return isset($matches[1]) ? $matches[1] : false;
 }
 ?>
 
<?php

if(isset($_GET['e'])){

$e_id=$_GET['e'];



            $qo = "SELECT * FROM event_details as c
       INNER JOIN events_categories as b ON c.eca_id=b.eca_id WHERE e_id='$e_id'
      ORDER BY c.e_date DESC";
            
            
            $queryh = mysqli_query($conf, $qo);
            
           $res = mysqli_fetch_array($queryh);
                $e_mainimage=null;
                $e_id=$res['e_id'];
                $e_slug=$res['e_slug'];
                $e_date=$res['e_date'];
                $e_content=$res['e_content'];
                $qot = "SELECT * FROM event_images WHERE e_id='$e_id'";
                
                
                $queryht = mysqli_query($con, $qot);
                
                while ($rest = mysqli_fetch_array($queryht)) { 
                    
                    $e_mainimage=$rest['eimg_url'];
                    break;
                }
            
               
       ?>

<!DOCTYPE html>
<html lang="en">


<!-- Collin IT Solution -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $res['e_title']; ?></title>
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
    
    
    
    
    
    
    <style>
    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .gallery img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        cursor: pointer;
    }
 
</style>
    
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
                    <h2><?php echo $res['eca_title']; ?></h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>></span></li>
                        <li>Event</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        
        
      <?php   $videoId=null;
                          $qot = "SELECT * FROM event_videos WHERE e_id='$e_id'";
                                
                $queryht = mysqli_query($con, $qot);                
                while ($rest = mysqli_fetch_array($queryht)) { 
                  
                    $youtubeUrl = $rest['eimg_url'];
                    $videoId = getYouTubeVideoId($youtubeUrl);
                    
                    break; }
                    if ($videoId!=null) {
                        
                        
                        ?>
                        
    <div class="donate-img position-relative" onclick="playYouTubeVideo('<?php echo $videoId; ?>')">
    
    <div class="play-button"></div>
</div>

<!-- Your JavaScript code -->
<script>
    function playYouTubeVideo(videoId) {
        // Replace the content of donate-img with an iframe for the YouTube video
        var donateImg = document.querySelector('.donate-img');
         
        donateImg.innerHTML = '<iframe width="100%" height="450px" src="https://www.youtube.com/embed/'+videoId+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
    }
</script>            
                <?php }  else { ?>
                             <div class="donate-img position-relative">
   <!-- <img class="img-fluid w-100" src="<?php echo "event-documents/".$e_mainimage; ?>" alt="img"> -->
  
   
</div>
                    
                    <?php
                        }  ?>

        <!--Blog Details Start-->
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img">
                                <img src="<?php echo "event-documents/".$e_mainimage; ?>" alt="">
                                <div class="blog-details__date">
                                    <p><?php convertdate($e_date) ?></p>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                
                                <h3 class="blog-details__title-1"><?php echo $res['e_title']; ?></h3>
                                <p class="blog-details__text-1" style="text-align: justify"> 
                                <?php echo $res['e_content']; ?>
                                </p>
                               
                               
                                 <h3 class="rotary-event" style="padding:50px 0px 20px ">Some of our Contributions</h3>
                               



<div class="gallery">
 <?php   $k=1;
               $qot = "SELECT * FROM event_images WHERE e_id='$e_id'";
                                
                $queryht = mysqli_query($con, $qot);                
                while ($rest = mysqli_fetch_array($queryht)) { 
                    if($k==1){ }
                    else{
                    $e_mainimage=$rest['eimg_url'];
                
                 ?>  
   <a href="<?php echo "event-documents/".$e_mainimage; ?>" target="_blank"> <img src="<?php echo "event-documents/".$e_mainimage; ?>" alt="Image 1" ></a>
      <?php }  $k+=1; } ?>

    <!-- Add more images as needed -->
</div>



                             
<!--                                <div class="contact-one__form btn-box" > -->
             
<!--                                             </div> -->


                               

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            
                         
                            
                            
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">Categories</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                 <?php $qc="SELECT * FROM events_categories ORDER BY eca_id";
                                $queryc=mysqli_query($connn,$qc);
                               while ($resc=mysqli_fetch_array($queryc)) {  ?>
                                    <li><a href="events.php?c=<?php echo $resc['eca_id']; ?>"><?php echo $resc['eca_title']; ?></a></li>
                                     <?php } ?>
                                </ul>
                            </div>
                            
                               <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Latest Posts</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                    <li>
                                        
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <span class="sidebar__post-content-meta"></span>
                                                <a href="blog-details.html">Bakori Grampanchyat</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li>
                                        
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <span class="sidebar__post-content-meta"></span>
                                                <a href="blog-details.html">School Events</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li>
                                        
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <span class="sidebar__post-content-meta"></span>
                                                <a href="blog-details.html">Wagholi tree plantation
                                                </a>
                                            </h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Details End-->
        
             <section>
             <div class="container">
  <div class="row">
  
             <?php   $kk=1;
                          $qot = "SELECT * FROM event_videos WHERE e_id='$e_id'";
                                
                $queryht = mysqli_query($con, $qot);                
                while ($rest = mysqli_fetch_array($queryht)) { 
                  
                    $youtubeUrl = $rest['eimg_url'];
                    $embeddedLink = embedYouTubeVideo($youtubeUrl);
                    
                    if ($embeddedLink) {
                        ?>
                          <div class="col-lg-6 col-sm-12">
                        <?php 
                        echo '<iframe width="100%" height="400" src="' . $embeddedLink . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                       
                 ?>
               
              
                    </div>
                <?php }  $kk+=1; } ?>

 
    </div>
    
    
<!--     <div class="col-lg-4"> -->
<!--       <video width="100%" height="auto" controls> -->
<!--   <source src="movie.mp4" type="video/mp4"> -->
<!--   <source src="movie.ogg" type="video/ogg"> -->
<!--  </video> -->
<!--     </div> -->
<!--     <div class="col-lg-4"> -->
<!--      <video width="100%" height="auto" controls> -->
<!--   <source src="movie.mp4" type="video/mp4"> -->
<!--   <source src="movie.ogg" type="video/ogg"> -->
<!--  </video> -->
<!--     </div> -->
  </div>
</div>
</section>

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
<?php } else {
    header("Location:events.php");    
} ?>