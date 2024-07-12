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




if(isset($_POST['addvolunteers'])){
    $v_name=$_POST['v_name'];  $v_contactv_contact=$_POST['v_contact']; $v_email=$_POST['v_email'];$v_address=$_POST['v_address'];
    $v_dob=$_POST['v_dob'];$v_education=$_POST['v_education'];
    
    
    $q="INSERT INTO volunteer_details(v_name,v_contact,v_date,v_email,v_address,v_dob,v_education)
 Values('$v_name','$v_contactv_contact','$cdate','$v_email','$v_address','$v_dob','$v_education')" ;
    
    if ($con->query($q) === TRUE) {
        $e_id=$con->insert_id;
        $con->close();
        
        header("location:volunteer.php?msg=Applied Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}

                
                
                if(isset($_POST['addcontact'])){
                    $v_name=$_POST['con_name'];  $v_contactv_contact=$_POST['con_contact']; $v_email=$_POST['con_email'];$v_address=$_POST['con_message'];
                    
                    
                    
                    $q="INSERT INTO contact_details(con_name,con_contact,con_date,con_email,con_message)
 Values('$v_name','$v_contactv_contact','$cdate','$v_email','$v_address')" ;
                    
                    if ($con->query($q) === TRUE) {
                        $e_id=$con->insert_id;
                        $con->close();
                        
                        header("location:contact.php?msg=Submitted Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
                    }
                }
        
?>