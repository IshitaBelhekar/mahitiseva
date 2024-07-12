<?php include('session.php');   include('aconnection.php'); 

?>
<?php     if($_SESSION['u_role']!="Admin") { header("Location:dashboard.php");  } ?>
<!DOCTYPE html>
<html lang="en">
<head>	
<title><?php echo $firmname; ?></title>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="#">
<meta name="author" content="#">
<!-- Favicon icon -->
    <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
</head>


<body> 
<?php include 'sidebar.php'; ?> 
                 <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
          <h6 style="color: red;">
                                         <?php    if(isset($_GET['Error'])){
                                                  echo $_GET['Error']; }    ?>
       </h6>
       <h6 style=" color: green;">
         <?php    if(isset($_GET['msg'])){
                  echo $_GET['msg']; }    ?>
       </h6>                                </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Users</a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Basic Form Inputs card start -->
                                            <div class="card">
                              <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-12">          
                                            <div class="card-block">
                
                   <?php
              if(isset($_GET['u_id'])){
                  $u_id=$_GET['u_id'];
                  $q="SELECT * FROM user_details WHERE u_id='$u_id'";
$query=mysqli_query($con,$q);
 while ($res=mysqli_fetch_array($query)) {   ?>  
 <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
 Update Users Details:</h4>                                                    
<form action="insertar.php" method="post" >
<input name="u_id" value="<?php echo $res['u_id']; ?>" type="hidden" required>

<label> User Role:</label>
<select name="u_role" class="form-control" required>
<option value="<?php echo $res['u_role']; ?>"><?php echo $res['u_role']; ?></option>
<option value="Admin">Admin</option>
<option value="Manager">Manager</option>
<!-- <option value="Executive">Executive</option> -->
</select>

<label> User Name:</label>
<input name="u_name" value="<?php echo $res['u_name']; ?>"  placeholder="User Name"  type="text" class="form-control" required>
<label> Contact No :</label>
<input name="u_contact" value="<?php echo $res['u_contact']; ?>"  maxlength="10" placeholder=" Contact No"  type="text" class="form-control" required>
<label> Alt Contact No :</label>
<input name="u_altcontact" value="<?php echo $res['u_altcontact']; ?>" maxlength="10"  placeholder="Alt Contact No"  type="text" class="form-control" >
<label> Email :</label>
<input name="u_email" value="<?php echo $res['u_email']; ?>"  placeholder="Email"  type="email"  class="form-control" >
<label> Address:</label>
<textarea  name="u_address"  placeholder="Address" class="form-control" required><?php echo $res['u_address']; ?></textarea>
<label>  Password :</label>
 <input name="u_password" id="password" value="<?php echo $res['u_password']; ?>"  placeholder=" Password"  type="password" class="form-control" required >
<label>  Confirm Password :</label>
<input name="cu_password"  placeholder="Confirm Password "  id="repeatpassword" type="text" class="form-control" required>

<input type="text" readonly class="form-control"  id="message">

<br><button name="updateuserdetails" class="btn btn-success" > Update </button>


</form>                        
            <?php  } }  else { ?>          
 <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
 Add Users Details:</h4>                                                    
<form action="insertar.php" method="post">

<label> User Role:</label>
<select name="u_role" class="form-control" required>
<option value="">Select</option>
<option value="Admin">Admin</option>
<option value="Manager">Manager</option>
<!-- <option value="Executive">Executive</option> -->
</select>
<label> User Name:</label>
<input name="u_name"  placeholder="User Name"  type="text" class="form-control" required>
<label> Contact No :</label>
<input name="u_contact"  placeholder=" Contact No"  type="text" class="form-control" required>
<label> Alt Contact No :</label>
<input name="u_altcontact"  placeholder="Alt Contact No"  type="text" class="form-control" >
<label> Email (optional):</label>
<input name="u_email"  placeholder="Email"  type="email" class="form-control" >
<label> Address:</label>
<textarea  name="u_address"  placeholder="Address" class="form-control" required></textarea>
<label>  Password :</label>
 <input name="u_password" id="password"   placeholder=" Password"  type="password" class="form-control" required >
<label>  Confirm Password :</label>
<input name="cu_password"  placeholder="Confirm Password "  id="repeatpassword" type="text" class="form-control" required>

<input type="text" readonly class="form-control"  id="message">
<br><button name="adduserdetails" class="btn btn-success" > Add </button>


</form>
  <?php  } ?>
                                            </div>                                       
                                          </div>
                                                            <div class="col-lg-9 col-md-8 col-sm-12">     
                                     <div class="card-block">         
                                     <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
 Users List:</h4>                          
<div style="width: 100%;">
        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                  <thead>
                  
                                                            <tr>
                                                             <th>ID</th>
                                                                <th>Role</th>
                                                                  <th>Name</th>
                                                                         <th >Action</th>
                                                                              <th >Contact No</th>
                                                                <th >Address</th>
                                                           
                                                                <th >Email</th>
          </thead>
   <tbody>
   
            <?php
$q="SELECT * FROM user_details ORDER BY u_name";
$query=mysqli_query($con,$q);
 while ($res=mysqli_fetch_array($query)) {   ?> 
      <tr>
            <td ><?php echo $res['u_id']; ?></td>
         <td ><?php echo $res['u_role']; ?></td>
          <td ><?php echo $res['u_name']; ?></td>

         <td> <a href="users.php?u_id=<?php echo $res['u_id']; ?>" ><button>Edit</button></a>
        </td>
         
          <td ><?php echo $res['u_contact']; ?>, <?php echo $res['u_altcontact']; ?> </td>
         <td ><?php echo $res['u_address']; ?></td>
          <td ><?php echo $res['u_email']; ?></td>
                                                            </tr>
       <?php  } ?>                                                                                                            
                                                        </tbody>
  </table>
                                                </div>
                                        </div>
                                        <!-- Input Grid card end -->
                                       
                                        <!-- Input Alignment card end -->
                                    </div>
                                </div>
                            </div>
                            <!-- Page body end -->
                        </div>
                    </div>
                    <!-- Main-body end -->
                  
                </div>
            </div>
        </div>
    </div>
</div>
</div></div></div></div>
</div></div>
	<!-- Warning Section Ends -->
	<!-- Required Jquery -->
	    <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>
   <script src="files/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="files/assets/js/script.min.js"></script>


    <!-- i18next.min.js -->
    <script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
 <!-- data-table js -->
      <script src="files/assets/pages/data-table/js/data-table-custom.js"></script>
  <script src="files/bower_components/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="files/bower_components/jquery.steps/js/jquery.steps.js"></script>
    <script src="files/bower_components/jquery-validation/js/jquery.validate.js"></script>
    <!-- Validation js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/form-validation/validate.js"></script>
    <!-- Custom js -->
    <script src="files/assets/pages/forms-wizard-validation/form-wizard.js"></script>

    <script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="files/assets/pages/data-table/js/jszip.min.js"></script> 
    <script src="files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    
    <script src="files/assets/pages/forms-wizard-validation/form-wizard.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/vartical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files/assets/js/script.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/vartical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files/assets/js/script.js"></script>

<script>  
function matchPassword() {  
  var pw1 = document.getElementById("pswd1");  
  var pw2 = document.getElementById("pswd2");  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    alert("Password created successfully");  
  }  
}  
</script> 
<script>    
$('#repeatpassword').keyup(function(){
var textone;
var texttwo;
textone = $('#password').val();
texttwo = $('#repeatpassword').val();
if(textone.localeCompare(texttwo)==0){
	var b='Password Matched';
$('#message').val(b);
}else{
	var b='Password Not Matched';
	$('#message').val(b);	
}

});

</script>
<script>    
$('#password').keyup(function(){
var textone;
var texttwo;
textone = $('#password').val();
texttwo = $('#repeatpassword').val();

if(textone.localeCompare(texttwo)==0){
var b='Password Matched';
$('#message').val(b);
}else{
	var b='Password Not Matched';
	$('#message').val(b);	
}

});

</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

</body>
</html>
