<?php       include('adminp/aconnection.php');
function generateSlug($title) {
    $slug = str_replace(' ', '-', $title);
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    // Replace spaces with hyphens
    
    
    // Convert to lowercase
    $slug = strtolower($slug);
    
    return $slug;
}
date_default_timezone_set("Asia/Calcutta");
$cdate=date("Y-m-d");
// $backdays = date('Y-m-d',strtotime("-4 days"));
$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$currenttime=date("H");
$timestamp = date('Y-m-d H:i:s');

if(isset($_POST['submitdonation'])){
    $ca_date=$_POST['amount'];  $ass_u_id=$_POST['name']; $ca_type=$_POST['email'];$org_id=$_POST['c'];
    $b_id=$_POST['tel'];
    $dob=$_POST['dob'];
    $slug=$_POST['s'];
    $pin=$_POST['pin'];$org_id=$_POST['c'];
    
    $editorcode=str_replace("'", "&#39;",$_POST['message']);
    $ca_bbr_addres=str_replace("'", "&#39;",$_POST['address']);
    
    $e=1;
    $q="INSERT INTO donars_list(camp_id,do_date,do_name,do_email,do_contactno,do_amount,do_dob,do_address,do_pin,do_message,do_status)
 Values('$org_id','$cdate','$ass_u_id','$ca_type','$b_id','$ca_date','$dob','$ca_bbr_addres','$pin','$editorcode','$e')" ;
    
    if ($con->query($q) === TRUE) {
        $do_id=$con->insert_id;
        $con->close();
        header("location:campaign-payments.php?c=$org_id&s=$slug&do=$do_id&msg=Account generated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}


?>
