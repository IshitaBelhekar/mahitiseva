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

if(isset($_GET['c'])){

$comp_id=$_GET['c'];


$qo = "SELECT * FROM campaign_details as c INNER JOIN organizers as b ON 
c.org_id=b.org_id WHERE c.camp_status=1 AND c.camp_id='$comp_id'";

$co=0;
$queryh = mysqli_query($conf, $qo);

$res = mysqli_fetch_array($queryh);
    $tdoners=0;
    $camp_id=$res['camp_id'];
    $camp_slug=$res['comp_slug'];
    $camp_mainimage=$res['camp_img'];
    $co+=1;
    $qot = "SELECT * FROM donars_list WHERE camp_id='$camp_id' AND do_status=2";
    $queryht = mysqli_query($con, $qot);
    while ($rest = mysqli_fetch_array($queryht)) {
        $tdoners=1+$tdoners;
    }
    
    $c_mainimage=null;
    $qot = "SELECT * FROM campaign_images WHERE camp_id='$camp_id'";
    $queryht = mysqli_query($con, $qot);
    while ($rest = mysqli_fetch_array($queryht)) {
        $c_mainimage=$rest['cimg_url'];
        break;
    }
            
    $shortenedString = substr($res['camp_title'], 0, 70);
    if (strlen($res['camp_title']) > 70) {
        $shortenedString .= "...";
    } 
       ?>

<!DOCTYPE html>
<html lang="en">


<!-- Collin IT Solution -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Campaign - Tree Plantation </title>
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
                    <h2>Tree Plantation</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>></span></li>
                        <li><a href="services.html">Campaign</a></li>
                        <li><span>></span></li>
                        <li>Tree Plantation</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        
            <?php   $videoId=null;
                          $qot = "SELECT * FROM campaign_videos WHERE camp_id='$camp_id'";
                                
                $queryht = mysqli_query($con, $qot);                
                while ($rest = mysqli_fetch_array($queryht)) { 
                  
                    $youtubeUrl = $rest['wimg_url'];
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
  
   
</div>
                    
                    <?php
                        }  ?>

        <!--Service Details Start-->
        <section class="service-details" style="padding: 80px 0 10px;">
            <div class="container">
                <div class="row">
                     <?php   $k=1;
                          $qot = "SELECT * FROM campaign_images WHERE camp_id='$camp_id'";
                                
                $queryht = mysqli_query($con, $qot);                
                while ($rest = mysqli_fetch_array($queryht)) { 
                    if($k==1){ }
                    else{
                    $c_mainimage=$rest['cimg_url'];
                
                 ?>
                 
                  <?php }  $k+=1; } ?>
        
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__right">
                            <div class="services-details__img-1">
                                <img src="<?php echo "camp-documents/".$c_mainimage; ?>" alt="">
                            </div>
                            
                            <h3 class="services-details__title-1">Tree Plantation</h3>
                            <p class="services-details__text-1" style="text-align: justify">
                            <?php echo $res['camp_content']; ?>
                            </p>        
                       </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-5">
                        <div class="services-details__sidebar">
                            <div class="services-details__services-list">
                                <ul class="services-details__services list-unstyled">
                                    <li class="active">
                                        <a href="treeplantation.php"><span class="fas fa-leaf"></span>Tree Plantation</a>
                                    </li>
                                    <li>
                                        <a href="rainwaterharvesting.php"><span class="fas fa-leaf"></span>Rain Water Harvesting</a>
                                    </li>
                                    <li>
                                        <a href="social.php"><span class="fas fa-leaf"></span>Social Services for School</a>
                                    </li>
                                    <li>
                                        <a href="chara.php"><span class="fas fa-leaf"></span>Chara Vatap</a>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                            <div class="banner-one">
                                <div class="banner-one__bg"
                                    style="background-image: url(assets/images/backgrounds/banner-one-bg.jpg);"></div>
                                <div class="banner-one__img"
                                    style="background-image: url(assets/images/treeplant1.webp);"></div>
                                <h3 class="banner-one__title">Looking for a
                                    <br> Campaign</h3>
                                <p class="banner-one__sub-title">Call Anytime</p>
                                <p class="banner-one__contact"><a href="tel:+91 9960925252">+91 9960925252</a></p>
                               <div class="banner-one__btn-box">
                                    <a href="donateform.php" class="banner-one__btn thm-btn">Donate Now</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Service Details End-->
        
        <section>
        <div class="container">
                      <h3 class="services-details__title-2" style="text-align:center;">Services include</h3>
                            <ul class="services-details__points-list list-unstyled">
                                <li>
                                    <div class="services-details__icon-and-title">
                                        <div class="services-details__points-icon">
                                            <span class="icon-gardening-1"></span>
                                        </div>
                                        <h3 class="services-details__points-title">Tree Planting <br> Campaigns</h3>
                                    </div>
                                    <p class="services-details__points-text" style="text-align: justify">Organizing and executing tree planting events
                                    </p>
                                </li>
                                <li>
                                    <div class="services-details__icon-and-title">
                                        <div class="services-details__points-icon">
                                            <span class="icon-seeding"></span>
                                        </div>
                                        <h3 class="services-details__points-title">Community <br> Engagement</h3>
                                    </div>
                                    <p class="services-details__points-text" style="text-align: justify">Educating and mobilizing local communities<br>
                                     to participate</p>
                                </li>
                                <li>
                                    <div class="services-details__icon-and-title">
                                        <div class="services-details__points-icon">
                                            <span class="icon-house"></span>
                                        </div>
                                        <h3 class="services-details__points-title">Monitoring and<br> Evaluation</h3>
                                    </div>
                                    <p class="services-details__points-text" style="text-align: justify">Monitoring the progress of tree planting projects
                                     </p>
                                </li>
                            </ul>
                               <div class="services-details__benefit">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__benefit-img">
                                            <img src="assets/images/treeplant2.webp" alt="" style="width:100%; height:400px">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__benefit-content">
                                            <h3 class="services-details__benefit-title">Our benefits</h3>
                                            <p class="services-details__benefit-text">Your garden is in brilliant hands
                                                for your landscaping</p>
                                            <ul class="services-details__benefit-points list-unstyled">
                                                <li>
                                                    <div class="icon">
                                                        <span class="fas fa-leaf"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Garden care and plants planting</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="fas fa-leaf"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Leader in landscaping and lawn care</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="fas fa-leaf"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Repair your backyard scaping</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="fas fa-leaf"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Rebuild your garden look</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
              
                            </div>

        </section>

                      <div class = "container">
                       <div class = "row">
                                            
                                            <div class="col-xl-6 col-lg-4">
                        <div class="contact-details__single">
                            <div class="contact-details__single-inner">
                                <div class="contact-details__shape-1"
                                    style="background-image: url(assets/images/shapes/contact-details-shape-1.png);">
                                </div>
                                <div class="contact-details__icon">
                                    <span class="icon-address"></span>
                                </div>
                                <h4 class="contact-details__title">Location</h4>
                                <p class="contact-details__text">Bakori Pin code is 412207 and <br> postal head office is Vagholi,pune </p>
                            </div>
                        </div>
                   </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="contact-details__single">
                            <div class="contact-details__single-inner">
                                <div class="contact-details__shape-1"
                                    style="background-image: url(assets/images/shapes/contact-details-shape-1.png);">
                                </div>
                                <div class="contact-details__icon">
                                    <span class="icon-address"></span>
                                </div>
                                <h4 class="contact-details__title">Location</h4>
                                <p class="contact-details__text">Morachi Chincholi, Tal:, Shirur,<br> Maharashtra 412218</p>
                            </div>
                        </div>
                    </div>
                    </div> </div>
                                            
                                            
          
        
      <div class="col-md-12 text-center">
           <a href="events.php" class="btn btn-success btn-lg">Read More</a>
        
       </div> <br>

             <section>
             <div class="container">
  <div class="row">
    <div class="col-lg-4">
      <?php   $kk=1;
                          $qot = "SELECT * FROM campaign_videos WHERE camp_id='$camp_id'";
                                
                $queryht = mysqli_query($con, $qot);                
                while ($rest = mysqli_fetch_array($queryht)) { 
                  
                    $youtubeUrl = $rest['cimg_url'];
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

  </div>
</div>
</section>
 

<!-- donation form -->

<div class="container" style="margin-top:100px;">
	<h3 style="text-align: center;">Give Hope, Give Help, Give Today</h3><br>
	<h5 style="text-align:center;">Donate For <?php echo $res['camp_title']; ?></h5>
	
	<?php if($res['camp_taxbenifits']==2){ ?>
                  <div class="">
                    <p class="subtitle">Tax Benefits Available</p>
                  </div><?php } ?>
                  
        <?php $percentageRaised = ($res['camp_current_amount'] / $res['camp_target_amount']) * 100  ?>
	  <div class="progress mb-3" style="margin-top:40px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format($percentageRaised,0); ?>%"></div>
                           </div>
                             
                             <div class="row" style="margin-top:20px;">
                              <div class="col">
                                         <p style="font-size:16px;"><i style='font-size:16px' class='fas'>&#xf156;</i><?php echo formatCustomNumber($res['camp_target_amount']); ?></p>
                                        <p style="font-size:16px;">Goal</p>
                              </div>
                              <div class="col">
                                        <p style="font-size:16px;"><i style='font-size:16px' class='fas'>&#xf156;</i><?php echo formatCustomNumber($res['camp_current_amount']); ?></p>
                                        <p style="font-size:16px;">Raised</p>
                             </div>
                              <div class="col">
                                        <p style="font-size:16px;"><i style='font-size:16px' class='fas'>&#xf007;</i><?php echo $tdoners; ?></p>
                                        <p style="font-size:16px;">Supporters</p>
                                        
                              </div>
                           </div>  
</div>
<h4 style="text-align:center; padding-top:7px;">Donate Now</h4>
<div class="container" style="margin-top:40px; margin-bottom:40px;">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card" style="width=100%; margin-right:0px; background-color:#96e072;">
       
        <div class="card-body">
          <form action="donations-action.php" method="post">
          <input type="hidden" name="c" value="<?php echo $comp_id; ?>">
           <input type="hidden" name="s" value="<?php echo $_GET['s']; ?>">
            <div class="row form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="amount">Amount</label>
                  <input type="text"  name="amount" id="amount" class="form-control" placeholder="500" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                  <label for="birthday">Date of Birthday</label>
                  <input type="date" name="dob" id="birthday" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="eg. Neha Pokharna" required>
                </div>
                <div class="form-group">
                  <label for="contact">Contact No</label>
                  <input type="tel" name="tel" id="contact" class="form-control" placeholder="Your Contact No" required>
                </div>
                <div class="form-group">
                  <label for="postal">Pin/Postal Code</label>
                  <input type="text" name="pin" id="postal" class="form-control" placeholder="Your Contact No" required>
                </div>
              </div>
            </div>
            <div class="container">
              
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text"  name="address" id="address" class="form-control" required>
                </div>
              </div>
              <div class="container">
              
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" class="form-control" rows="3" required></textarea>
                </div>
              
            </div>
           
           
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agree" required>
                <label class="form-check-label" for="agree">I agree with the <a href="privacy-policy.php" target="_blank"> Privacy Policy </a> </label>
              </div>
            </div>
            <div class="form-group" style="text-align:center;">
              <button type="submit" name="submitdonation" class="btn btn-primary" style="background-color:green;">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
        


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
<script>
  // Get the input field, Total Donation button, and pricing list items by their IDs
  var amountInput = document.querySelector('.left_default_amount');
  var totalDonationBtn = document.getElementById('totalDonationBtn');
  var pricingItems = document.querySelectorAll('.selectPricing .listItem');

  // Function to update the Total Donation button based on the selected amount
  function updateTotalDonation(amount) {
    totalDonationBtn.textContent = 'Total Donation: ' + amount;
  }

  // Attach click event listeners to each pricing list item
  pricingItems.forEach(function(item) {
    item.addEventListener('click', function() {
      // Get the data-amount attribute value and update the Total Donation button
      var selectedAmount = item.getAttribute('data-amount');
      updateTotalDonation(selectedAmount);

      // Update the input field value to match the selected amount
      amountInput.value = selectedAmount;
    });
  });

  // Attach an input event listener to the input field to dynamically update the Total Donation button
  amountInput.addEventListener('input', function() {
    // Get the entered amount and update the content of the Total Donation button
    var enteredAmount = amountInput.value;
    updateTotalDonation(enteredAmount);
  });
</script>


<!-- Collin IT Solution -->
</html>
<?php } else {
    header("Location:campaign-try.php");    
} ?>