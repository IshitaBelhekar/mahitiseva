 <?php include("adminp/aconnection.php"); include("adminp/functions.php"); ?> 
<?php

if(isset($_GET['c'])){

$comp_id=$_GET['c'];
$do=$_GET['do'];
$s=$_GET['s'];

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
    $qot = "SELECT * FROM donars_list WHERE camp_id='$camp_id' AND do_id='$do'";
    $queryht = mysqli_query($connn, $qot);
    $rest = mysqli_fetch_array($queryht);
    
    
    $c_mainimage=null;
    $qot = "SELECT * FROM campaign_images WHERE camp_id='$camp_id'";
    $queryht = mysqli_query($con, $qot);
    while ($restr = mysqli_fetch_array($queryht)) {
        $c_mainimage=$restr['cimg_url'];
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
       
 
    
      <!--End-of Donation Payment -->
      <!-- Footer S t a r t -->
      
       <section class="product-details">
            <div class="container">
                <div class="row">
                       <div class="col-lg-6 col-xl-6">
                        <div class="product-details__top">
<!--                             <h3 class="product-details__title">Office chair <span>$78.00</span> </h3> -->
                            <h2 class="product-details__title">Hi, <?php echo $rest['do_name']; ?></h2>
                        </div>
                        <div class="product-details__reveiw">
                            <p style="color: green;"> Your account is generated successfully. Please proceed for payment.</p>
                        </div>
                        <div class="product-details__content">
                            <h4>
                          Amount: <b style="color: #2AB939;"> &#8377;<?php echo $rest['do_amount']; ?></b>
                          </h4>
                          <br>
                          <p>Reference No:  <b>MASSCP<?php echo $rest['do_id']; ?></b> </p>
                        </div>
                        
                        <form id="donationForm" action="#">
                     <input type="hidden" name="do" id="do"  value="<?php echo $do; ?>" required>
                       <input type="hidden" name="c" id="c" value="<?php echo $comp_id; ?>" required>
                        <input type="hidden" name="s" id="s" value="<?php echo $s; ?>" required>    
                         <input  id="donationamount" readonly type="hidden" min="1" value="<?php echo $rest['do_amount']; ?>">
       <input  id="donername" type="hidden" value="<?php echo $rest['do_name']; ?>">
           <input type="hidden" id="doneremail" value="<?php echo $rest['do_email']; ?>" >
                 <input  type="hidden" id="donercontactno" value="<?php echo $rest['do_contactno']; ?>" >
                 <input id="referamceno" type="hidden" value="MYSPCP<?php echo $rest['do_id']; ?>" >

                        <div class="product-details__quantity">
                            <img src="assets/images/payment-method4.png" alt="img" style="padding: 2px 2px; width:200px; height:100px;">
                        </div>


                       

                            <div class="product-details__buttons-2">
                                <a href="cart.html" class="thm-btn">Donate now</a>
                            </div>
                             </form>
                        </div>
                    <div class="col-lg-6 col-xl-6">

                         <div class="card" style="width:430px;">
                              <a href="campaign-details.php?c=<?php echo $camp_id; ?>&s=<?php echo $camp_slug; ?>">
                              
                              
                               <img src="<?php echo "camp-documents/".$c_mainimage; ?>" class="img-fluid" alt="img"> </a>
  
                       <div class="card-body">
                        <h4 class="title text-capitalize" style="margin-bottom: 30px;">
                        <a href="campaign-details.php?c=<?php echo $camp_id; ?>&s=<?php echo $camp_slug; ?>" >
                        <?php $shortenedString = substr($res['camp_title'], 0, 70);
                          if (strlen($res['camp_title']) > 70) {
                          $shortenedString .= "...";
                           } echo $shortenedString;?></a><br>
							<p>by <?php echo substr($res['org_name'], 0, 30); ?></p>
					 </h4> 
					 
					 <div class="priceListing">
                                      <ul class="listing">
                                          <li class="listItem"><p class="leftCap font-600">Your Donation</p> 	&#8377; <?php echo $rest['do_amount']; ?></li>
                                          <li class="listItem"><p class="leftCap rightCap font-600">Total</p> &#8377; <?php echo $rest['do_amount']; ?></li>
                                      </ul>
                                  </div>
                      </div>
                     </div>
                        
                        
                        
                           
                            
                       
                    </div>
                  
                       
                       
                    </div>
                
            </div>
        </section>
      
      
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
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach a click event listener to the Donate Now button
        document.getElementById('donateNowBtn').addEventListener('click', function () {
            // Fetch the donation amount and other values from your form
            var donationAmount = document.getElementById('donationamount').value;
            var donername = document.getElementById('donername').value;
            var doneremail = document.getElementById('doneremail').value;
            var donercontactno = document.getElementById('donercontactno').value;
            var referamceno = document.getElementById('referamceno').value;
            var dor = document.getElementById('do').value;
            var c = document.getElementById('c').value;
            var s = document.getElementById('s').value;

            // Check for empty values
            if (!donationAmount || !donername || !doneremail || !donercontactno || !referamceno) {
                alert('Please fill in all required fields.');
                return;
            }

            // Use an AJAX request to send the donation amount to your server
            // You can use any method you prefer to send the donation amount to your server

            // Make an AJAX request to your server to create a Razorpay order
            fetch('payment-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    amount: donationAmount,
                }),
            })
            .then(response => response.json())
            .then(response => {
                // If the order creation is successful, open the Razorpay checkout
                if (response.success) {
                    var options = {
                        key: 'rzp_live_E89HCTQyLhtKg5',  // Replace with your Razorpay Key
                        amount: response.amount,
                        currency: 'INR',  // Update with your currency code
                        name: 'My Sparsh Foundation',
                        description: 'Ref. No: ' + referamceno,
                        order_id: response.orderId,
                        handler: function (response) {
                            // Handle successful payment response
                            alert('Payment Successful! Payment ID: ' + response.razorpay_payment_id);

                            // Additional data to save in your database
                            var paymentId = response.razorpay_payment_id;
                            var paymentAmount = response.amount / 100; // Convert back to the original amount
                            var paymentDescription = referamceno;

                            // Make an AJAX request to save data in your database
                            fetch('save-payment-details.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    paymentId: paymentId,
                                    paymentAmount: donationAmount,
                                    paymentDescription: paymentDescription,
                                    dor: dor,
                                    c: c,
                                    s: s,
                                }),
                            })
                            .then(response => response.json())
                            .then(response => {
                                if (response.success) {
                                    console.log('Payment details saved successfully!');
                                } else {
                                    console.error('Failed to save payment details.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        },
                        prefill: {
                            name: donername,  // Update with the donor's name
                            email: doneremail,  // Update with the donor's email
                            contact: donercontactno,  // Update with the donor's contact number
                        },
                        theme: {
                            color: '#3399cc',  // Update with your preferred color
                        },
                    };

                    var rzp = new Razorpay(options);
                    rzp.open();
                } else {
                    // Handle failure in creating Razorpay order
                    console.error('Error in Razorpay order creation:', response.error);
                    alert('Failed to create Razorpay order. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error in Razorpay order creation:', error);
                alert('Failed to create Razorpay order. Please try again.');
            });
        });
    });
</script>
    
    
  </body>

<!-- Include the script at the end of your HTML body -->
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
</html>
<?php } ?>
