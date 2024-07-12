<?php include('session.php');   include('aconnection.php'); include_once 'functions.php';
/* $url1=$_SERVER['REQUEST_URI'];
header("Refresh: 300; URL=$url1"); */
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
    
    <style type="text/css">
    td a img{
    margin-bottom: 5px;
    }
    
     .table td,.table th {
        white-space: normal;
    }
    
    </style>
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
                                                    <li class="breadcrumb-item"><a href="#!">Case List</a>
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
                                          
                                            <div class="card">
                              <div class="row">
                               
          <div class="col-lg-12 col-md-12 col-sm-12">     
                                     <div class="card-block">         
                                   
 
   <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
                                     <?php $qe=null; $t=3; $cdate=date('Y-m-d');
                                     
                                     $grfees=$grpayed=$grremain=0.00;
                           
                                         ?>
                                     
 </h4>                          
 <div class="card-block">   
 <h3 style="text-align: right;">
 <a href="blog_details.php" class="btn btn-danger">Add New Blog</a></h3>      
  <h4 class="sub-title" style="color: chocolate;font-size: 20px;">
Blog List:</h4>       


                   
<div style="width: 100%;overflow: scroll;">
        <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="overflow: scroll;">
                                          
                  <thead >
                  
                                                            <tr>
                       <th >No</th>
                   <th >Date Time</th>
                      <th >Status</th>
           <th >Category</th>
                   <th >Title</th>
                  
 					
       		
                                                                 
          </thead>
   <tbody >  
            <?php
            $qo = "SELECT * FROM blog_details as c
       INNER JOIN blog_categories as b ON c.bca_id=b.bca_id
      ORDER BY c.blog_date DESC";
            
            
            $queryh = mysqli_query($conf, $qo);
            
            while ($res = mysqli_fetch_array($queryh)) {
                $blog_id=$res['blog_id'];
                $blog_slug=$res['blog_slug'];
       ?><tr>
            <td>
            <?php echo "MASS/".date('Y')."/".$blog_id; ?></td>
             <td><?php echo convertdate($res['blog_date'])."<br> " ; ?></td>
         <td>  <?php if($res['blog_status']==2){ ?> <button class="btn btn-danger">Inactive</button>
 <?php } else if($res['blog_status']==1){ ?>  <button class="btn btn-success">Active</button> <?php } ?>
</td>
  <td><?php echo $res['bca_title']; ?></td>
             <td><?php echo $res['blog_title']; ?></td>
             
              
                <td><a href="blog_details.php?blog_id=<?php echo $blog_id; ?>" target="_blank" style="font-weight: 700;color: chocolate;">
                <button>Edit</button></a>
                <a href="../blog-details.php?blog_id=<?php echo $blog_id; ?>&s=<?php echo $blog_slug; ?>" target="_blank" style="font-weight: 700;color: chocolate;">
                <button>View</button></a>
                </td>
                
             
             
             
          
       </tr><?php } ?>
     </tbody>     
     </table>         
    </div>

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
      <script>
    function formatText(tag) {
      var textarea = document.getElementById('blog-description');
      var start = textarea.selectionStart;
      var end = textarea.selectionEnd;
      var selectedText = textarea.value.substring(start, end);
      var replacement = '<' + tag + '>' + selectedText + '</' + tag + '>';
      textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    }
  </script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

</body>
</html>
