<?php include('session.php');   include('aconnection.php'); include 'functions.php';
if($_SESSION['u_role']=="Executive") { header("Location:dashboard.php");  }

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
                                                        <a href="campaigns-list.php"> Campaign List</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Add Campaign</a>
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
                                          
                  
             
  <?php if(isset($_GET['camp_id'])){  
      $camp_id=$_GET['camp_id'];
      $qo="SELECT * FROM campaign_details as c INNER JOIN organizers as b ON c.org_id=b.org_id WHERE c.camp_id='$camp_id'";
      $queryh=mysqli_query($conf,$qo);
$resc=mysqli_fetch_array($queryh);    

$comp_slug=$resc['comp_slug'];

           ?>
   <div class="card-block" style="background: antiquewhite;">
     <div class="row">    
     <div class="col-lg-12">
           <h4 class="sub-title" style="color: chocolate; font-size: 20px;">
 Update Campaign Details:</h4>  
 
 <h3 style="text-align: right;">
 <a href="campaign-doners.php?camp_id=<?php echo $camp_id; ?>" class="btn btn-danger">View Doners</a> &nbsp; 
<a href="../campaign-details.php?c=<?php echo $camp_id; ?>&s=<?php echo $comp_slug; ?>" target="_blank" class="btn btn-success">  <i class="feather icon-eye"></i> </a></h3> 
   </div>  <!--  <div class="col-lg-6" style="text-align: right;">
 <a href="cascamp_payments.php?camp_id=<?php echo $camp_id; ?>" class="btn btn-success">Invoices</a>  
     </div>--> </div>
          <div class="row">  
         <div class="col-lg-12">                     
<form action="action-controller.php" class="form-inline" method="post">
<input name="camp_id" type="hidden" value="<?php echo $camp_id; ?>" readonly class="form-control" required>
<input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>

<div  style="padding: 5px;">
<label> Workdons No: </label>
<input  value="<?php echo "MYSP/CP/".date('Y')."/".$camp_id; ?>" readonly  type="text" class="form-control" required>
</div>
<div  style="padding: 5px;">
<label>Start Date: </label>
<input name="ca_date"  value="<?php echo $resc['camp_startdate']; ?>"   type="date" class="form-control" required>
<label>End Date: </label>
<input name="camp_enddate"  value="<?php echo $resc['camp_enddate']; ?>"   type="date" class="form-control" >
</div><div  style="padding: 5px;">
<label> Campaign Title: </label>
<textarea name="ca_type"  maxlength="150" placeholder="Title"  class="form-control" required><?php echo $resc['camp_title']; ?>
</textarea>
</div>

<div  style="padding: 5px;">
<label> Select Organizer: </label>
<select name="org_id" class="form-control" required >
<option value="<?php echo $resc['org_id']; ?>"><?php echo $resc['org_name']; ?></option>
<?php  $qv="SELECT * FROM organizers ORDER BY org_name";
$query=mysqli_query($conn,$qv);
while ($resv=mysqli_fetch_array($query)) {  ?>
<option value="<?php echo $resv['org_id']; ?>"><?php echo $resv['org_name']; ?></option>
 <?php  } ?>
</select>

</div>
<div  style="padding: 5px;">
<label> Target Amount: </label>
<input name="camp_target_amount"  value="<?php echo $resc['camp_target_amount']; ?>" required placeholder="eg 500000"  type="text" class="form-control" >
<label> Raised Amount: </label>
<input name="camp_current_amount"  value="<?php echo $resc['camp_current_amount']; ?>" required placeholder="eg 100000"  type="text" class="form-control" >
</div>

<div  style="padding: 5px;">
<label>Campaign Status: </label>
<select name="w_status" class="form-control" style="width: 100%;" required >
<?php if($resc['camp_status']==2){ ?> <option value="2"> Inactive </option> 
 <?php } else{ ?> <option value="1">Active</option> <?php } ?>
<option value="2"> Inactive </option>
<option value="1"> Active </option>
</select>
</div>

<div  style="padding: 5px;">
<label>Tax Benifits: </label>
<select name="camp_taxbenifits" class="form-control" style="width: 100%;" required >
<?php if($resc['camp_status']==2){ ?> <option value="2"> Yes </option> 
 <?php } else{ ?> <option value="1">No</option> <?php } ?>
<option value="2"> Yes </option>
<option value="1"> No </option>
</select>
</div>

<div  style="padding: 5px;">
<br><button name="updatenewcamp" type="submit" class="btn btn-success" > Update </button>
</div></form>


<form action="action-controller.php" class="form-inline" method="post">
    <input name="camp_id" type="hidden" value="<?php echo $camp_id; ?>" readonly class="form-control" required>
    <input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>
    <div style="padding: 5px;">
        <label>Description:<b style="color: black;">(Please Open Code View before update)</b> </label>
        <div id="summernote1"><?php echo $resc['camp_content']; ?></div>
          </div>


<script>
    // Assume you have fetched HTML data from the PHP script and stored it in a variable named 'htmlData'
    var htmlData = '<?php echo addslashes($resc['camp_content']); ?>';

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
<br><button name="updatenewcampdescription" type="submit" class="btn btn-danger" > Update </button>
</div></form>
<hr>
</div></div>
 <div class="row">
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
    <input type="hidden" name="camp_id" value="<?php echo $camp_id; ?>" readonly required>
    <input type="file" id="myFile" name="images[]" multiple required class="btn theme-btn-3 mb-10">
      <p>
*Files: png, jpg, jpeg, Webp. Max 1 MB<br>
</p>
      <button type="submit" name="updatecampimages" class="btn btn-danger" value="submit" >
            Insert <i class="fas fa-mail-forward"></i>
        </button>
    <div class="col-lg-12 pb-30" style="text-align: center;">
     
    </div>
</form>

     <div id="imageContainer" style="margin-top: 10px;">
  <?php $query = "SELECT * FROM campaign_images WHERE camp_id='$camp_id'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="image-thumbnail">
 <a href="<?php echo "../camp-documents/".$row['cimg_url']; ?>" target="_blank"> 
  <img style="max-width: 80px;" src="<?php echo "../camp-documents/".$row['cimg_url']; ?>" title="<?php echo $row['cimg_url']; ?>" alt="Image">
 </a>
    <a class="delete-button" href="delete-controller.php?camp_id=<?php echo $camp_id; ?>&cimg_id=<?php echo $row['cimg_id']; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
  </div>
    <?php } ?>
</div>
    
   </div>           
   
   
   </div>
   
   
 
   <div class="col-lg-6 col-md-6 col-sm-12" id="third" style="">          
      <div class="card-block" style="background: whitesmoke;">
        <h4 class="sub-title" style="color: chocolate;font-size: 20px;">Add Videos</h4>
       <?php  if(isset($_GET['ferror'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['ferror']; ?></p>  
  <?php  }   if(isset($_GET['fmsg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['fmsg']; ?></p>  
  <?php  } ?> 
   <form action="action-controller.php" method="post" >
       <input type="hidden" name="u_id" value="<?php echo $session_u_id; ?>" readonly required>
    <input type="hidden" name="camp_id" value="<?php echo $camp_id; ?>" readonly required>
    <input type="text" name="video" required class="form-control" placeholder="Youtube Video Link Only"  style="max-width: 350px;">
  <button type="submit" name="addvideolink" class="btn btn-danger" value="submit" >
            Insert <i class="fas fa-mail-forward"></i>
        </button>
    <div class="col-lg-12 pb-30" style="text-align: center;">
     
    </div>
</form>

     <div id="imageContainer" style="margin-top: 10px;">
  <?php $query = "SELECT * FROM campaign_videos WHERE camp_id='$camp_id'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {    
    
    $youtubeUrl = $row['cimg_url'];
    $embeddedLink = embedYouTubeVideo($youtubeUrl);
    
    if ($embeddedLink) {
        
 echo '<iframe width="100%" height="400" src="' . $embeddedLink . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    
?><div style="text-align: center;">
<a class="delete-button" href="delete-controller.php?camp_id=<?php echo $camp_id; ?>&cavid_id=<?php echo $row['cavid_id']; ?>" onclick="return confirm('Are you sure you want to delete?');" style="margin: 20px 15px; max-width: 100px;">Delete</a>
</div>
<?php 
    } else {
  
    }
    
   
} ?>
</div>
    
   </div>           
   
   
   </div>
   

<!-- 
<img alt="image" src="<?php echo "../camp-documents/".$resc['camp_img']; ?>" style="max-width: 300px;">

   <form action="action-controller.php" method="post" enctype="multipart/form-data">
       <input type="hidden" name="u_id" value="<?php echo $session_u_id; ?>" readonly required>
    <input type="hidden" name="comp_id" value="<?php echo $resc['camp_id']; ?>" readonly required>
    <input type="file" id="myFile" name="images[]" multiple required class="btn theme-btn-3 mb-10">
      <p>
*Files: png, jpg, jpeg, Webp. Max 1 MB<br>
</p>
      <button type="submit" name="updatecampimages" class="btn btn-danger" value="submit" >
            Insert <i class="fas fa-mail-forward"></i>
        </button>
    <div class="col-lg-12 pb-30" style="text-align: center;">
 </div>
</form> -->
 </div>
  
  <?php } else { ?>
 <div class="card-block" style="background: #dff9df;">
        <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
 Add Campaign Details:</h4>                           
<form action="action-controller.php" class="form-inline" method="post" enctype="multipart/form-data" >
<input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>

<div  style="padding: 5px;">
<label>Start Date: </label>
<input name="ca_date"  value="<?php echo date('Y-m-d'); ?>"   type="date" class="form-control" required>
<label>End Date: </label>
<input name="camp_enddate"  value=""   type="date" class="form-control" >
</div><div  style="padding: 5px;">
<label> Campaign Title: </label>
<textarea name="ca_type"  maxlength="150" placeholder="Title"  class="form-control" required>
</textarea>
</div>
<div  style="padding: 5px;">
<label> Select Organizer: </label>
<select name="org_id" class="form-control" required >
<option value="">Select Organizer</option>
<?php  $qv="SELECT * FROM organizers ORDER BY org_name";
$query=mysqli_query($conn,$qv);
while ($resv=mysqli_fetch_array($query)) {  ?>
<option value="<?php echo $resv['org_id']; ?>"><?php echo $resv['org_name']; ?></option>
 <?php  } ?>
</select>

</div>
<div  style="padding: 5px;">
<label> Target Amount: </label>
<input name="camp_target_amount"  value=""  placeholder="eg 500000" required type="text" class="form-control" >
<label> Raised Amount: </label>
<input name="camp_current_amount"  value=""  placeholder="eg 100000" required type="text" class="form-control" >
</div>

<div  style="padding: 5px;">
<label>Tax Benifits: </label>
<select name="camp_taxbenifits" class="form-control" style="width: 100%;" required >
<option value="2"> Yes </option>
<option value="1"> No </option>
</select>
</div>



<div  style="padding: 5px;">
<br><button name="addnewcamp" type="submit" class="btn btn-success" > Add Campaign</button>
</div></form>
 </div>
 <?php } ?>
 
 
 
  
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
        $('#summernote1').html(WorkdonsContent);
    });
</script>


	<!-- Global site tag (gtag.js) - Google Analytics -->

</body>
</html>
