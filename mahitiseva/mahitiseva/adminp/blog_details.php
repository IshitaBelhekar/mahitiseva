<?php include('session.php');   include('aconnection.php'); include_once 'functions.php';
if($_SESSION['u_role']=="Executive") { header("Location:dashboard.php");  } ?>


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
    <link rel="icon" href="files/assets/images/fav.png" type="image/x-icon">
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
       <link rel="stylesheet" href="css/summernote/summernote.css">
    <style type="text/css">
    .note-popover{display: none;}
    .image-thumbnail {
    display: inline-block;
    margin-right: 10px;
    text-align: center;
}
.delete-button {
    background: #c90000;
    color: white;
    display: block;
    margin-top: 5px;
}
    </style>
</head>


<body> 
<?php include 'sidebar.php'; ?>
<?php  $u_id=$_SESSION['u_id']; ?>   
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
                                                    <li class="breadcrumb-item">
                                                        <a href=".php"> blogs List</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Add </a>
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
                                        <div class="col-lg-12 col-md-12 col-sm-12">          
                                          
                  
             
  <?php if(isset($_GET['blog_id'])){  
      $blog_id=$_GET['blog_id'];
      $qo="SELECT * FROM blog_details as c INNER JOIN blog_categories as b ON c.bca_id=b.bca_id
WHERE blog_id='$blog_id'";
      $queryh=mysqli_query($conf,$qo);
$resc=mysqli_fetch_array($queryh);      
           ?>
   <div class="card-block" style="background: antiquewhite;">
     <div class="row">    
     <div class="col-lg-6">
           <h4 class="sub-title" style="color: chocolate; font-size: 20px;">
 Update blog Details:</h4>    </div>  <!--  <div class="col-lg-6" style="text-align: right;">
 <a href="case_payments.php?_id=<?php echo $blog_id; ?>" class="btn btn-success">Invoices</a>  
     </div>--> </div>
                         
<form action="action-controller.php" class="form-inline" method="post">
<input name="blog_id" type="hidden" value="<?php echo $blog_id; ?>" readonly class="form-control" required>
<input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>
<input name="bca_title" type="hidden" value="<?php echo $bca_title; ?>" readonly class="form-control" required>

<div  style="padding: 5px;">
<label>Blog No: </label>
<input  value="<?php echo "MS/2024".date('Y')."/".$blog_id; ?>" readonly  type="text" class="form-control" required>
</div>

<div  style="padding: 5px;">
<label> Date: </label>
<input name="ca_date" readonly value="<?php echo $resc['blog_date']; ?>"   type="text" class="form-control" required>


</div><div  style="padding: 5px;">
<label> blog Title: </label>
<textarea name="ca_type"  maxlength="150"  placeholder="Upcomming blog Title"  class="form-control" required>
<?php echo $resc['blog_title']; ?></textarea>
</div><div  style="padding: 5px;">
<label>blog Status: </label>
<select name="blog_status" class="form-control" style="width: 100%;" required >
<?php if($resc['blog_status']==2){ ?> <option value="2"> Inactive </option> 
 <?php } else{ ?> <option value="1">Active</option> <?php } ?>
<option value="2"> Inactive </option>
<option value="1"> Active </option>
</select>
<label> Slug: </label>
<input  maxlength="180" value="<?php echo $resc['blog_slug']; ?>" readonly type="text" class="form-control" >

</div><div  style="padding: 5px;">
<label> Select Category: </label>
<select name="b_id" class="form-control" required >
<option value="<?php echo $resc['bca_id']; ?>"><?php echo $resc['bca_title']; ?></option>
<?php  $q="SELECT * FROM blog_categories ORDER BY bca_title";
$query=mysqli_query($con,$q);
while ($res=mysqli_fetch_array($query)) {  ?>
<option value="<?php echo $res['bca_id']; ?>"><?php echo $res['bca_title']; ?></option>
 <?php  } ?>
</select>


</div>



<div  style="padding: 5px;">
<br><button name="updatenewblog" type="submit" class="btn btn-success" > Update </button>
</div></form>


<form action="action-controller.php" class="form-inline" method="post">
    <input name="blog_id" type="hidden" value="<?php echo $blog_id; ?>" readonly class="form-control" required>
    <input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>
    <div style="padding: 5px;">
        <label>Description:<b style="color: black;">(Please Open Code View before update)</b> </label>
        <div id="summernote1"><?php echo $resc['blog_content']; ?></div>
          </div>


<script>
    // Assume you have fetched HTML data from the PHP script and stored it in a variable named 'htmlData'
    var htmlData = '<?php echo addslashes($resc['blog_content']); ?>';

    // Set the HTML content in the Summernote editor during initialization
    $('#summernote1').summernote({
        height: 200, // Set your desired height
        callbacks: {
            onInit: function() {
                // Set the content during initialization
                $('#summernote1').summernote('code', htmlData);
  }
        }
    });
</script>

<div  style="padding: 5px;">
<br><button name="updatenewblogdescription" type="submit" class="btn btn-success" > Update </button>
</div></form>
 </div>
  
  <?php } else { ?>
 <div class="card-block" style="background: #dff9df;">
        <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
 Add blog Details:</h4>                           
<form action="action-controller.php" class="form-inline" method="post" enctype="multipart/form-data" >
<input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>

<div  style="padding: 5px;">
<label> Date: </label>
<input name="ca_date"  value="<?php echo date('Y-m-d'); ?>"   type="date" class="form-control" required>

</div><div  style="padding: 5px;">
<label> blog Title: </label>
<textarea name="ca_type"  maxlength="150" placeholder="Upcomming blog Title"  class="form-control" required>
</textarea>
</div><div  style="padding: 5px;">
<label> Select Category: </label>
<select name="bca_id" class="form-control" required >
<option value="">Select Category</option>
<?php  $qv="SELECT * FROM blog_categories ORDER BY bca_title";
$query=mysqli_query($conn,$qv);
while ($resv=mysqli_fetch_array($query)) {  ?>
<option value="<?php echo $resv['bca_id']; ?>"><?php echo $resv['bca_title']; ?></option>
 <?php  } ?>
 <option value="<?php echo $resv['blog_id']; ?>"><?php echo $resv['blog_title']; ?></option>
 <?php  } ?>
</select>

</div>


<div  style="padding: 5px;">
<br><button name="addnewblog" type="submit" class="btn btn-success" > Add blog</button>
</div></form>
 </div>
 <?php  ?>
 
 
 
  
</div>
 <?php if(isset($_GET['blog_id'])){  ?>
 
   <div class="col-lg-6 col-md-6 col-sm-12" id="third" style="">          
      <div class="card-block" style="background: whitesmoke;">
        <h4 class="sub-title" style="color: chocolate;font-size: 20px;">Add Photos</h4>
                    <?php  if(isset($_GET['ferror'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['ferror']; ?></p>  
  <?php  }   if(isset($_GET['fmsg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['fmsg']; ?></p>  
  <?php  } ?> 
   <form action="action-controller.php" method="post" enctype="multipart/form-data">
       <input type="hidden" name="u_id" value="<?php echo $session_u_id; ?>" readonly required>
    <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>" readonly required>
    <input type="file" id="myFile" name="images[]" multiple required class="btn theme-btn-3 mb-10">
      <p>
*Files: png, jpg, jpeg, zip. Max 4MB<br>
</p>
      <button type="submit" name="updateblogimages" class="btn btn-danger" value="submit" >
            Insert <i class="fas fa-mail-forward"></i>
        </button>
    <div class="col-lg-12 pb-30" style="text-align: center;">
     
    </div>
</form>
     
     
     <div id="imageContainer" style="margin-top: 10px;">
  <?php $query = "SELECT * FROM blog_images WHERE blog_id='$blog_id' ";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="image-thumbnail">
<a href="<?php echo "blog-documents/".$row['bimg_url']; ?>" target="_blank"> 
 <img style="max-width: 80px;" src="<?php echo "../blog-documents/".$row['bimg_url']; ?>" title="<?php echo $row['bimg_url']; ?>" alt="Image">
  </a>
    <a class="delete-button" href="delete-controller.php?blog_id=<?php echo $blog_id; ?>&bimg_id=<?php echo $row['bimg_id']; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
  </div>
    <?php 
} ?>
</div>
    
   </div>           
   
   
   </div>
   
   
     
<?php } ?>


          
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

 <script src="js/summernote/summernote.min.js"></script>
     <script src="js/summernote/summernote-active.js"></script>


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
<!-- JavaScript code -->
<script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Set HTML content of the div
        $('#summernote1').html(blogContent);
    });
</script>


	<!-- Global site tag (gtag.js) - Google Analytics -->

</body>
</html>
