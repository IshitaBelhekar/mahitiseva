<?php include('aconnection.php');


if(isset($_GET['cimg_id'])){
    $cimg_id=$_GET['cimg_id'];  $camp_id=$_GET['camp_id'];
    $qt="DELETE FROM campaign_images WHERE cimg_id='$cimg_id'";
    if($conn->query($qt) === TRUE) {
        $conn -> close();
        header("location:campaign-details.php?camp_id=$camp_id&ferror=Deleted Successfully!#third");
    }else {$con -> close();
    header("location:campaign-details.php?camp_id=$camp_id&ferror=Can't Delete it!#third");
    }
    
}

if(isset($_GET['cavid_id'])){
    $cdoc_id=$_GET['cavid_id'];  $ca_id=$_GET['camp_id'];
    $qt="DELETE FROM campaign_videos WHERE cavid_id='$cdoc_id'";
    if($conn->query($qt) === TRUE) {
        $conn -> close();
        header("location:campaign-details.php?camp_id=$ca_id&ferror2=Deleted Successfully!#four");
    }else {$con -> close();
    header("location:campaign-details.php?camp_id=$ca_id&ferror2=Can't Delete it!#four");
    }
    
}

if(isset($_GET['cdoc_id2'])){
    $cdoc_id=$_GET['cdoc_id2'];  $ca_id=$_GET['camp_id'];
    $qt="DELETE FROM case_documents WHERE cdoc_id='$cdoc_id'";
    if($conn->query($qt) === TRUE) {
        $conn -> close();
        header("location:add_new_case.php?ca_id=$ca_id&ferror2=Deleted Successfully!#four");
    }else {$con -> close();
    header("location:add_new_case.php?ca_id=$ca_id&ferror2=Can't Delete it!#four");
    }
    
}


if(isset($_GET['eimg_id'])){
    $eimg_id=$_GET['eimg_id'];  $e_id=$_GET['e_id'];
    $qt="DELETE FROM event_images WHERE eimg_id='$eimg_id'";
    if($conn->query($qt) === TRUE) {
        $conn -> close();
        header("location:event_details.php?e_id=$e_id&ferror=Deleted Successfully!#third");
    }else {$con -> close();
    header("location:event_details.php?e_id=$e_id&ferror=Can't Delete it!#third");
    }
    
}

if(isset($_GET['evid_id'])){
    $evid_id=$_GET['evid_id'];  $e_id=$_GET['e_id'];
    $qt="DELETE FROM event_videos WHERE evid_id='$evid_id'";
    if($conn->query($qt) === TRUE) {
        $conn -> close();
        header("location:event_details.php?e_id=$e_id&ferror2=Deleted Successfully!#four");
    }else {$con -> close();
    header("location:event_details.php?e_id=$e_id&ferror2=Can't Delete it!#four");
    }
    
}


if(isset($_GET['bimg_id'])){
    $bimg_id=$_GET['bimg_id'];  $blog_id=$_GET['blog_id'];
    $qt="DELETE FROM blog_images WHERE bimg_id='$bimg_id'";
    if($conn->query($qt) === TRUE) {
        $conn -> close();
        header("location:blog_details.php?blog_id=$blog_id&ferror=Deleted Successfully!#third");
    }else {$con -> close();
    header("location:blog_details.php?blog_id=$blog_id&ferror=Can't Delete it!#third");
    }
    
}












?>