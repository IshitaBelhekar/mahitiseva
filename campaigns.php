<?php include("adminp/aconnection.php"); include("adminp/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">


<!-- Collin IT Solution -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Campaigns</title>
<!-- favicons Icons -->
<link rel="apple-touch-icon" sizes="180x180"
	href="assets/images/fav.png" />
<link rel="icon" type="image/png" sizes="32x32"
	href="assets/images/fav.png" />
<link rel="icon" type="image/png" sizes="16x16"
	href="assets/images/fav.png" />
<link rel="manifest" href="assets/images/favicons/site.webmanifest" />
<meta name="description" content="gardon HTML 5 Template " />

<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<script src='https://kit.fontawesome.com/a076d05399.js'
	crossorigin='anonymous'></script>
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

<link
	href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
	rel="stylesheet">

<link rel="stylesheet"
	href="assets/vendors/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
<link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
<link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
<link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
<link rel="stylesheet"
	href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
<link rel="stylesheet"
	href="assets/vendors/nouislider/nouislider.min.css" />
<link rel="stylesheet"
	href="assets/vendors/nouislider/nouislider.pips.css" />
<link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
<link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
<link rel="stylesheet" href="assets/vendors/gardon-icons/style.css">
<link rel="stylesheet"
	href="assets/vendors/tiny-slider/tiny-slider.min.css" />
<link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
<link rel="stylesheet"
	href="assets/vendors/alagambe-font/stylesheet.css" />
<link rel="stylesheet"
	href="assets/vendors/owl-carousel/owl.carousel.min.css" />
<link rel="stylesheet"
	href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
<link rel="stylesheet"
	href="assets/vendors/bxslider/jquery.bxslider.css" />
<link rel="stylesheet"
	href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
<link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
<link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
<link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />
<link rel="stylesheet"
	href="assets/vendors/twenty-twenty/twentytwenty.css" />

<!-- template styles -->
<link rel="stylesheet" href="assets/css/gardon.css" />
<link rel="stylesheet" href="assets/css/gardon-responsive.css" />
   
    
    
    
    <style>
    .services-one__img {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .services-one__img img {
        width: 100%;
        height: 250px;
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
			<div class="sticky-header__content"></div>
			<!-- /.sticky-header__content -->
		</div>
		<!-- /.stricky-header -->


		<!--Page Header Start-->
		<section class="page-header">
			<div class="page-header-bg"
				style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
			</div>
			<div class="container">
				<div class="page-header__inner">
					<h2>Our Campaigns</h2>
					<ul class="thm-breadcrumb list-unstyled">
						<li><a href="index.html">Home</a></li>
						<li><span>></span></li>
						<li>Campaigns</li>
					</ul>
				</div>
			</div>
		</section>
		<!--Page Header End-->

		<!--Services Page Start-->
		<section class="services-page">
			<div class="container">
				<div class="row">
					
				<?php  $qo = "SELECT * FROM campaign_details as c INNER JOIN organizers as b ON c.org_id=b.org_id WHERE c.camp_status=1 ORDER BY c.camp_id DESC";
            
          if(isset($_GET['o'])) { if($_GET['o']!="All"){
              $qo = "SELECT * FROM campaign_details as c INNER JOIN organizers as b ON c.org_id=b.org_id WHERE c.camp_status=1 AND c.org_id=".$_GET['o']." ORDER BY c.camp_id DESC";
          }
              
          }
				
				 $co=0;
            $queryh = mysqli_query($conf, $qo);
            
            while ($res = mysqli_fetch_array($queryh)) {
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
                ?>
<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="services-one__single">
							<div class="services-one__img-box">
								<div class="services-one__img">
									<img src="<?php echo "camp-documents/".$c_mainimage; ?>" alt="" style="height:214px;">
								</div>
							</div>
							
							<h3 class="services-one__title">
								<a href="campaign-details.php"><?php echo $res['camp_title']; ?></a>
							</h3>
							<p class="services-one__text">By <?php echo $res['org_name']; ?></p>
								
						    <?php $percentageRaised = ($res['camp_current_amount'] / $res['camp_target_amount']) * 100  ?>
							<div class="progress mb-3" style="margin-top: 20px;">
								<div class="progress-bar bg-success" role="progressbar"
									style="width: <?php echo number_format($percentageRaised,0); ?>%" aria-valuenow="50" aria-valuemin="0"
									aria-valuemax="100"><?php echo number_format($percentageRaised,0); ?>%</div>
							</div>

							<div class="row" style="margin-top: 20px;">
								<div class="col">
									<p>
										<i style='font-size: 16px' class='fas'>&#xf156;</i><?php echo formatCustomNumber($res['camp_target_amount']); ?>
									</p>
									<p>Goal</p>
								</div>
								<div class="col">
									<p>
										<i style='font-size: 16px' class='fas'>&#xf156;</i><?php echo formatCustomNumber($res['camp_current_amount']); ?>
									</p>
									<p>Raised</p>
								</div>
								<div class="col">
									<p>
										<i style='font-size: 16px' class='fas'>&#xf007;</i><?php echo $tdoners; ?>
									</p>
									<p>Supporters</p>

								</div>
							</div>
							<div class="contact-one__form btn-box" style="margin-top: 20px;">
								<a href="campaign-details.php?c=<?php echo $camp_id; ?>&s=<?php echo $camp_slug; ?>">
									<button type="submit" class="thm-btn contact-one__form-btn"
										style="align-items: center; color: white;">Donate Now</button>
								</a>
							</div>
						</div>
					</div>
					
					<?php if($co>=3){break;} } ?>
					<!--Services One Single End-->
					<!--Services One Single End-->
					<!--Services One Single Start-->
					
					<!--Services One Single End-->
					
					



				</div>
			</div>
		</section>
		<!--Services Page End-->

 <?php include 'footer.php'; ?>


    </div>
	<!-- /.page-wrapper -->


	<div class="mobile-nav__wrapper">
		<div class="mobile-nav__overlay mobile-nav__toggler"></div>
		<!-- /.mobile-nav__overlay -->
		<div class="mobile-nav__content">
			<span class="mobile-nav__close mobile-nav__toggler"><i
				class="fa fa-times"></i></span>

			<div class="logo-box">
				<a href="index.html" aria-label="logo image"><img
					src="assets/images/mseva-logo-1-95x95.png" width="100" alt="" /></a>
			</div>
			<!-- /.logo-box -->
			<div class="mobile-nav__container"></div>
			<!-- /.mobile-nav__container -->

			<ul class="mobile-nav__contact list-unstyled">
				<li><i class="fa fa-envelope"></i> <a
					href="mailto:needhelp@packageName__.com">info@mahitiseva.in</a></li>
				<li><i class="fa fa-phone-alt"></i> <a href="tel:9960925252">9960925252</a></li>
			</ul>
			<!-- /.mobile-nav__contact -->
			<div class="mobile-nav__top">
				<div class="mobile-nav__social">
					<a href="#" class="fab fa-twitter"></a> <a href="#"
						class="fab fa-facebook-square"></a> <a href="#"
						class="fab fa-pinterest-p"></a> <a href="#"
						class="fab fa-instagram"></a>
				</div>
				<!-- /.mobile-nav__social -->
			</div>
			<!-- /.mobile-nav__top -->



		</div>
		<!-- /.mobile-nav__content -->
	</div>
	<!-- /.mobile-nav__wrapper -->

	<div class="search-popup">
		<div class="search-popup__overlay search-toggler"></div>
		<!-- /.search-popup__overlay -->
		<div class="search-popup__content">
			<form action="#">
				<label for="search" class="sr-only">search here</label>
				<!-- /.sr-only -->
				<input type="text" id="search" placeholder="Search Here..." />
				<button type="submit" aria-label="search submit" class="thm-btn">
					<i class="icon-magnifying-glass"></i>
				</button>
			</form>
		</div>
		<!-- /.search-popup__content -->
	</div>
	<!-- /.search-popup -->

	<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i
		class="icon-right-arrow"></i></a>


	<script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendors/jarallax/jarallax.min.js"></script>
	<script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
	<script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
	<script
		src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
	<script
		src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
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
	<script
		src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
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
