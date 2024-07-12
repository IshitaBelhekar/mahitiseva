<?php include('session.php');   include('aconnection.php'); include_once 'functions.php';
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
                                                        <a href="events-list.php"> Events List</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Add Event</a>
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
                                          
                  
             
  <?php if(isset($_GET['e_id'])){  
      $e_id=$_GET['e_id'];
      $qo="SELECT * FROM event_details as c INNER JOIN events_categories as b ON c.eca_id=b.eca_id
WHERE e_id='$e_id'";
      $queryh=mysqli_query($conf,$qo);
$resc=mysqli_fetch_array($queryh);      
           ?>
   <div class="card-block" style="background: antiquewhite;">
     <div class="row">    
     <div class="col-lg-6">
           <h4 class="sub-title" style="color: chocolate; font-size: 20px;">
 Update Event Details:</h4>    </div>  <!--  <div class="col-lg-6" style="text-align: right;">
 <a href="case_payments.php?e_id=<?php echo $e_id; ?>" class="btn btn-success">Invoices</a>  
     </div>--> </div>
                         
<form action="action-controller.php" class="form-inline" method="post">
<input name="e_id" type="hidden" value="<?php echo $e_id; ?>" readonly class="form-control" required>
<input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>

<div  style="padding: 5px;">
<label> Event No: </label>
<input  value="<?php echo "MYSP/EV/".date('Y')."/".$e_id; ?>" readonly  type="text" class="form-control" required>
</div>

<div  style="padding: 5px;">
<label> Date: </label>
<input name="ca_date" readonly value="<?php echo $resc['e_date']; ?>"   type="text" class="form-control" required>
<label>Time: </label>
<input name="e_time"   value="<?php echo $resc['e_time']; ?>"  type="time" class="form-control" >

</div><div  style="padding: 5px;">
<label> Event Title: </label>
<textarea name="ca_type"  maxlength="150"  placeholder="Upcomming Event Title"  class="form-control" required>
<?php echo $resc['e_title']; ?></textarea>
</div><div  style="padding: 5px;">
<label>Event Status: </label>
<select name="e_status" class="form-control" style="width: 100%;" required >
<?php if($resc['e_status']==2){ ?> <option value="2"> Inactive </option> 
 <?php } else{ ?> <option value="1">Active</option> <?php } ?>
<option value="2"> Inactive </option>
<option value="1"> Active </option>
</select>
<label> Slug: </label>
<input  maxlength="180" value="<?php echo $resc['e_slug']; ?>" readonly type="text" class="form-control" >

</div><div  style="padding: 5px;">
<label> Select Category: </label>
<select name="eca_id" class="form-control" required >
<option value="<?php echo $resc['eca_id']; ?>"><?php echo $resc['eca_title']; ?></option>
<?php  $q="SELECT * FROM events_categories ORDER BY eca_title";
$query=mysqli_query($con,$q);
while ($res=mysqli_fetch_array($query)) {  ?>
<option value="<?php echo $res['eca_id']; ?>"><?php echo $res['eca_title']; ?></option>
 <?php  } ?>
</select>
<label>Venu: </label>
<input name="ca_bbr_addres"  maxlength="180"  value="<?php echo $resc['e_venu']; ?>" type="text" class="form-control" required>

</div>


<div  style="padding: 5px;">
<br><button name="updatenewevent" type="submit" class="btn btn-success" > Update </button>
</div></form>


<form action="action-controller.php" class="form-inline" method="post">
    <input name="e_id" type="hidden" value="<?php echo $e_id; ?>" readonly class="form-control" required>
    <input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>
    <div style="padding: 5px;">
        <label>Description:<b style="color: black;">(Please Open Code View before update)</b> </label>
        <div id="summernote1"><?php echo $resc['e_content']; ?></div>
          </div>


<script>
    // Assume you have fetched HTML data from the PHP script and stored it in a variable named 'htmlData'
    var htmlData = '<?php echo addslashes($resc['e_content']); ?>';

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
<br><button name="updateneweventdescription" type="submit" class="btn btn-success" > Update </button>
</div></form>
 </div>
  
  <?php } else { ?>
 <div class="card-block" style="background: #dff9df;">
        <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
 Add Event Details:</h4>                           
<form action="action-controller.php" class="form-inline" method="post" enctype="multipart/form-data" >
<input name="ass_u_id" type="hidden" value="<?php echo $u_id; ?>" readonly class="form-control" required>

<div  style="padding: 5px;">
<label> Date: </label>
<input name="ca_date"  value="<?php echo date('Y-m-d'); ?>"   type="date" class="form-control" required>
<label> Time: </label>
<input name="e_time"  value=""   type="time" class="form-control" required>
</div><div  style="padding: 5px;">
<label> Event Title: </label>
<textarea name="ca_type"  maxlength="150" placeholder="Upcomming Event Title"  class="form-control" required>
</textarea>
</div><div  style="padding: 5px;">
<label> Select Category: </label>
<select name="b_id" class="form-control" required >
<option value="">Select Category</option>
<?php  $qv="SELECT * FROM events_categories ORDER BY eca_title";
$query=mysqli_query($conn,$qv);
while ($resv=mysqli_fetch_array($query)) {  ?>
<option value="<?php echo $resv['eca_id']; ?>"><?php echo $resv['eca_title']; ?></option>
 <?php  } ?>
</select>
<label>Venu: </label>
<input name="ca_bbr_addres"  maxlength="180"  type="text" class="form-control" required>
</div>




<div  style="padding: 5px;">
<br><button name="addnewevent" type="submit" class="btn btn-success" > Add Event</button>
</div></form>
 </div>
 <?php } ?>
 
 
 
  
</div>
 <?php if(isset($_GET['e_id'])){  ?>
 
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
    <input type="hidden" name="e_id" value="<?php echo $e_id; ?>" readonly required>
    <input type="file" id="myFile" name="images[]" multiple required class="btn theme-btn-3 mb-10">
      <p>
*Files: png, jpg, jpeg, zip. Max 4MB<br>
</p>
      <button type="submit" name="updateeventimages" class="btn btn-danger" value="submit" >
            Insert <i class="fas fa-mail-forward"></i>
        </button>
    <div class="col-lg-12 pb-30" style="text-align: center;">
     
    </div>
</form>

     <div id="imageContainer" style="margin-top: 10px;">
  <?php $query = "SELECT * FROM event_images WHERE e_id='$e_id' ";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="image-thumbnail">
 <a href="<?php echo "event-documents/".$row['eimg_url']; ?>" target="_blank"> 
 <img style="max-width: 80px;" src="<?php echo "../event-documents/".$row['eimg_url']; ?>" title="<?php echo $row['eimg_url']; ?>" alt="Image">
  </a>
    <a class="delete-button" href="delete-controller.php?e_id=<?php echo $e_id; ?>&eimg_id=<?php echo $row['eimg_id']; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
  </div>
    <?php 
} ?>
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
    <input type="hidden" name="e_id" value="<?php echo $e_id; ?>" readonly required>
    <input type="text" name="video" required class="form-control" placeholder="Youtube Video Link Only"  style="max-width: 350px;">
  <button type="submit" name="addeventvideo" class="btn btn-danger" value="submit" >
            Insert <i class="fas fa-mail-forward"></i>
        </button>
    <div class="col-lg-12 pb-30" style="text-align: center;">
     
    </div>
</form>

     <div id="imageContainer" style="margin-top: 10px;">
  <?php $query = "SELECT * FROM event_videos WHERE e_id='$e_id'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {    
    
    $youtubeUrl = $row['eimg_url'];
    $embeddedLink = embedYouTubeVideo($youtubeUrl);
    
    if ($embeddedLink) {
        
 echo '<iframe width="100%" height="400" src="' . $embeddedLink . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    
?><div style="text-align: center;">
<a class="delete-button" href="delete-controller.php?e_id=<?php echo $e_id; ?>&evid_id=<?php echo $row['evid_id']; ?>" onclick="return confirm('Are you sure you want to delete?');" style="margin: 20px 15px; max-width: 100px;">Delete</a>
</div>
<?php 
    } else {
  
    }
    
   
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
        $('#summernote1').html(eventContent);
    });
</script>


	<!-- Global site tag (gtag.js) - Google Analytics -->

</body>
</html>
