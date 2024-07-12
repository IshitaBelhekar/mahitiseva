<?php include('aconnection.php');
if(session_start()!=true){
    session_start();
}
$expireAfter = 1;
$user_check = $_SESSION['u_id'];
$login_session = null;
$ses_sql = mysqli_query($con,"select * from user_details where u_id = '$user_check' ");
while ($res=mysqli_fetch_array($ses_sql)) {
    $login_session=$res['u_contact'];}
    if($login_session==null){     header("location:login.php?error=$user_check ");
    }
       
    ?>
