<?php include('session.php');   include('aconnection.php');
include('functions.php');

    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $firmname; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.	0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
      <!-- Favicon icon -->
    <link rel="icon" href="files/assets/images/fav.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
        <style type="text/css">
    
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
         background: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
            display: flex;
        }
        #popup {
            background: #fff;
            max-width: 450px;
            width: 100%;
            padding: 20px;
            text-align: center;
            position: relative;
        }
     
    </style>
</head>

<body>


    <?php include 'sidebar.php';
    if($_SESSION['u_role']=="Executive") {
        $old=0; $new=0;
        $qr="SELECT * FROM case_details WHERE ca_exec_uid='$session_u_id' ";
        $que=mysqli_query($conn,$qr);
        while ($rer=mysqli_fetch_array($que)) {
            echo $rer['ca_status'];
            if($rer['ca_status']!=3){
                $new=$new+1;
            }else{
                $old=$old+1;
                
            }
            
            
        }

        ?>
        
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                 
                                        
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-green update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-12">
                                                                <h4 class="text-white">New Case List</h4>
                                                                
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
   <div class="card-footer">
 

<a href="executive-case-list.php" class="text-white m-b-0" style="font-size: 22px;">   Total: <b> <?php echo $new; ?> </b></a>

 <hr>
      </div>
                                                </div>
                                            </div>
                                          
          
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php 
}
else if($_SESSION['u_role']=="Manager") {
    $old=0; $new=0;
    $qr="SELECT * FROM case_details";
    $que=mysqli_query($conn,$qr);
    while ($rer=mysqli_fetch_array($que)) {
        echo $rer['ca_status'];
        if($rer['ca_status']!=3){
            $new=$new+1;
        }else{
            $old=$old+1;
            
        }
        
        
    }
    
    ?>
        
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                 
                                        
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-green update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-12">
                                                                <h4 class="text-white">New Case List</h4>
                                                                
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
 

<a href="case-list.php" class="text-white m-b-0" style="font-size: 22px;">   Total: <b> <?php echo $new; ?> </b></a>

 <hr>
      </div>
                                                </div>
                                            </div>
                                          
          
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php 
}
else if($_SESSION['u_role']=="Admin") { 
     $old=0; $new=0;
     $qr="SELECT * FROM campaign_details";
$que=mysqli_query($conn,$qr);
while ($rer=mysqli_fetch_array($que)) { 
    echo $rer['camp_status'];
    if($rer['camp_status']==1){        
        $new=$new+1;
    }else if($rer['camp_status']==3){
        $old=$old+1;
        
    }
   
   
    }
 ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                 
                                        
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-yellow update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-12">
                                                                <h4 class="text-white">Active Campaigns</h4>
                                                                
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
 

<a href="campaigns-list.php" class="text-white m-b-0" style="font-size: 22px;">   Total: <b> <?php echo $new; ?> </b></a>

 <hr>
      </div>
                                                </div>
                                            </div>
                                               <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-green update-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-end">
                                                            <div class="col-12">
                                                                <h4 class="text-white">Completed Campaigns</h4>
                                                                
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
 
   <a href="old-case-list.php" class="text-white m-b-0" style="font-size: 22px;"> Total: <b> <?php echo $old; ?> </b></a>
 <hr>
      </div>
      </div>
                                            </div>
          
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><?php } ?>
        </div>
    </div></div>        </div>
    </div></div>
  
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="files/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="files/assets/pages/widget/amchart/serial.js"></script>
    <script src="files/assets/pages/widget/amchart/light.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files/assets/js/SmoothScroll.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
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
    <!-- custom js -->
    <script src="files/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="files/assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
