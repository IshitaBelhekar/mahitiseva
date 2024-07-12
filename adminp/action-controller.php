<?php       include('aconnection.php');
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



if(isset($_POST['addnewcamp'])){
    $ca_date=$_POST['ca_date'];  $ass_u_id=$_POST['ass_u_id']; $ca_type=$_POST['ca_type'];$org_id=$_POST['org_id'];
    $b_id=$_POST['camp_target_amount'];$ca_bbr_code=$_POST['camp_current_amount'];$ca_bbr_addres=$_POST['camp_enddate'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    
    $q="INSERT INTO campaign_details(org_id,camp_startdate,u_id,camp_title,camp_target_amount,camp_current_amount,comp_slug,camp_enddate,camp_content)
 Values('$org_id','$ca_date','$ass_u_id','$ca_type','$b_id','$ca_bbr_code','$slug','$ca_bbr_addres','$editorcode')" ;
    
    if ($con->query($q) === TRUE) {
        $e_id=$con->insert_id;
        
        $con->close();
        
        header("location:campaign-details.php?camp_id=$e_id&msg=Added Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}

if(isset($_POST['updatenewcamp'])){
    $camp_id=$_POST['camp_id'];  $e_status=$_POST['w_status'];$org_id=$_POST['org_id'];
    $ca_date=$_POST['ca_date'];  $ass_u_id=$_POST['ass_u_id']; $ca_type=$_POST['ca_type'];
    $b_id=$_POST['camp_target_amount'];$ca_bbr_code=$_POST['camp_current_amount'];$ca_bbr_addres=$_POST['camp_enddate'];
    $camp_taxbenifits=$_POST['camp_taxbenifits'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    
    $q="UPDATE campaign_details SET org_id='$org_id',camp_startdate='$ca_date',u_id='$ass_u_id',camp_title='$ca_type',camp_target_amount='$b_id',
camp_current_amount='$ca_bbr_code',comp_slug='$slug',camp_enddate='$ca_bbr_addres',camp_content='$editorcode',camp_status='$e_status',camp_taxbenifits='$camp_taxbenifits' WHERE camp_id='$camp_id'" ;
    
    if ($con->query($q) === TRUE) {
        
        
        $con->close();
        
        header("location:campaign-details.php?camp_id=$camp_id&msg=Updated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}

if(isset($_POST['updatenewcampdescription'])){
    $camp_id=$_POST['camp_id'];
    $ass_u_id=$_POST['ass_u_id'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    if(strlen($editorcode)>10){
        
        $q="UPDATE campaign_details SET camp_content='$editorcode' WHERE camp_id='$camp_id'" ;
        
        if ($con->query($q) === TRUE) {
            
            
            $con->close();
            
            header("location:campaign-details.php?camp_id=$camp_id&msg=Updated Successfully!");
        }else {
            
            echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
        } } else{
            header("location:campaign-details.php?camp_id=$camp_id&error=Not Updated!");
        }
}


if(isset($_POST['updateneweventdescription'])){
    $e_id=$_POST['e_id'];
    $ass_u_id=$_POST['ass_u_id'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    if(strlen($editorcode)>10){
        
        $q="UPDATE event_details SET e_content='$editorcode' WHERE e_id='$e_id'" ;
        
        if ($con->query($q) === TRUE) {
            
            
            $con->close();
            
            header("location:event_details.php?e_id=$e_id&msg=Updated Successfully!");
        }else {
            
            echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
        } } else{
            header("location:event_details.php?e_id=$e_id&error=Not Updated!");
        }
}

if(isset($_POST['updatenewblogdescription'])){
    $blog_id=$_POST['blog_id'];
    $ass_u_id=$_POST['ass_u_id'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    if(strlen($editorcode)>10){
        
        $q="UPDATE blog_details SET blog_content='$editorcode' WHERE  blog_id='$blog_id'" ;
        
        if ($con->query($q) === TRUE) {
            
            
            $con->close();
            
            header("location: blog_details.php?blog_id=$blog_id&msg=Updated Successfully!");
        }else {
            
            echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
        } } else{
            header("location: blog_details.php?blog_id=$blog_id&error=Not Updated!");
        }
}


if(isset($_POST['addvideolink'])){
    $camp_id=$_POST['camp_id'];  $video=$_POST['video'];
    $u_id=$_POST['u_id'];
    
    $q="INSERT INTO campaign_videos(camp_id,u_id,cimg_url)
 Values('$camp_id','$u_id','$video')";
    
    if ($con->query($q) === TRUE) {
        
        $con->close();
        
        header("location:campaign-details.php?camp_id=$camp_id&msg=Added Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}

if(isset($_POST['addeventvideo'])){
    $e_id=$_POST['e_id'];  $video=$_POST['video'];
    $u_id=$_POST['u_id'];
    
    $q="INSERT INTO event_videos(e_id,u_id,eimg_url)
 Values('$e_id','$u_id','$video')";
    
    if ($con->query($q) === TRUE) {
        
        $con->close();
        
        header("location:event_details.php?e_id=$e_id&msg=Added Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}


if(isset($_POST['addnewevent'])){
    $ca_date=$_POST['ca_date'];  $ass_u_id=$_POST['ass_u_id']; $ca_type=$_POST['ca_type'];
    $b_id=$_POST['b_id'];$ca_bbr_code=$_POST['e_time'];$ca_bbr_addres=$_POST['ca_bbr_addres']; 
    $slug = str_replace(' ', '-', $ca_type);    
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);    
    
 $q="INSERT INTO event_details(e_date,u_id,e_title,eca_id,e_timestamp,e_slug,e_venu,e_content)
 Values('$ca_date','$ass_u_id','$ca_type','$b_id','$ca_bbr_code','$slug','$ca_bbr_addres','$editorcode')" ;
    
    if ($con->query($q) === TRUE) {
        $e_id=$con->insert_id;
        
        $con->close();
        
        header("location:event_details.php?e_id=$e_id&msg=Added Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}


if(isset($_POST['updatenewevent'])){
    $e_id=$_POST['e_id'];  $e_status=$_POST['e_status'];
    $ca_date=$_POST['ca_date'];  $ass_u_id=$_POST['ass_u_id']; $ca_type=$_POST['ca_type'];
   $ca_bbr_code=$_POST['e_timestamp'];$ca_bbr_addres=$_POST['ca_bbr_addres'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
 
    
    $q="UPDATE event_details SET e_date='$ca_date',u_id='$ass_u_id',e_title='$ca_type',eca_id='$e_id',
e_time='$ca_bbr_code',e_slug='$slug',e_venu='$ca_bbr_addres',e_status='$e_status' WHERE e_id='$e_id'" ;
    
    if ($con->query($q) === TRUE) { 
        
        $con->close();
      //  echo "here".$e_id;
        
        header("location:event_details.php?e_id=$e_id&msg=Updated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}


if(isset($_POST['addnewblog'])){
    $ca_date=$_POST['ca_date'];  $ass_u_id=$_POST['ass_u_id']; $ca_type=$_POST['ca_type'];
    $b_id=$_POST['bca_id'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    
    $q="INSERT INTO blog_details(blog_date,u_id,blog_title,bca_id,blog_slug,blog_content)
 Values('$ca_date','$ass_u_id','$ca_type','$b_id','$slug','$editorcode')" ;
    
    if ($con->query($q) === TRUE) {
        $blog_id=$con->insert_id;
        
        $con->close();
        
        header("location:blog_details.php?blog_id=$blog_id&msg=Added Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}


if(isset($_POST['updatenewblog'])){
    $blog_id=$_POST['blog_id'];  $blog_status=$_POST['blog_status'];
    $ca_date=$_POST['ca_date'];  $ass_u_id=$_POST['ass_u_id']; $ca_type=$_POST['ca_type'];
    $b_id=$_POST['b_id'];
    $slug = str_replace(' ', '-', $ca_type);
    // Remove special characters except hyphens
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = strtolower($slug);
    $editorcode=str_replace("'", "&#39;",$_POST['editorcode']);
    
    $q="UPDATE blog_details SET blog_date='$ca_date',u_id='$ass_u_id',blog_title='$ca_type',bca_id='$b_id',
blog_slug='$slug',blog_content='$editorcode',blog_status='$blog_status' WHERE blog_id='$blog_id'
" ;
    
    if ($con->query($q) === TRUE) {
        
        
        $con->close();
        
        header("location:blog_details.php?blog_id=$blog_id&msg=Updated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}

if(isset($_GET['verifyvol'])){
    $ec_id=$_GET['v_id']; $verifyvol=$_GET['verifyvol'];
    
    $q="UPDATE volunteer_details SET v_status='$verifyvol' WHERE v_id='$ec_id'";
    
    if ($con->query($q) === TRUE) {
        $con->close();
        
        header("location:volunteer.php?msg=Updated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error;
        $con->close();
    }
}

if(isset($_GET['deletevol'])){
    $ec_id=$_GET['v_id']; $verifyvol=$_GET['deletevol'];
    
    $q="DELETE FROM volunteer_details WHERE v_id='$ec_id'";
    
    if ($con->query($q) === TRUE) {
        $con->close();
        
        header("location:volunteer.php?msg=Deleted Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error;
        $con->close();
    }
}

if(isset($_GET['verifycon'])){
    $ec_id=$_GET['v_id']; $verifyvol=$_GET['verifycon'];
    
    $q="UPDATE contact_details SET con_status='$verifyvol' WHERE con_id='$ec_id'";
    
    if ($con->query($q) === TRUE) {
        $con->close();
        
        header("location:contactus.php?msg=Updated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error;
        $con->close();
    }
}
if(isset($_GET['deletecon'])){
    $ec_id=$_GET['v_id']; $verifyvol=$_GET['deletevol'];
    
    $q="DELETE FROM contact_details WHERE con_id='$ec_id'";
    
    if ($con->query($q) === TRUE) {
        $con->close();
        
        header("location:contactus.php?msg=Deleted Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error;
        $con->close();
    }
}




if(isset($_POST['updatenewcase'])){
    $ca_id=$_POST['ca_id']; 
    $ca_type=$_POST['ca_type'];  $ca_exec_status=$_POST['ca_exec_status'];
    $b_id=$_POST['b_id'];$ca_bbr_code=$_POST['ca_bbr_code'];$ca_bbr_addres=$_POST['ca_bbr_addres']; $ca_bbr_city=$_POST['ca_bbr_city'];
    
    $ca_bbr_mname=$_POST['ca_bbr_mname'];  $ca_bbr_mmno=$_POST['ca_bbr_mmno']; $ca_bbr_email=$_POST['ca_bbr_email'];
    $ca_bbr_refno=$_POST['ca_bbr_refno'];$ca_app_name=$_POST['ca_app_name'];$ca_app_address=$_POST['ca_app_address']; $ca_app_mno=$_POST['ca_app_mno'];
    
    $ca_vagency_name=$_POST['fa_id'];   $ca_exec_uid=$_POST['ca_exec_uid'];
    
    
    $q="UPDATE case_details SET ca_exec_status='$ca_exec_status',ca_type='$ca_type',b_id='$b_id',ca_bbr_code='$ca_bbr_code',ca_bbr_addres='$ca_bbr_addres',
ca_bbr_city='$ca_bbr_city',ca_bbr_mname='$ca_bbr_mname',ca_bbr_mmno='$ca_bbr_mmno',
ca_bbr_email='$ca_bbr_email',ca_bbr_refno='$ca_bbr_refno',ca_app_name='$ca_app_name',ca_app_address='$ca_app_address',
ca_app_mno='$ca_app_mno',fa_id='$ca_vagency_name',ca_exec_uid='$ca_exec_uid' WHERE ca_id='$ca_id'" ;
    
    if ($con->query($q) === TRUE) {
               
        $con->close();
        
        header("location:add_new_case.php?ca_id=$ca_id&msg=Updated Successfully!");
    }else {
        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
    }
}


if(isset($_POST['finalcasesubmitbyexecutive'])){
    $ca_id=$_POST['ca_id'];
    $q="UPDATE case_details SET ca_exec_status=2, ca_exec_datetime='$timestamp'  WHERE ca_id='$ca_id'" ;    
    if ($con->query($q) === TRUE) {        
        $con->close();        
        header("location:executive-case-list.php?msg=Updated Successfully!");
    }else {        
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();    }
}


if(isset($_POST['updatecasebyadmin'])){
    $ca_id=$_POST['ca_id'];  $ca_status=$_POST['ca_status'];$ca_exec_uid=$_POST['ca_exec_uid'];
    $ca_exec_status=$_POST['ca_exec_status'];
    $q="UPDATE case_details SET ca_status='$ca_status', ca_exec_uid='$ca_exec_uid', ca_exec_status='$ca_exec_status' WHERE ca_id='$ca_id'" ;
    if ($con->query($q) === TRUE) {
        $con->close();
        header("location:case_details.php?ca_id=$ca_id&msg=Updated Successfully!");
    }else {
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();    }
}



if(isset($_POST['finalcasesubmitbyadmin'])){
    $ca_id=$_POST['ca_id'];
    $q="UPDATE case_details SET ca_status=3, ca_finalsub_datetime='$timestamp'  WHERE ca_id='$ca_id'" ;
    if ($con->query($q) === TRUE) {
        $con->close();
        header("location:case-list.php?msg=Updated Successfully!");
    }else {
        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();    }
}


if(isset($_POST["updatecampimages"]) ){
    $camp_id=$_POST['camp_id']; $u_id=$_POST['u_id'];
    if (isset($_FILES['images'])) {
        $imageCount = count($_FILES['images']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $imageName = $_FILES['images']['name'][$i];
            $imageTmpName = $_FILES['images']['tmp_name'][$i];
            $imageSize = $_FILES['images']['size'][$i];
            
            $statusMsg = '';
            $backlink=null;
            
            $allowedExtensions = ['png', 'jpg', 'jpeg','webp'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $fileNameWithoutExtension = (pathinfo($imageName, PATHINFO_FILENAME));
            
            
            if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 1 * 1024 * 1024) {
                $targetDir = '../camp-documents/';
                
                $qu="INSERT INTO campaign_images(camp_id) VALUES ('$camp_id')";
                if ($conn->query($qu) === TRUE) {
                    $cdoc_id=$conn->insert_id;
                    $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$camp_id.".".$imageExtension;
                    if(move_uploaded_file($imageTmpName, $targetFilePath)){
                        $ta=2;
                        $cdoc_defaultimg="../camp-documents/photos.png";
                        if($imageExtension=='png' || $imageExtension=='jpg' || $imageExtension=='jpeg' || $imageExtension=='webp'){
                            $cdoc_defaultimg="../camp-documents/photos.png";
                        }else if($imageExtension=='zip' || $imageExtension=='rar'){
                            $cdoc_defaultimg="../camp-documents/zip.png";
                        }
                        $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$camp_id.".".$imageExtension;
                        $q="UPDATE campaign_images SET cimg_url='$targetFilePath',u_id='$u_id',cimg_type='$ta',cimg_defaultimg='$cdoc_defaultimg' WHERE cimg_id='$cdoc_id'" ;
                        
                        if ($con->query($q) === TRUE) {
                            
                            header("location:campaign-details.php?camp_id=$camp_id&fmsg=Uploaded Successfully!#third");
                        }else {
                            header("location:campaign-details.php?camp_id=$camp_id&ferror=File upload failed!#third1");
                        }
                        
                    }else{
                        header("location:campaign-details.php?camp_id=$camp_id&ferror=File upload failed!#third$targetFilePath");
                        
                    }
                }else{
                    header("location:campaign-details.php?camp_id=$camp_id&ferror=File upload failed!#third3");
                    
                }
                
                
            } else{
                header("location:campaign-details.php?camp_id=$camp_id&ferror=File Extensions not allowed!#third5");
                
                
            }
            
            
        }   } else{
            header("location:campaign_details.php?camp_id=$camp_id&ferror=Files Not Fill!#third");
            
            
        } }

if(isset($_POST["updateeventimages"]) ){
    $e_id=$_POST['e_id']; $u_id=$_POST['u_id'];
    if (isset($_FILES['images'])) {
        $imageCount = count($_FILES['images']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $imageName = $_FILES['images']['name'][$i];
            $imageTmpName = $_FILES['images']['tmp_name'][$i];
            $imageSize = $_FILES['images']['size'][$i];
            
            $statusMsg = '';
            $backlink=null;          
            
            $allowedExtensions = ['png', 'jpg', 'jpeg','webp'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
            
            
            if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 1 * 1024 * 1024) {
                $targetDir = '../event-documents/'; 
                               
                $qu="INSERT INTO event_images(e_id) VALUES ('$e_id')";                
                if ($conn->query($qu) === TRUE) {
                    $cdoc_id=$conn->insert_id;
                     $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$eca_id.".".$imageExtension;
                    if(move_uploaded_file($imageTmpName, $targetFilePath)){
                        $ta=2;
                        $cdoc_defaultimg="../event-documents/photos.png";
                        if($imageExtension=='png' || $imageExtension=='jpg' || $imageExtension=='jpeg' || $imageExtension=='webp'){
                            $cdoc_defaultimg="../event-documents/photos.png";
                  }else if($imageExtension=='zip' || $imageExtension=='rar'){
                            $cdoc_defaultimg="../event-documents/zip.png";
                        }                        
                         $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$eca_id.".".$imageExtension;
                        $q="UPDATE event_images SET eimg_url='$targetFilePath',u_id='$u_id',eimg_type='$ta',eimg_defaultimg='$cdoc_defaultimg' WHERE eimg_id='$cdoc_id'" ;
                        
                        if ($con->query($q) === TRUE) {
                            
                            header("location:event_details.php?e_id=$e_id&fmsg=Uploaded Successfully!#third");
                        }else {
                            header("location:event_details.php?e_id=$e_id&ferror=File upload failed!#third1");
                        }
                        
                    }else{
                        header("location:event_details.php?e_id=$e_id&ferror=File upload failed!#third$targetFilePath");
                        
                    }
                }else{
                    header("location:event_details.php?e_id=$e_id&ferror=File upload failed!#third3");
                    
                }
                
                
            } else{
                header("location:event_details.php?e_id=$e_id&ferror=File Extensions not allowed!#third5");
               
                
            }
            
            
        }   } else{
            header("location:event_details.php?e_id=$e_id&ferror=Files Not Fill!#third");
            
            
        } }
        
        
        if(isset($_POST["updateblogimages"]) ){
            $blog_id=$_POST['blog_id']; $u_id=$_POST['u_id'];
            if (isset($_FILES['images'])) {
                $imageCount = count($_FILES['images']['name']);
                for ($i = 0; $i < $imageCount; $i++) {
                    $imageName = $_FILES['images']['name'][$i];
                    $imageTmpName = $_FILES['images']['tmp_name'][$i];
                    $imageSize = $_FILES['images']['size'][$i];
                    
                    $statusMsg = '';
                    $backlink=null;
                    
                    $allowedExtensions = ['png', 'jpg', 'jpeg','webp'];
                    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                    $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                    
                    
                    if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 1 * 1024 * 1024) {
                        $targetDir = '../blog-documents/';
                        
                        $qu="INSERT INTO blog_images(blog_id) VALUES ('$blog_id')";
                        if ($conn->query($qu) === TRUE) {
                            $cdoc_id=$conn->insert_id;
                            $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$blog_id.".".$imageExtension;
                            if(move_uploaded_file($imageTmpName, $targetFilePath)){
                                $ta=2;
                                $cdoc_defaultimg="../blog-documents/photos.png";
                                if($imageExtension=='png' || $imageExtension=='jpg' || $imageExtension=='jpeg' || $imageExtension=='webp'){
                                    $cdoc_defaultimg="../blog-documents/photos.png";
                                }else if($imageExtension=='zip' || $imageExtension=='rar'){
                                    $cdoc_defaultimg="../blog-documents/zip.png";
                                }
                                $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$blog_id.".".$imageExtension;
                                $q="UPDATE blog_images SET bimg_url='$targetFilePath',u_id='$u_id',bimg_type='$ta',bimg_defaultimg='$cdoc_defaultimg' WHERE bimg_id='$cdoc_id'" ;
                                
                                if ($con->query($q) === TRUE) {
                                    
                                    header("location:blog_details.php?blog_id=$blog_id&fmsg=Uploaded Successfully!#third");
                                }else {
                                    header("location:blog_details.php?blog_id=$blog_id&ferror=File upload failed!#third1");
                                }
                                
                            }else{
                                header("location:blog_details.php?blog_id=$blog_id&ferror=File upload failed!#third$targetFilePath");
                                
                            }
                        }else{
                            header("location:blog_details.php?blog_id=$blog_id&ferror=File upload failed!#third3");
                            
                        }
                        
                        
                    } else{
                        header("location:blog_details.php?blog_id=$blog_id&ferror=File Extensions not allowed!#third5");
                        
                        
                    }
                    
                    
                }   } else{
                    header("location:blog_details.php?blog_id=$blog_id&ferror=Files Not Fill!#third");
                    
                    
                } }
        
        if(isset($_POST["updateeventimagescomp"]) ){
            $e_id=$_POST['camp_id']; $u_id=$_POST['u_id'];
            if (isset($_FILES['images'])) {
                $imageCount = count($_FILES['images']['name']);
                for ($i = 0; $i < $imageCount; $i++) {
                    $imageName = $_FILES['images']['name'][$i];
                    $imageTmpName = $_FILES['images']['tmp_name'][$i];
                    $imageSize = $_FILES['images']['size'][$i];
                    
                    $statusMsg = '';
                    $backlink=null;
                    
                    $allowedExtensions = ['png', 'jpg', 'jpeg','zip','webp'];
                    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                    $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                    
                    
                    if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 1 * 1024 * 1024) {
                        $targetDir = '../event-documents/';
                        
                        $qu="INSERT INTO campaign_images(camp_id) VALUES ('$ca_id')";
                        if ($conn->query($qu) === TRUE) {
                            $cdoc_id=$conn->insert_id;
                            $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                            if(move_uploaded_file($imageTmpName, $targetFilePath)){
                                $ta=2;
                                $cdoc_defaultimg="../event-documents/photos.png";
                                if($imageExtension=='png' || $imageExtension=='jpg' || $imageExtension=='jpeg' || $imageExtension=='webp'){
                                    $cdoc_defaultimg="../event-documents/photos.png";
                                }else if($imageExtension=='zip' || $imageExtension=='rar'){
                                    $cdoc_defaultimg="../event-documents/zip.png";
                                }
  $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
$q="UPDATE campaign_images SET wimg_url='$targetFilePath',u_id='$u_id',wimg_type='$ta',wimg_defaultimg='$cdoc_defaultimg' WHERE caimg_id='$cdoc_id'" ;
                                
                                if ($con->query($q) === TRUE) {
                                    
                                    header("location:campaign-details.php?camp_id=$ca_id&fmsg=Uploaded Successfully!#third");
                                }else {
                                    header("location:campaign-details.php?camp_id=$ca_id&ferror=File upload failed!#third1");
                                }
                                
                            }else{
                                header("location:campaign-details.php?camp_id=$ca_id&ferror=File upload failed!#third$targetFilePath");
                                
                            }
                        }else{
                            header("location:campaign-details.php?camp_id=$ca_id&ferror=File upload failed!#third3");
                            
                        }
                        
                        
                    } else{
                        header("location:campaign-details.php?camp_id=$ca_id&ferror=File Extensions not allowed!#third5");
                        
                        
                    }
                    
                    
                }   } else{
                    header("location:campaign-details.php?camp_id=$ca_id&ferror=Files Not Fill!#third");
                    
                    
                } }
                
                
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
        
        
        if(isset($_POST["addexcelbyexecutive"]) ){
            $ca_id=$_POST['ca_id']; $u_id=$_POST['u_id'];
            if (isset($_FILES['images'])) {
                $imageCount = count($_FILES['images']['name']);
                for ($i = 0; $i < $imageCount; $i++) {
                    $imageName = $_FILES['images']['name'][$i];
                    $imageTmpName = $_FILES['images']['tmp_name'][$i];
                    $imageSize = $_FILES['images']['size'][$i];                    
                    $statusMsg = '';
                    $backlink=null;
                    
                    $allowedExtensions = ['xlsx','xls'];
                    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                    $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                    
                    
                    if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 4 * 1024 * 1024) {
                        $targetDir = 'event-documents/';
                        
                        $qu="INSERT INTO case_documents(ca_id) VALUES ('$ca_id')";
                        if ($conn->query($qu) === TRUE) {
                            $cdoc_id=$conn->insert_id;
                             $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                            if(move_uploaded_file($imageTmpName, $targetFilePath)){
                                $ta=3;
                                $cdoc_defaultimg="event-documents/xls.png";
                                
                                 $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                                $q="UPDATE case_documents SET cdoc_imageUrl='$targetFilePath',u_id='$u_id',cdoc_type='$ta',cdoc_defaultimg='$cdoc_defaultimg' WHERE cdoc_id='$cdoc_id'" ;
                                
                                if ($con->query($q) === TRUE) {
                                    
                                    header("location:executive-case-list.php?msg=Uploaded Successfully!");
                                }else {
                                    header("location:executive-case-list.php?error=File upload failed!");
                                }
                            }else{
                                header("location:executive-case-list.php?error=File upload failed!");
                           }
                        }else{
                            header("location:executive-case-list.php?error=File upload failed!");
                       }
                     } else{
                        header("location:executive-case-list.php?error=File Extensions not allowed!");
                   }
                }   } else{
                    header("location:executive-case-list.php?error=Files Not Fill!");
               } }
                
               if(isset($_POST["addpdfbyexecutive"]) ){
                   $ca_id=$_POST['ca_id']; $u_id=$_POST['u_id'];
                   if (isset($_FILES['images'])) {
                       $imageCount = count($_FILES['images']['name']);
                       for ($i = 0; $i < $imageCount; $i++) {
                           $imageName = $_FILES['images']['name'][$i];
                           $imageTmpName = $_FILES['images']['tmp_name'][$i];
                           $imageSize = $_FILES['images']['size'][$i];                           
                           $statusMsg = '';
                           $backlink=null;
                           
                           $allowedExtensions = ['pdf'];
                           $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                           $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                           
                           
                           if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 4 * 1024 * 1024) {
                               $targetDir = 'event-documents/';
                               
                               $qu="INSERT INTO case_documents(ca_id) VALUES ('$ca_id')";
                               if ($conn->query($qu) === TRUE) {
                                   $cdoc_id=$conn->insert_id;
                                    $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                                   if(move_uploaded_file($imageTmpName, $targetFilePath)){
                                       $ta=4;
                                       $cdoc_defaultimg="event-documents/pdf.png";
                                       
                                        $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                                       $q="UPDATE case_documents SET cdoc_imageUrl='$targetFilePath',u_id='$u_id',cdoc_type='$ta',cdoc_defaultimg='$cdoc_defaultimg' WHERE cdoc_id='$cdoc_id'" ;
                                       
                                       if ($con->query($q) === TRUE) {
                                           
                                           header("location:executive-case-list.php?msg=Uploaded Successfully!");
                                       }else {
                                           header("location:executive-case-list.php?error=File upload failed!");
                                       }
                                   }else{
                                       header("location:executive-case-list.php?error=File upload failed!");
                                   }
                               }else{
                                   header("location:executive-case-list.php?error=File upload failed!");
                               }
                           } else{
                               header("location:executive-case-list.php?error=File Extensions not allowed!");
                           }
                       }   } else{
                           header("location:executive-case-list.php?error=Files Not Fill!");
                       } }
                       
                       if(isset($_POST["addpdfbymanager"]) ){
                           $ca_id=$_POST['ca_id']; $u_id=$_POST['u_id'];
                           if (isset($_FILES['images'])) {
                               $imageCount = count($_FILES['images']['name']);
                               for ($i = 0; $i < $imageCount; $i++) {
                                   $imageName = $_FILES['images']['name'][$i];
                                   $imageTmpName = $_FILES['images']['tmp_name'][$i];
                                   $imageSize = $_FILES['images']['size'][$i];
                                   $statusMsg = '';
                                   $backlink=null;                                   
                                   $allowedExtensions = ['pdf'];
                                   
                                   $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                                   $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                                   
                                   
                                   if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 4 * 1024 * 1024) {
                                       $targetDir = 'event-documents/';
                                       
                                       $qu="INSERT INTO case_documents(ca_id) VALUES ('$ca_id')";
                                       if ($conn->query($qu) === TRUE) {
                                           $cdoc_id=$conn->insert_id;
                                            $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                                           if(move_uploaded_file($imageTmpName, $targetFilePath)){
                                               $ta=5;
                                               $cdoc_defaultimg="event-documents/pdf.png";
                                               
                                                $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                                               $q="UPDATE case_documents SET cdoc_imageUrl='$targetFilePath',u_id='$u_id',cdoc_type='$ta',cdoc_defaultimg='$cdoc_defaultimg' WHERE cdoc_id='$cdoc_id'" ;
                                               
                                               if ($con->query($q) === TRUE) {
                                                   
                                                   header("location:case-list.php?msg=Uploaded Successfully!");
                                               }else {
                                                   header("location:case-list.php?error=File upload failed!");
                                               }
                                           }else{
                                               header("location:case-list.php?error=File upload failed!");
                                           }
                                       }else{
                                           header("location:case-list.php?error=File upload failed!");
                                       }
                                   } else{
                                       header("location:case-list.php?error=File Extensions not allowed!");
                                   }
                               }   } else{
                                   header("location:case-list.php?error=Files Not Fill!");
                               } }
                               
        
        if(isset($_POST["updatecasedocuments"]) ){
            $ca_id=$_POST['ca_id'];  $u_id=$_POST['u_id'];
            if (isset($_FILES['images'])) {
                $imageCount = count($_FILES['images']['name']);
                for ($i = 0; $i < $imageCount; $i++) {
                    $imageName = $_FILES['images']['name'][$i];
                    $imageTmpName = $_FILES['images']['tmp_name'][$i];
                    $imageSize = $_FILES['images']['size'][$i];
                    
                    $statusMsg = '';
                    $backlink=null;
                    
                    
                    $allowedExtensions = ['pdf', 'docx', 'xlsx','xls','zip','rar'];
                    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                    $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                    
                    if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 4 * 1024 * 1024) {
                        $targetDir = 'event-documents/';
                      
                        $qu="INSERT INTO case_documents(ca_id) VALUES ('$ca_id')";
                        
                        if ($conn->query($qu) === TRUE) {
                            $cdoc_id=$conn->insert_id;
                             $targetFilePath = $targetDir.$fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                            if(move_uploaded_file($imageTmpName, $targetFilePath)){
                                $ta=1;
                                $cdoc_defaultimg="event-documents/docx.png";      
                                if($imageExtension=='docx'){
                                    $cdoc_defaultimg="event-documents/docx.png";                                    
                                }else if($imageExtension=='pdf'){
                                    $cdoc_defaultimg="event-documents/pdf.png";
                                }else if($imageExtension=='xlsx' || $imageExtension=='xls'){
                                    $cdoc_defaultimg="event-documents/xls.png";
                                }else if($imageExtension=='zip' || $imageExtension=='rar'){
                                    $cdoc_defaultimg="event-documents/zip.png";
                                }
                                
                                $targetFilePath = $fileNameWithoutExtension."_".$cdoc_id."_MYSP-".date('Y-m')."-".$ca_id.".".$imageExtension;
                                $q="UPDATE case_documents SET cdoc_imageUrl='$targetFilePath',u_id='$u_id',cdoc_type='$ta',cdoc_defaultimg='$cdoc_defaultimg' WHERE cdoc_id='$cdoc_id'" ;
                                
                                if ($con->query($q) === TRUE) {
                                    
                                    header("location:add_new_case.php?ca_id=$ca_id&fmsg2=Uploaded Successfully!#four");
                                }else {
                                    header("location:add_new_case.php?ca_id=$ca_id&ferror2=File upload failed!#four");
                                }
                                
                            }else{
                                header("location:add_new_case.php?ca_id=$ca_id&ferror2=File upload failed!#four");
                                
                            }
                        }else{
                            header("location:add_new_case.php?ca_id=$ca_id&ferror2=File upload failed!#four");
                            
                        }
                        
                        
                    } else{
                        header("location:add_new_case.php?ca_id=$ca_id&ferror2=File Extensions not allowed!#four");
                        
                        
                    }
                    
                    
                }   } else{
                    header("location:add_new_case.php?ca_id=$ca_id&ferror2=Files Not Fill!#four");
                    
                    
                } }
                
                
                
                
                
                
                
                if(isset($_POST['addcaseinvoice'])){ $amt=4425; $t=1;
                    $ca_date=$_POST['ca_inv_date'];  $ass_u_id=$_POST['u_id']; $ca_id=$_POST['ca_id'];
                    $q="INSERT INTO case_invoice(ca_inv_date,ca_inv_u_id,ca_id,ca_invpro_qty,ca_invpro_amount,ca_inv_datetime)
 Values('$ca_date','$ass_u_id','$ca_id','$t','$amt','$timestamp')" ;                    
                    if ($con->query($q) === TRUE) {
                        $ca_inv_id=$con->insert_id;                        
                        $con->close();                        
                        header("location:case_payments.php?ca_id=$ca_id&ca_inv_id=$ca_inv_id&msg=Added Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
                    }
                }
      
                
                if(isset($_POST['updatecaseinvoice'])){
                    $ca_id=$_POST['ca_id'];
                    $ca_inv_id=$_POST['ca_inv_id'];            $ca_gstno=$_POST['ca_gstno'];
                    $ca_invpro_desc=$_POST['ca_invpro_desc'];$ca_invpro_qty=$_POST['ca_invpro_qty'];$ca_invpro_amount=$_POST['ca_invpro_amount']; 
                    $ca_date=$_POST['ca_inv_date'];
                    
$q="UPDATE case_invoice SET ca_gstno='$ca_gstno',ca_invpro_qty='$ca_invpro_qty',ca_invpro_desc='$ca_invpro_desc',ca_invpro_amount='$ca_invpro_amount',
ca_inv_date='$ca_date' WHERE ca_inv_id='$ca_inv_id'" ;
                    
                    if ($con->query($q) === TRUE) {                        
                        $con->close();                        
                        header("location:case_payments.php?ca_id=$ca_id&msg=Updated Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
                    }
                }
                
                
                if(isset($_POST['addcasepayment'])){
                    $ca_id=$_POST['ca_id'];
                    $ca_inv_id=$_POST['ca_inv_id'];
                    $ca_invpro_desc=$_POST['ca_payremark'];
                    $olca_payremark=$_POST['olca_payremark'];
                   $ca_invpro_amount=$_POST['ca_payamount'];
                    $ca_date=$_POST['ca_date'];
                    $u_name=$_POST['u_name'];
                    
                    $ca_invpro_desc=$olca_payremark." ".$ca_date.": Rs.".$ca_invpro_amount." by ".$u_name." - ".$ca_invpro_desc."<br>";
                    
                    
                    $q="UPDATE case_invoice SET ca_payamount=ca_payamount+'$ca_invpro_amount',ca_payremark='$ca_invpro_desc',
ca_paytimestamp='$timestamp' WHERE ca_inv_id='$ca_inv_id'";
                    
                    if ($con->query($q) === TRUE) {
                        
                        $con->close();
                        
                        header("location:case_payments.php?ca_id=$ca_id&msg=Added Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
                    }
                }
    
                
                if(isset($_POST['addevencate'])){
                    $ec_name=$_POST['ec_name'];
                    
                    $q="INSERT INTO events_categories(eca_title) Values('$ec_name')";
                    
                    if ($con->query($q) === TRUE) {
                        
                        
                        $con->close();
                        
                        header("location:event-categories.php?msg=Added Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
                    }
                }
                
                if(isset($_POST['updateevencate'])){
                    $ec_id=$_POST['ec_id']; $ec_name=$_POST['ec_name'];
                    
                    $q="UPDATE events_categories SET eca_title='$ec_name' WHERE eca_id='$ec_id'";
                    
                    if ($con->query($q) === TRUE) {
                        $con->close();
                        
                        header("location:event-categories.php?msg=Updated Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error;
                        $con->close();
                    }
                }
                
                
                if(isset($_POST['addevenorg'])){
                    $ec_name=$_POST['ec_name'];
                    
                    $q="INSERT INTO organizers(org_name) Values('$ec_name')";
                    
                    if ($con->query($q) === TRUE) {
                        
                        
                        $con->close();
                        
                        header("location:organizers.php?msg=Added Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
                    }
                }
                
                if(isset($_POST['updateeveorg'])){
                    $ec_id=$_POST['org_id']; $ec_name=$_POST['ec_name'];
                    
                    $q="UPDATE organizers SET org_name='$ec_name' WHERE org_id='$ec_id'";
                    
                    if ($con->query($q) === TRUE) {
                        $con->close();
                        
                        header("location:organizers.php?msg=Updated Successfully!");
                    }else {
                        
                        echo "ERROR: Update Faild !!!!!!".$con->error;
                        $con->close();
                    }
                }
                
?>