<?php include("aconnection.php");
if(session_start()!=true){
    session_start();
}
if(isset($_SESSION['u_name'])){
    header("location:dashboard.php");
}
$s1=rand(1,20);
$s2=rand(10,20);
$s3=null;
$s3=$s2+$s1;

$login_id=null;
$login_id=null; $u_role=null;
$er=null;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $count=0;
    $result=0;
    $check = mysqli_real_escape_string($con,$_POST['check']);
    $checkk = mysqli_real_escape_string($con,$_POST['checkk']);
    $answer=substr($checkk,0,7);
    $answer=substr($answer,4,7);
    $answer=(int)$answer-124;
    
    if($check==$answer){
        
        $myusername = mysqli_real_escape_string($con,$_POST['Email']);
        $mypassword = mysqli_real_escape_string($con,$_POST['Password']);
        
        $sql = "SELECT * FROM user_details WHERE u_contact = '$myusername' and u_password = '$mypassword'";
        $result = mysqli_query($con,$sql);
        
        
        $login_id=null;
        $login_id=null; $u_role=null;
        if ($row = mysqli_fetch_array($result)) {
            $login_id=$row['u_id'];
            $name=$row['u_name'];
            $u_role=$row['u_role'];
            $count =$count+1;
            
        }
        if($count != 0) {
            
            $_SESSION['u_id'] = $login_id;
            $_SESSION['u_name'] = $name;
            $_SESSION['u_role'] = $u_role;
            
            header("location: dashboard.php");
        }else {
            $er = "Your Login Name or Password is invalid";
        }
    } else {
        $er = "Wrong Checked Answer!";
    } } ?>

   <!doctype html>
   <html class="no-js" lang="en">

   <head>
       <meta charset="utf-8">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title> Login Page</title>
       <meta name="description" content="">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- favicon
   		============================================ -->
       <link rel="shortcut icon" type="image/x-icon" href="img/fav.png">
       <!-- Google Fonts
   		============================================ -->
       <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
       <!-- Bootstrap CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/bootstrap.min.css">
       <!-- Bootstrap CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/font-awesome.min.css">
       <!-- owl.carousel CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/owl.carousel.css">
       <link rel="stylesheet" href="login/css/owl.theme.css">
       <link rel="stylesheet" href="login/css/owl.transitions.css">
       <!-- animate CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/animate.css">
       <!-- normalize CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/normalize.css">
       <!-- main CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/main.css">
       <!-- morrisjs CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/morrislogin/js/morris.css">
       <!-- mCustomScrollbar CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/scrollbar/jquery.mCustomScrollbar.min.css">
       <!-- metisMenu CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/metisMenu/metisMenu.min.css">
       <link rel="stylesheet" href="login/css/metisMenu/metisMenu-vertical.css">
       <!-- calendar CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/calendar/fullcalendar.min.css">
       <link rel="stylesheet" href="login/css/calendar/fullcalendar.print.min.css">
       <!-- forms CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/form/all-type-forms.css">
       <!-- style CSS
   		============================================ -->
       <link rel="stylesheet" href="login/style.css">
       <!-- responsive CSS
   		============================================ -->
       <link rel="stylesheet" href="login/css/responsive.css">
       <!-- modernizr JS
   		============================================ -->
       <script src="login/js/vendor/modernizr-2.8.3.min.js"></script>
   </head>

   <body>
       <!--[if lt IE 8]>
   		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   	<![endif]-->
   	<div class="error-pagewrap">
   		<div class="error-page-int">
   			<div class="text-center m-b-md custom-login">
   				<h3>ADMIN LOGIN PAGE</h3>
   				<p style="color: red;">

             <?php  
   if($er!=null){
   echo "Error:".$er;
   }
   if(isset($_GET['error'])){
       echo $_GET['error'];
   }
   ?>
   </p>
   <?php     $s1=rand(11,20);
$s2=rand(11,20);
$s5=rand(1111,2000);
$s6=rand(111,299);
$s3=$s2+$s1;
$s3=$s5."".($s3+124)."".$s6;

?>
   			</div>
   			<div class="content-error">
   				<div class="hpanel">
                       <div class="panel-body">
                           <form method="post" id="loginForm">
                            <input type="hidden" required name="checkk" value="<?php echo $s3; ?>">
                               <div class="form-group">
                                   <label class="control-label">Username</label>
                                   <input type="text" placeholder="Your Username" title="Please enter your username" required value="" name="Email" id="username" class="form-control">
 </div>
                               <div class="form-group">
                                   <label class="control-label" >Password</label>
                                   <input type="password" title="Please enter your password" placeholder="******" required value="" name="Password" id="password" class="form-control">

                               </div>
                                     <div class="row">
                                       <div class="column col-lg-4 col-sm-4">
                                 <div class="form-group">
   <label class="control-label" >Check:</label>
     </div>  </div>
                                     <div class="column col-lg-4 col-sm-4">
                               <div class="form-group">

                                 <input type="text" title="Please enter your password" readonly  name="check" style="background: antiquewhite;font-size: 20px;
       color: red;" value="<?php echo $s1." + ".$s2." =";  ?>" class="form-control">
       </div>  </div>
     <div class="column col-lg-4 col-sm-4">
                         <div class="form-group">
<input type="text" title="Please enter your password" style="background: antiquewhite;font-size: 20px;
   color: red;" required  name="check" class="form-control">
  

                               </div>  </div>  </div>
     <button class="btn btn-success btn-block loginbtn" >Login</button>
  </form>
                       </div>
                   </div>
   			</div>
   			<div class="text-center login-footer">
   				<p>For Any Technical Help Contact: <a href="Tel: +917841857926"> +917841857926 </a></p>
   			</div>

   			<div class="text-center login-footer">
   				<p>Copyright © 2024. All rights reserved <a href="https://mysparshfoundation.org/" target="blank">My Sparsh Foundation</a>.<br>
   				 Design & Developed by<a href="https://collinitsolution.com" target="blank"> Collin IT Solution</a> </p>
   			</div>
   		</div>
       </div>
       <!-- jquery
   		============================================ -->
       <script src="login/js/vendor/jquery-1.12.4.min.js"></script>
       <!-- bootstrap JS
   		============================================ -->
       <script src="login/js/bootstrap.min.js"></script>
       <!-- wow JS
   		============================================ -->
       <script src="login/js/wow.min.js"></script>
       <!-- price-slider JS
   		============================================ -->
       <script src="login/js/jquery-price-slider.js"></script>
       <!-- meanmenu JS
   		============================================ -->
       <script src="login/js/jquery.meanmenu.js"></script>
       <!-- owl.carousel JS
   		============================================ -->
       <script src="login/js/owl.carousel.min.js"></script>
       <!-- sticky JS
   		============================================ -->
       <script src="login/js/jquery.sticky.js"></script>
       <!-- scrollUp JS
   		============================================ -->
       <script src="login/js/jquery.scrollUp.min.js"></script>
       <!-- mCustomScrollbar JS
   		============================================ -->
       <script src="login/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
       <script src="login/js/scrollbar/mCustomScrollbar-active.js"></script>
       <!-- metisMenu JS
   		============================================ -->
       <script src="login/js/metisMenu/metisMenu.min.js"></script>
       <script src="login/js/metisMenu/metisMenu-active.js"></script>
       <!-- tab JS
   		============================================ -->
       <script src="login/js/tab.js"></script>
       <!-- icheck JS
   		============================================ -->
       <script src="login/js/icheck/icheck.min.js"></script>
       <script src="login/js/icheck/icheck-active.js"></script>
       <!-- plugins JS
   		============================================ -->
       <script src="login/js/plugins.js"></script>
       <!-- main JS
   		============================================ -->
       <script src="login/js/main.js"></script>
       <!-- tawk chat JS
   		============================================ -->
       <!-- <script src="login/js/tawk-chat.js"></script> -->
   </body>

   </html>
