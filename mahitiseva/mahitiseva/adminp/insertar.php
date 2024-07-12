<?php
      include('aconnection.php');
  
      date_default_timezone_set("Asia/Calcutta");
  $cdate=date("Y-m-d");
  // $backdays = date('Y-m-d',strtotime("-4 days"));
   $tomorrow = date("Y-m-d", strtotime('tomorrow'));
 $currenttime=date("H");
 $timestamp = date('Y-m-d H:i:s');

if(isset($_GET['switchbrances'])){
     if(session_start()!=true){
         session_start();
     }
     if($_GET['switchbrances']=='1'){ $_SESSION['branchs']='branch1';   header("location:dashbord.php"); }
     else if($_GET['switchbrances']=='2'){ $_SESSION['branchs']='branch2'; header("location:dashbord.php"); }    
 }
 
 if(isset($_POST['updateinrcpcustomerpayments'])){ 
     $cpay_id=$_POST['cpay_id']; $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id'];
     $cpay_date=$_POST['cpay_date']; $cpay_type=$_POST['cpay_type'];
     $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];
     $cpay_remark=$_POST['cpay_remark'];  $cchq_chqno=$_POST['cchq_chqno'];
     $cchq_date="0000-00-00";
     if($_POST['cchq_date']!=null){
         $cchq_date=$_POST['cchq_date']; }
         $cchq_bankname=$_POST['cchq_bankname']; $cchq_branch=$_POST['cchq_branch'];
         
         $l=1; $p=2;
         if($cpay_mode==3){ $l=2; $p=3; }
         $cpay_old_receiptno=0;
         $qu="UPDATE customers_payments SET cpay_status='$l',cpay_chq_status='$p',c_id='$c_id',pls_id='$pls_id',u_id='$u_id', cpay_date='$cpay_date',cpay_type='$cpay_type',cpay_old_receiptno='$cpay_old_receiptno',cpay_amount='$cpay_amount',cpay_mode='$cpay_mode',
cpay_remark='$cpay_remark',cpay_chqno='$cchq_chqno',cpay_chq_date='$cchq_date',cpay_bankname='$cchq_bankname',cpay_branch='$cchq_branch' 
WHERE cpay_id='$cpay_id'";
         
         if ($conn->query($qu) === TRUE) {
             
             $conn->close();
             
             header("location:add_customer_payment.php?pls_id=$pls_id&c_id=$c_id&msg=Payment Updated Succesfully!");
         }else {
             
             echo "ERROR: Submit Faild !!!!!!".$conn->error;
             $conn->close();
         }
 }
 
 
 if(isset($_POST['addcustomerpayments'])){
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id'];
     $cpay_date=$_POST['cpay_date']; $cpay_type=$_POST['cpay_type'];
     $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];
     $cpay_remark=$_POST['cpay_remark'];  $cchq_chqno=$_POST['cchq_chqno']; 
     $cchq_date="0000-00-00";
     if($_POST['cchq_date']!=null){
         $cchq_date=$_POST['cchq_date']; }
     $cchq_bankname=$_POST['cchq_bankname']; $cchq_branch=$_POST['cchq_branch']; 
     
     $l=1; $p=2;
     if($cpay_mode==3){ $l=2; $p=3; }
     $cpay_old_receiptno=0;
     $qu="INSERT INTO customers_payments(cpay_status,cpay_chq_status,c_id,pls_id,u_id,cpay_date,cpay_type,cpay_old_receiptno,cpay_amount,cpay_mode,cpay_remark,cpay_chqno,cpay_chq_date,cpay_bankname,cpay_branch) 
VALUES ('$l','$p','$c_id','$pls_id','$u_id','$cpay_date','$cpay_type','$cpay_old_receiptno','$cpay_amount','$cpay_mode','$cpay_remark','$cchq_chqno','$cchq_date','$cchq_bankname','$cchq_branch')";
       
         if ($conn->query($qu) === TRUE) {
                 
       $conn->close();
             
             header("location:add_customer_payment.php?pls_id=$pls_id&c_id=$c_id&msg=Payment Added Succesfully!");
      }else {
                 
                 echo "ERROR: Submit Faild !!!!!!".$conn->error;
                 $conn->close();
             }
 }
 
 if(isset($_POST['redeemvoucherpay'])){
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id']; $cuv_id=$_POST['cuv_id'];
     $cpay_date=$_POST['cpay_date'];
     $timestamp = strtotime($cpay_date);
     $cpay_date = date("d/m/Y", $timestamp);
     
     $cpay_transid=$_POST['cpay_transid'];
     $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];
     $cpay_remark=$_POST['cpay_remark'];   $u_name=$_POST['u_name'];  
     $re_u_id=$_POST['re_u_id']; 
     
     $cuv_redm_transcation="Redeem By:".$re_u_id.", Date:".$cpay_date.", Mode:".$cpay_mode.", Amt:".$cpay_amount.", Trans. Id:".$cpay_transid." Enter By:".$u_name;
    
     $qt="UPDATE customer_vouchers SET re_u_id='$u_id',cuv_redm_for='$cpay_remark',cuv_redm_transcation='$cuv_redm_transcation',
cuv_status=2,cuv_redeem_date='$cpay_date'  WHERE cuv_id='$cuv_id'";
                 if ($con->query($qt) === TRUE) {
                 $con->close();               
             header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&msg=Voucher Redeem Succesfully!");
             }else {                 
                 echo "ERROR: Submit Faild !!!!!!".$connn->error;
                 $conn->close();   $con->close(); $connn->close();
             }
             
 }
 
 
 if(isset($_POST['paneltydissave'])){
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id'];
     $pdis_def_month=$_POST['pdis_def_month'];
     $pdis_emidue=$_POST['pdis_emidue']; $pdis_penalty=$_POST['pdis_penalty'];
     $pdis_discount=$_POST['pdis_discount'];$pdis_total=$_POST['pdis_total'];
     echo "here";
     
     if($pdis_total!="NaN" && $pdis_total>=1 && $pdis_total!=null){
  
         $qu="INSERT INTO penalty_discounts(c_id,pls_id,u_id,pdis_date,pdis_def_month,pdis_emidue,pdis_penalty,pdis_discount,pdis_total)
VALUES ('$c_id','$pls_id','$u_id','$cdate','$pdis_def_month','$pdis_emidue','$pdis_penalty','$pdis_discount','$pdis_total')";
        
         if ($conn->query($qu) === TRUE) {
             
             $conn->close();
             
             header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Record Added Succesfully!");
         }else {
             
             echo "ERROR: Submit Faild !!!!!!".$conn->error;
             $conn->close();
         }
         
     } else{
        header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Invalid Values in record submission!");
         
         
     }
     
     
 }
 
 
 if(isset($_POST['addcustomerpaymentsdis'])){
 
 
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id'];
     $cpay_date=$cdate; $cpay_type=$_POST['cpay_type'];
     $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];
     $cpay_remark="Discount Added"; 
     $cchq_chqno=$cchq_bankname=$cchq_branch=null;
     $crcp_forbranch=1;
     $l=1; $p=2;
         $cpay_old_receiptno=0;
         
         $s=mysqli_query($connn,"SELECT * FROM customers_payreceipts ORDER BY crcp_new_rno DESC");
         $rel=mysqli_fetch_array($s);
         $crcp_new_rno=$rel['crcp_new_rno']+1;
         echo $crcp_new_rno; $crcp_old_rcno=0;
         
         $qu="INSERT INTO customers_payreceipts(crcp_new_rno,c_id,pls_id,u_id,crcp_forbranch,crcp_date,crcp_old_rcno,crcp_totalamount,crcp_remark) VALUES
('$crcp_new_rno','$c_id','$pls_id','$u_id','$crcp_forbranch','$cpay_date','$crcp_old_rcno','$cpay_amount','$cpay_remark')";
         
         if ($conn->query($qu) === TRUE) {
             $crcp_id=$conn->insert_id;
             
             $qu="INSERT INTO customers_payments(crcp_id,cpay_status,cpay_chq_status,c_id,pls_id,u_id,cpay_date,cpay_type,cpay_old_receiptno,cpay_amount,cpay_mode,cpay_remark,cpay_chqno,cpay_chq_date,cpay_bankname,cpay_branch)
VALUES ('$crcp_id','$l','$p','$c_id','$pls_id','$u_id','$cpay_date','$cpay_type','$cpay_old_receiptno','$cpay_amount','$cpay_mode','$cpay_remark','$cchq_chqno','$cpay_date','$cchq_bankname','$cchq_branch')";
             
             
             if ($con->query($qu) === TRUE) {
                 $con->close();   $conn->close();
                 
                 header("location:add_customer_discount.php?pls_id=$pls_id&c_id=$c_id&msg=Payment Added Succesfully!");
                 
             }else {
                 
                 echo "ERROR: Submit Faild !!!!!!".$con->error;
                 $conn->close();
                 
             }
         }else {
     
     echo "ERROR: Submit Faild !!!!!!".$conn->error;
     $conn->close();
 }
 }
 

 if(isset($_POST['addnewdocgroup'])){
     $c_id=$_POST['ph_id']; $u_id=$_POST['u_id'];
     $cpay_date=$_POST['dg_date']; $cpay_type=$_POST['dg_documenttype'];
     
     $cpay_remark=$_POST['dg_remark']; 

$qu="INSERT INTO document_groups_details(ph_id,u_id,dg_date,dg_documenttype,dg_remark)
VALUES ('$c_id','$u_id','$cpay_date','$cpay_type','$cpay_remark')";
         
         if ($conn->query($qu) === TRUE) {
             $dg_id=$conn->insert_id;
             $conn->close();
             
             header("location:document_group_details.php?dg_id=$dg_id&ph_id=$c_id&msg=Group Created Succesfully!");
         }else {
             
             echo "ERROR: Submit Faild !!!!!!".$conn->error;
             $conn->close();
         }
 }
 
 
 if(isset($_POST['addvoucher'])){
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];$u_id=$_POST['u_id'];
     $u_name=$_POST['u_name']; 
   $expdate=$_POST['expdate']; $amount=$_POST['amount'];
     
     $qu="INSERT INTO customer_vouchers(u_id,cuv_voch_no,pls_id,c_id,cuv_cre_date,cuv_amount)
            VALUES ('$u_id','$u_name','$pls_id','$c_id','$expdate','$amount')";
     
     if ($conn->query($qu) === TRUE) {
         $dg_id=$conn->insert_id;
         $conn->close();
         
         header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&msg=Inserted Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 if(isset($_POST['searchvouchervalidity'])){
     $cuv_id=substr($_POST['cuv_id'], 3);
     $pls_id=$_POST['pls_id'];     $c_id=$_POST['c_id'];
     $q="SELECT * FROM customer_vouchers WHERE cuv_id='$cuv_id'";
     $query=mysqli_query($con,$q); $idd=0;
     if($rest=mysqli_fetch_array($query)){
         $idd=1;
    $currentDate = new DateTime();  // Current date and time
    $compareDate = new DateTime($rest['cuv_exp_date']);  // Date to compare
    if($rest['cuv_status']==1 && $compareDate >= $currentDate){
        $cuv_id=$rest['cuv_id'];
        header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&cuv_id=$cuv_id&msg=Valid Voucher!");
    }else if($rest['cuv_status']==1 && $compareDate < $currentDate){
        header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&Error=Voucher is Expired!");
        }
        else if($rest['cuv_status']==2){
            header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&Error=Voucher Already Redeemed!");
        }
        else{
            header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&Error=Invalid Voucher!");
        }
     }else{
         header("location:customer_vouchers.php?pls_id=$pls_id&c_id=$c_id&Error=Invalid Voucher!");
     }
 }
   
   
    

 
 if(isset($_POST['updatedocgroup'])){
     $u_id=$_POST['u_id'];
     $cpay_date=$_POST['dg_date']; $cpay_type=$_POST['dg_documenttype'];
     $dg_id=$_POST['dg_id'];$dg_status=$_POST['dg_status'];
     $cpay_remark=$_POST['dg_remark'];
     
     $qu="UPDATE document_groups_details  SET dg_status='$dg_status',u_id='$u_id',dg_date='$cpay_date', dg_documenttype='$cpay_type',dg_remark='$cpay_remark' WHERE dg_id='$dg_id'";
     
     if ($conn->query($qu) === TRUE) {
       $conn->close();
      header("location:document_group_details.php?dg_id=$dg_id&msg=Updated Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 
 
 if(isset($_POST['updatecustomerpayments'])){
     $crcp_id=$_POST['crcp_id']; $cpay_id=$_POST['cpay_id']; $upls_id=$_POST['upls_id'];
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id'];
     $cpay_date=$_POST['cpay_date']; $cpay_type=$_POST['cpay_type'];
     $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];  $cpay_chq_status=$_POST['cpay_chq_status'];
     $cpay_remark=$_POST['cpay_remark'];  $cchq_chqno=$_POST['cchq_chqno'];
     $cchq_date=0000-00-00;    if (isset($_POST['cchq_date'])){$cchq_date=$_POST['cchq_date'];}
  
     $l=1; 
     if($cpay_mode==3){ $l=2; $p=3;}
     
         $cchq_bankname=$_POST['cchq_bankname']; $cchq_branch=$_POST['cchq_branch'];  
         $qu="UPDATE customers_payments SET cpay_status='$l',cpay_chq_status='$cpay_chq_status', pls_id='$upls_id',u_id='$u_id',cpay_date='$cpay_date',cpay_type='$cpay_type',cpay_amount='$cpay_amount',cpay_mode='$cpay_mode',cpay_remark='$cpay_remark',cpay_chqno='$cchq_chqno',cpay_chq_date='$cchq_date',cpay_bankname='$cchq_bankname',cpay_branch='$cchq_branch' WHERE cpay_id='$cpay_id' ";

      if ($conn->query($qu) === TRUE) {
                        $conn->close();
                        echo $cpay_chq_status;
          header("location:update_customer_payments.php?crcp_id=$crcp_id&cpay_id=$cpay_id&pls_id=$pls_id&c_id=$c_id&msg=Payment Updated Succesfully!");
         }else {
             
             echo "ERROR: Submit Faild !!!!!!".$conn->error;
             $conn->close();
         }
 }
 
 if(isset($_POST['updatefirmid'])){
     $crcp_id=$_POST['crcp_id'];
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];
     $crcp_forbranch=$_POST['crcp_forbranch'];
    
     $qu="UPDATE customers_payreceipts SET crcp_forbranch='$crcp_forbranch' WHERE crcp_id='$crcp_id' ";
     
     if ($conn->query($qu) === TRUE) {
         $conn->close();
         header("location:print_receipt.php?crcp_id=$crcp_id&pls_id=$pls_id&c_id=$c_id&msg=Firm Updated Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 
 if(isset($_POST['addhandoverdetails'])){
     $dg_id=$_POST['dg_id'];$doc_hand_date=$_POST['doc_hand_date'];
     $dgc_id=$_POST['dgc_id']; $doc_hand_username=$_POST['uname'];
     $crcp_forbranch=2;  $doc_hand_remark=$_POST['doc_hand_remark'];
     
     $qu="UPDATE document_group_customers SET doc_hand_date='$doc_hand_date', doc_hand_remark='$doc_hand_remark',
doc_hand_status='$crcp_forbranch', doc_hand_username='$doc_hand_username' WHERE dgc_id='$dgc_id' ";
     
     if ($conn->query($qu) === TRUE) {
         $conn->close();
         header("location:document_group_details.php?dg_id=$dg_id&msg=Updated Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 if(isset($_POST['addhandoverdetailsss'])){
     $csv_id=$_POST['csv_id'];$csv_note=$_POST['csv_note']; $csv_noteold=$_POST['csv_noteold'];
     $update_u_name=$_POST['update_u_name'];
     
     $csv_note=date("d/m/Y").": ".$update_u_name." | ".$csv_note.", ".$csv_noteold;
     $cpay_chq_date_start=$_POST['cpay_chq_date_start']; $cpay_chq_date_end=$_POST['cpay_chq_date_end'];
    
     
     $qu="UPDATE customers_sitevisits SET csv_note='$csv_note' WHERE csv_id='$csv_id' ";
     
     if ($conn->query($qu) === TRUE) {
         $conn->close();
         header("location:site_visit_customers.php?cpay_chq_date_start=$cpay_chq_date_start&cpay_chq_date_end=$cpay_chq_date_end&msg=Updated Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 if(isset($_POST['generatereceipt'])){
     $crcp_old_rcno=null;
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id']; $u_id=$_POST['u_id'];
     $crcp_date=$_POST['crcp_date'];  $crcp_old_rcno=$_POST['crcp_old_rcno'];
     $crcp_totalamount=$_POST['crcp_totalamount'];  $crcp_remark=$_POST['crcp_remark'];
     $crcp_new_rno=0; $ch=null;   
     
     $crcp_forbranch=$_POST['crcp_forbranch'];
     $qu=null;
     if($crcp_old_rcno!=null){
         $crcp_new_rno=0;
         $qu="INSERT INTO customers_payreceipts(crcp_new_rno,c_id,pls_id,u_id,crcp_forbranch,crcp_date,crcp_old_rcno,crcp_totalamount,crcp_remark) VALUES
('$crcp_new_rno','$c_id','$pls_id','$u_id','$crcp_forbranch','$crcp_date','$crcp_old_rcno','$crcp_totalamount','$crcp_remark')";
     }else{
         $s=mysqli_query($connn,"SELECT * FROM customers_payreceipts ORDER BY crcp_new_rno DESC");
         $rel=mysqli_fetch_array($s);
         $crcp_new_rno=$rel['crcp_new_rno']+1;
         echo $crcp_new_rno; $crcp_old_rcno=0;
         $qu="INSERT INTO customers_payreceipts(crcp_new_rno,c_id,pls_id,u_id,crcp_date,crcp_old_rcno,crcp_totalamount,crcp_remark) VALUES
('$crcp_new_rno','$c_id','$pls_id','$u_id','$crcp_date','$crcp_old_rcno','$crcp_totalamount','$crcp_remark')";
     }
     
     
     if ($conn->query($qu) === TRUE) {
         $crcp_id=$conn->insert_id;
         $count=0;$cpay_id=0;
         $qr="SELECT * FROM customers_payments  WHERE pls_id='$pls_id' ";
         $que=mysqli_query($connn,$qr);
         while ($rer=mysqli_fetch_array($que)) {
             if($rer['crcp_id']==null){ $cpay_id= $rer['cpay_id'];
             echo $crcp_id."==".$cpay_id;
             $q="UPDATE customers_payments SET crcp_id='$crcp_id' WHERE cpay_id='$cpay_id'";
             if ($con->query($q) === TRUE) {
                 $qs="UPDATE plot_sale_details SET pls_lastpayeddate='$crcp_date', pls_totalpayed=pls_totalpayed+'$crcp_totalamount', pls_balance=pls_balance-'$crcp_totalamount'  WHERE cpay_id='$cpay_id'";
                 $conn->query($qs);
                 
                 $count=$count+1;
             }else {
                 $conn->close();
                 $con->close(); $connn->close();
                 echo "ERROR: Update Faild !!!!!!".$conn->error.", ".$con->error. ", ".$connn->error;
             }
             
             } 
         }
             if($count>=1){
                 $conn->close();
                 $con->close(); $connn->close();        
header("location:smscode.php?crcpsms=1&pls_id=$pls_id&c_id=$c_id&crcp_id=$crcp_id&crcp_totalamount=$crcp_totalamount&crcp_date=$crcp_date");
        
             }else {  echo "receipt not updated"; }
             
     }else {
         
         $conn->close();
         echo "ERROR: Submit Faild !!!!!!".$conn->error."=".$connn->error;
     }
 }
 
 
 
 
if(isset($_POST['submit_order'])){
   $vender_id=$_POST['vender_id']; $order_date=$_POST['order_date'];
   $ven_or_pro_total=$_POST['ven_or_pro_total']; $vender_order_id=$_POST['vender_order_id']; $total_products=$_POST['total_products'];
   $vender_order_submission=$_POST['vender_order_submission'];
   $q="UPDATE vender_orders SET Vender_order_total_price='$ven_or_pro_total', vender_order_total_products='$total_products', vender_order_submission='$vender_order_submission' WHERE vender_order_id='$vender_order_id'" ;
   $msg="Updated Successfully!";
   if ($con->query($q) === TRUE) {
   $con->close();
  header('location:add_order_details.php?umsg=s');
   }else {
   $con->close();
     echo "ERROR: Update Faild !!!!!!";
   }
   }
   if(isset($_POST['searchsalescustomer'])){
       $c_contact=$_POST['c_contact']; $c_id=null; $contact=null;
       $q="SELECT * from customer_details WHERE c_contact='$c_contact' " ;
       $qu=mysqli_query($conn,$q);
       while ($res=mysqli_fetch_array($qu)) {   $c_id=$res['c_id'];  $contact=$res['c_contact']; }
       if ($c_id!==null) {
   
               $con->close();
         header("location:salespanel_details.php?c_id=$c_id");
       }else {
           $con->close();
          header("location:salespanel_details.php?c_contact=$c_contact");
       
       } 
       } 
       
       if(isset($_POST['searchtailoringcustomer'])){
           $c_contact=$_POST['c_contact']; $c_id=null; $contact=null;
           $q="SELECT * from customer_details WHERE c_contact='$c_contact' ";
           $qu=mysqli_query($conn,$q);
           while ($res=mysqli_fetch_array($qu)) { $c_id=$res['c_id'];  $contact=$res['c_contact']; }
         if ($c_id!==null ) {               
               $con->close();
               header("location:tailoringpanel_details.php?c_id=$c_id");
           }else {
               $con->close();
               header("location:customers.php?c_contact=$c_contact&Error=Please Add Customer First");
               
           }
       } 
       if(isset($_POST['searchsalesproduct'])){
           $p_barcode=$_POST['p_barcode'];  $c_id=$_POST['c_id']; $i_id=$_POST['i_id'];   $p_id=null; $p_category=null;
           $q="SELECT * from products WHERE p_barcode='$p_barcode' " ;
           $qu=mysqli_query($conn,$q);
           while ($res=mysqli_fetch_array($qu)) {   $p_id=$res['p_id']; $p_category=$res['p_category'];  }
    if ($p_id!==null) {
     $con->close();
     header("location:salespanel_details.php?c_id=$c_id&p_id=$p_id&i_id=$i_id&p_category=$p_category");
           }else {
               $con->close();
               header("location:salespanel_details.php?c_id=$c_id&i_id=$i_id&Error=Product Not Found Please Check Barcode Again");
         }
       } 
  
   
      
      
      
    
      
      
      
      if (isset($_POST['addbookingfromwebsite'])) {
         
        $Name=$_POST['name'];
        
          $address=$_POST['address'];
       $contact=$_POST['contact'];
$q="INSERT INTO website_booking(wb_name,wb_contact,wb_date) VALUES ('$Name','$contact','$cdate')";
          
          if ($con->query($q) === TRUE) {
              $con->close();
              
              header('location:index.php?msg=Submitted Successfully!');
          } else {
              $con -> close();
              echo "Error: " . $q . "<br>" . $con->error;
          }
          
      }
      
      if (isset($_POST['sitevisitfromwebsite'])) {
          // $address=$Designation=$contact=$img=null;
          $Name=$_POST['name'];
          
          $address=$_POST['address'];
          $contact=$_POST['contact'];
          $date=$_POST['date'];
          $q="INSERT INTO website_sitevisit(wsv_name,wsv_contact,wsv_visitdate,wsv_date) VALUES ('$Name','$contact','$date','$cdate')";
          
          if ($con->query($q) === TRUE) {
              $con->close();
              
              header('location:index.php?msg=Submitted Successfully!');
          } else {
              $con -> close();
              echo "Error: " . $q . "<br>" . $con->error;
          }
          
      }
      

 if (isset($_POST['submitcontact'])) {
// $address=$Designation=$contact=$img=null;

  $type=$_POST['type'];

	 $Name=$_POST['name'];

	$Email=$_POST['email'];
   $address=$_POST['address'];
  $img=$_POST['img'];
   $Designation=$_POST['Designation'];
 $Institute=$_POST['Institute'];

	$contact=$_POST['contact'];
$q="INSERT INTO campusambassedor(am_type,am_name,am_email,am_contact,am_designation,am_college,am_location,am_image) VALUES ('$type','$Name','$Email','$contact','$Designation','$Institute','$address','$img')";

if ($con->query($q) === TRUE) {
$con->close();

header('location:add_Ambassador.php?msg=s');
} else {
  $con -> close();
  echo "Error: " . $q . "<br>" . $con->error;
}

 }
 if(isset($_POST['addphaseinfo'])){
     $firm_name=$_POST['ph_name']; $ph_total_plots=0;
     $firm_address=$_POST['ph_address']; $ph_id=$_POST['ph_id'];$ph_total_plots=$_POST['ph_total_plots'];
  $ph_base_rate=$_POST['ph_base_rate'];$ph_price_persqft=$_POST['ph_price_persqft'];
     
     $q="INSERT INTO phases_details(ph_name,ph_address,ph_no,ph_total_plots,ph_base_rate,ph_price_persqft) Values('$firm_name','$firm_address','$ph_no','$ph_total_plots','$ph_base_rate','$ph_price_persqft')" ;
     
     if ($con->query($q) === TRUE) {
         $ph_id=$con->insert_id;
         $con->close();
         $pl_no=1;
         $pl_area=1000;
         while ($ph_total_plots>0) {
  $qu="INSERT INTO plots_details(ph_id,pl_no,pl_area,pl_price_prsqft,pl_sale_price) Values('$ph_id','$pl_no','$pl_area','$ph_price_persqft','$ph_base_rate')"; 
        if ($conn->query($qu) === TRUE) {
             $ph_total_plots=$ph_total_plots-1;
             $pl_no=$pl_no+1;
         }else {
             $con->close();
             echo "ERROR: Update Faild !!!!!!".$conn->error;
         }
         }
         
         header("location:phases.php?msg=$ph_price_persqft&s= Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 if(isset($_POST['updatephaseinfo'])){
     $firm_name=$_POST['ph_name']; $ph_id=$_POST['ph_id'];
     $firm_address=$_POST['ph_address']; $ph_no=$_POST['ph_no'];$ph_total_plots=$_POST['ph_total_plots'];
     $ph_saled_plots=$_POST['ph_saled_plots']; $ph_base_rate=$_POST['ph_base_rate'];$ph_price_persqft=$_POST['ph_price_persqft'];
     
     
     $q="UPDATE phases_details SET ph_name='$firm_name', ph_address='$firm_address', ph_no='$ph_no', ph_total_plots='$ph_total_plots', ph_saled_plots='$ph_saled_plots', ph_base_rate='$ph_base_rate', ph_price_persqft='$ph_price_persqft' WHERE ph_id='$ph_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:phases.php?msg=Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['updatequickplotdetails'])){
     $phase_name=$_POST['phase_name']; $pl_id=$_POST['pl_id']; $ph_id=$_POST['ph_id'];
     $pl_remark=$_POST['pl_remark']; $pl_no=$_POST['pl_no'];$new_pl_no=$_POST['new_pl_no'];
     $pl_area=$_POST['pl_area']; $pl_price_prsqft=$_POST['pl_price_prsqft'];$pl_sale_price=$_POST['pl_sale_price'];
     
     
     $q="UPDATE plots_details SET pl_no='$pl_no', new_pl_no='$new_pl_no', pl_area='$pl_area', pl_price_prsqft='$pl_price_prsqft', pl_sale_price='$pl_sale_price', pl_remark='$pl_remark' WHERE pl_id='$pl_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:phase_plots.php?ph_id=$ph_id&msg=Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['addnewplotdetails'])){
    $ph_id=$_POST['ph_id'];
     $pl_remark=$_POST['pl_remark']; $pl_no=$_POST['pl_no'];
     $pl_area=$_POST['pl_area']; $pl_price_prsqft=$_POST['pl_price_prsqft']; $pl_sale_price=$_POST['pl_sale_price'];
     
     $q="INSERT INTO plots_details(ph_id,pl_no,pl_price_prsqft,pl_area,pl_sale_price,pl_remark) Values('$ph_id','$pl_no','$pl_price_prsqft','$pl_area','$pl_sale_price','$pl_remark')" ;
     
   
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:phase_plots.php?ph_id=$ph_id&msg=Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['updatedoccustremark'])){
     $dg_id=$_POST['dg_id'];
     $firm_address=$_POST['dgc_id'];  $firm=$_POST['dgc_remark']; 
     
     $q="UPDATE document_group_customers SET dgc_remark='$firm' WHERE dgc_id='$firm_address'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
        
         header("location:document_group_details.php?dg_id=$dg_id&msg=Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 if(isset($_POST['updatedoccuststatus'])){
     $dg_id=$_POST['dg_id'];
     $firm_address=$_POST['dgc_id'];  $firm=$_POST['dgc_status'];
     
     $q="UPDATE document_group_customers SET dgc_status='$firm' WHERE dgc_id='$firm_address'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:document_group_details.php?dg_id=$dg_id&msg=Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['addbranchinfo'])){
    $firm_name=$_POST['firm_name'];
    $firm_address=$_POST['firm_address']; $firm_contact=$_POST['firm_contact'];$firm_altcontact=$_POST['firm_altcontact'];
 
     $q="INSERT INTO branch_details(branch_name,branch_address,branch_contact,branch_alt_contact) Values('$firm_name','$firm_address','$firm_contact','$firm_altcontact')" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:brances.php?msg=New Branch Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['purchaseplotsfinalupdate'])){ 
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];$ph_id=$_POST['ph_id'];
     $pls_plot_no=$_POST['pls_plot_no']; $pls_plot_size=$_POST['pls_plot_size'];
     $pls_price_persqft=$_POST['pls_price_persqft'];
     $pls_totalprice=$_POST['pls_totalprice'];
     $pls_dcode=$_POST['pls_dcode'];  
     $pls_acode=$_POST['pls_acode'];    $pls_scode=$_POST['pls_scode'];
     $pls_promisdownpaydatestwo=$_POST['pls_promisdownpaydatestwo'];
     $pls_promisdownpayamounts=$_POST['pls_promisdownpayamounts'];
     $pls_offervalidity_date=$_POST['pls_offervalidity_date'];
     $pls_promisemi=$_POST['pls_promisemi'];
     $pls_promisdowndate=$_POST['pls_promisdowndate'];
     $pls_promisdownpayment=$_POST['pls_promisdownpayment'];
     $pls_dcode_commession=$_POST['pls_dcode_commession'];
     $pls_acode_commession=$_POST['pls_acode_commession']; $pls_scode_commession=$_POST['pls_scode_commession'];
     $pls_scheme_count=$_POST['pls_scheme_count']; $pls_actual_totalprice=$_POST['pls_actual_totalprice'];
     $pls_sceme_startdate=$_POST['pls_sceme_startdate'];
     
     
     function add_months($months, DateTime $dateObject)
     {
         $next = new DateTime($dateObject->format('Y-m-d'));
         $next->modify('last day of +'.$months.' month');
         
         if($dateObject->format('d') > $next->format('d')) {
             return $dateObject->diff($next);
         } else {
             return new DateInterval('P'.$months.'M');
         }
     }
     
     function endCycle($d1, $months)
     {
         $date = new DateTime($d1);
         
         // call second function to add the months
         $newDate = $date->add(add_months($months, $date));
         
         // goes back 1 day from date, remove if you want same day of month
         $newDate->sub(new DateInterval('P1D'));
         
         //formats final date to Y-m-d form
         $dateReturned = $newDate->format('Y-m-d');
         
         return $dateReturned;
     }
     
     $pls_scheme_enddate = endCycle($pls_sceme_startdate, $pls_scheme_count);
     echo $pls_scheme_enddate;
     
     
     

     $t=1;
     $q="UPDATE plot_sale_details SET pls_promisdownpayamounts='$pls_promisdownpayamounts',pls_promisdownpaydatestwo='$pls_promisdownpaydatestwo',pls_acode_commession='$pls_acode_commession',pls_dcode_commession='$pls_dcode_commession',pls_status='$t', pls_dcode='$pls_dcode', pls_acode='$pls_acode',  pls_plot_no='$pls_plot_no',
pls_offervalidity_date='$pls_offervalidity_date', pls_scode='$pls_scode', pls_scode_commession='$pls_scode_commession', pls_promisemi='$pls_promisemi',  pls_promisdowndate='$pls_promisdowndate', pls_promisdownpayment='$pls_promisdownpayment',
 ph_id='$ph_id',  pls_plot_size='$pls_plot_size', pls_totalprice='$pls_totalprice',   pls_plot_size='$pls_plot_size', pls_price_persqft='$pls_price_persqft',
  pls_scheme_count='$pls_scheme_count', pls_sceme_startdate='$pls_sceme_startdate', pls_scheme_enddate='$pls_scheme_enddate' WHERE pls_id='$pls_id'" ;
     
     if ($con->query($q) === TRUE) {
         $pl_id=0;
         $qu="SELECT * FROM plots_purchased_list WHERE pls_id='$pls_id'";
         $qur=mysqli_query($connn,$qu);
         while ($res=mysqli_fetch_array($qur)) {
             
             $pl_id=$res['pl_id'];
             
             
             $qt="UPDATE plots_details SET pl_status='$t' WHERE pl_id='$pl_id'" ;
             
             if ($conn->query($qt) === TRUE) {
                 
             }else {
                 $conn->close();
                 echo "ERROR: Submit Faild !!!!!!".$con->error;
             }
         }
         $con->close();$conn->close();$connn->close();
         
         header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Updated Successfully!");
     }else {
         $conn->close();
         echo "ERROR: Submit Faild !!!!!!".$con->error;
     }
     
        
 }
 
 if(isset($_POST['cancleplotsfinalupdate'])){
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];
     
     $u_name=$_POST['u_name'];
     $cda=date('d-m-Y');
     $pre_pls_statuschange=$_POST['pre_pls_statuschange'];      $pls_statuschange=$_POST['pls_statuschange'];
     
     if($pls_statuschange!=null){
         $pls_statuschange="<br><b>".$cda."</b> - ".$u_name." - ".$pls_statuschange.", ".$pre_pls_statuschange;
     }else{
         $pls_statuschange=$pre_pls_statuschange;         
     }
   
     $u=3;
     $q="UPDATE plot_sale_details SET pls_status='$u', pls_statuschange='$pls_statuschange' WHERE pls_id='$pls_id'" ;
     
     if ($con->query($q) === TRUE) {
         $pl_id=0;
         $qu="SELECT * FROM plots_purchased_list WHERE pls_id='$pls_id'";
         $qur=mysqli_query($connn,$qu);
         while ($res=mysqli_fetch_array($qur)) {
             
             $pl_id=$res['pl_id'];
             $ppl_id=$res['ppl_id'];
             $t=3;
             $qt="UPDATE plots_details SET pl_status='$t' WHERE pl_id='$pl_id'" ;
             
             if ($conn->query($qt) === TRUE) {
                 $pls_status=3;
                     $qtaa="UPDATE plots_purchased_list SET ppl_status='$pls_status' WHERE ppl_id='$ppl_id' ";
                     $conf->query($qtaa);
             
             }else {
                 $conn->close();
                 echo "ERROR: Submit Faild !!!!!!".$con->error;
             }
         }
         $con->close();$conn->close();$connn->close();
         
         header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Purchased Plot Cancelled Successfully!");
     }else {
         echo "ERROR: Submit Faild !!!!!!".$con->error;
         $con->close();
        
     }
     
 }
  
 
 if(isset($_POST['purchaseplotsfinal'])){
     $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];$ph_id=$_POST['ph_id'];
     $pls_plot_no=$_POST['pls_plot_no']; $pls_plot_size=$_POST['pls_plot_size'];
     $pls_price_persqft=$_POST['pls_price_persqft'];
     $pls_totalprice=$_POST['pls_totalprice'];
     $pls_dcode=$_POST['pls_dcode'];     $pls_scode=$_POST['pls_scode'];
     $pls_promisdownpaydatestwo=$_POST['pls_promisdownpaydatestwo'];
     $pls_promisdownpayamounts=$_POST['pls_promisdownpayamounts'];
     $pls_promisdowndate=$_POST['pls_promisdowndate'];
     $pls_promisdownpayment=$_POST['pls_promisdownpayment'];
     $pls_promisemi=$_POST['pls_promisemi'];
     $pls_offervalidity_date=$_POST['pls_offervalidity_date'];
     $pls_scode_commession=$_POST['pls_scode_commession'];
     $pls_dcode_commession=$_POST['pls_dcode_commession'];
     $pls_acode_commession=$_POST['pls_acode_commession'];
     
     $pls_acode=$_POST['pls_acode'];
     $pls_scheme_count=$_POST['pls_scheme_count']; $pls_actual_totalprice=$_POST['pls_actual_totalprice']; 
     $pls_sceme_startdate=$_POST['pls_sceme_startdate'];
     
     
     function add_months($months, DateTime $dateObject)
     {
         $next = new DateTime($dateObject->format('Y-m-d'));
         $next->modify('last day of +'.$months.' month');
         
         if($dateObject->format('d') > $next->format('d')) {
             return $dateObject->diff($next);
         } else {
             return new DateInterval('P'.$months.'M');
         }
     }
     
     function endCycle($d1, $months)
     {
         $date = new DateTime($d1);
         
         // call second function to add the months
         $newDate = $date->add(add_months($months, $date));
         
         // goes back 1 day from date, remove if you want same day of month
         $newDate->sub(new DateInterval('P1D'));
         
         //formats final date to Y-m-d form
         $dateReturned = $newDate->format('Y-m-d');
         
         return $dateReturned;
     }
     
     $pls_scheme_enddate = endCycle($pls_sceme_startdate, $pls_scheme_count);
     echo $pls_scheme_enddate;
     
     
     $pls_remarkone=$_POST['pls_remarkone'];
     $ppp=1;
     $q="UPDATE plot_sale_details SET pls_promisdownpayamounts='$pls_promisdownpayamounts',pls_promisdownpaydatestwo='$pls_promisdownpaydatestwo',pls_acode_commession='$pls_acode_commession',pls_dcode_commession='$pls_dcode_commession',
pls_offervalidity_date='$pls_offervalidity_date',pls_promisemi='$pls_promisemi', pls_scode='$pls_scode', pls_scode_commession='$pls_scode_commession', pls_promisdownpayment='$pls_promisdownpayment',
pls_promisdowndate='$pls_promisdowndate',pls_dcode='$pls_dcode',pls_acode='$pls_acode',pls_plot_no='$pls_plot_no', 
ph_id='$ph_id',  pls_plot_size='$pls_plot_size', pls_totalprice='$pls_totalprice',   pls_plot_size='$pls_plot_size', 
pls_price_persqft='$pls_price_persqft', pls_status='$ppp',
  pls_scheme_count='$pls_scheme_count', pls_sceme_startdate='$pls_sceme_startdate', pls_scheme_enddate='$pls_scheme_enddate', pls_remarkone='$pls_remarkone' WHERE pls_id='$pls_id'" ;
     
     if ($con->query($q) === TRUE) {
         $pl_id=0;
         $qu="SELECT * FROM plots_purchased_list WHERE pls_id='$pls_id'";
         $qur=mysqli_query($connn,$qu);
         while ($res=mysqli_fetch_array($qur)) {
             
             $pl_id=$res['pl_id'];
             
             $t=1;
             $qt="UPDATE plots_details SET pl_status='$t' WHERE pl_id='$pl_id'" ;
             
             if ($conn->query($qt) === TRUE) {
                 
             }else {
                 $conn->close();
                 echo "ERROR: Submit Faild !!!!!!".$con->error;
             }
         }
         
         
         $u_id=$_POST['u_id'];
         $cpay_date=$_POST['cpay_date']; $cpay_type=$_POST['cpay_type'];
         $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];
         $cpay_remark=$_POST['pls_remarkone'];  $cchq_chqno=$_POST['cchq_chqno'];
         $cchq_date="0000-00-00";
         if($_POST['cchq_date']!=null){
             $cchq_date=$_POST['cchq_date']; }
             $cchq_bankname=$_POST['cchq_bankname']; $cchq_branch=$_POST['cchq_branch'];
             $cpay_old_receiptno=0;
             
       

$s=mysqli_query($connn,"SELECT * FROM customers_payreceipts ORDER BY crcp_new_rno DESC");
$rel=mysqli_fetch_array($s);
$crcp_new_rno=$rel['crcp_new_rno']+1;
echo $crcp_new_rno; $crcp_old_rcno=0;

$qq="INSERT INTO customers_payreceipts(crcp_new_rno,c_id,pls_id,u_id,crcp_date,crcp_old_rcno,crcp_totalamount,crcp_remark) VALUES
('$crcp_new_rno','$c_id','$pls_id','$u_id','$cpay_date','$crcp_old_rcno','$cpay_amount','$cpay_remark')";


             if ($conn->query($qq) === TRUE) {
                 $crcp_id=$conn->insert_id;
                 $l=1; $p=2;
                 if($cpay_mode==3){ $l=2; $p=3;}
                 
                 
$qe="INSERT INTO customers_payments(cpay_status,cpay_chq_status,c_id,crcp_id,pls_id,u_id,cpay_date,cpay_type,cpay_old_receiptno,cpay_amount,cpay_mode,cpay_remark,cpay_chqno,cpay_chq_date,cpay_bankname,cpay_branch)
 VALUES ('$l','$p','$c_id','$crcp_id','$pls_id','$u_id','$cpay_date','$cpay_type','$cpay_old_receiptno','$cpay_amount','$cpay_mode','$cpay_remark','$cchq_chqno','$cchq_date','$cchq_bankname','$cchq_branch')";
                                 
            if ($conn->query($qe) === TRUE) {
               
header("location:smscode.php?firstpaysms=1&crcp_date=$cpay_date&cpay_type=$cpay_type&cpay_amount=$cpay_amount&pls_totalprice=$pls_totalprice&pls_id=$pls_id&c_id=$c_id&msg=Payment Added Succesfully!");
             }else {
                 
                 echo "ERROR: Submit Faild !!!!!!".$conn->error;
                 $conn->close();
             }}else {
                 
                 echo "ERROR: Submit Faild !!!!!!".$conn->error;
                 $conn->close();
             }      
        $con->close();$conn->close();$connn->close();
         
       
     }else {
         $conn->close();
         echo "ERROR: Submit Faild !!!!!!".$con->error;
     }
     
 }
 
 if(isset($_GET['add_pplottodocgroup'])) {
     
     $pls_id=$_GET['pls_id'];
     $dg_id=$_GET['dg_id'];
  $c_id=$_GET['c_id'];
     $u_id=$_GET['u_id'];

     $s=1; $t=0; $check=0;

   
     
  $qu="INSERT INTO document_group_customers (dg_id,c_id,u_id,pls_id)
 VALUES ('$dg_id','$c_id','$u_id','$pls_id')";
             if ($connn->query($qu) === TRUE) {
              
                 header("location:document_group_details.php?dg_id=$dg_id&msg=Added Sucessfully!");
             }    else {
                 echo "ERROR: Update Faild !!!!!!".$connn->error;
                 $connn -> close();
             }
     }
 
 
 
 
 if(isset($_POST['addmarketingtrippay'])) {
     
     $mtpay_date=$_POST['mtpay_date'];
     $mtpay_givento=$_POST['mtpay_givento'];
     $mtpay_amount=$_POST['mtpay_amount'];
     $u_id=$_POST['u_id'];      $v_id=$_POST['v_id'];
     $mtpay_mode=$_POST['mtpay_mode'];
     $mtpay_details=$_POST['mtpay_details'];
     $mtpay_remark=$_POST['mtpay_remark'];
     $mt_id=$_POST['mt_id'];
     $mtpay_totalkm=$_POST['mtpay_totalkm'];
     
     
     
     
     $q="INSERT INTO marketing_trips_payments (mtpay_totalkm,mtpay_date,mtpay_givento,u_id,v_id,mtpay_amount,mtpay_mode,mtpay_details,mtpay_remark)
 VALUES ('$mtpay_totalkm','$mtpay_date','$mtpay_givento','$u_id','$v_id','$mtpay_amount','$mtpay_mode','$mtpay_details','$mtpay_remark')";
     if ($connn->query($q) === TRUE) {
         $mtpay_id=$connn->insert_id;
         
         $y=2;
         $my_str_arr = explode (",", $mt_id);
         
         foreach($my_str_arr as $keyf => $valf) {

     $qu="UPDATE  marketing_trips  SET mtpay_id='$mtpay_id', mt_paystatus='$y' WHERE mt_id='$valf'";
  
     echo $keyf."=>".$valf;
     $qur=mysqli_query($con,$qu);
     $con->query($qu);
         }
  
         $con->close();$connn->close();
            header("location:marketing_trips.php?msg=Updated Successfully!");
     } else{
          echo "ERROR: Update Faild !!!!!!".$connn->error;
             $connn -> close();
         }
     
 }
     
     

 
 
 
 
 if(isset($_GET['add_pplot'])) {
    
     $pls_id=$_GET['pls_id'];
     $pl_id=$_GET['pl_id'];
     $ph_id=$_GET['ph_id'];
     $c_id=$_GET['c_id'];
     $u_id=$_GET['u_id'];
     
     $s=1; $t=0; $check=0;
     $qu="SELECT * FROM plots_purchased_list WHERE pls_id='$pls_id'";
     $qur=mysqli_query($connn,$qu);
     while ($res=mysqli_fetch_array($qur)) {
         
         $check=$res['pl_id'];
         if($check==$pl_id){        
             $connn->close();
         header("location:add_purchasedplot.php?c_id=$c_id&pls_id=$pls_id&ph_id=$ph_id&Error=Plot Already Present!");
         }
     
     }
     
     if($check!=$pl_id){
         echo "ch2";
     if($pls_id==$t){
         $qu="INSERT INTO plot_sale_details (pls_timestamp,c_id,u_id,pls_sceme_startdate,pls_scheme_enddate) VALUES ('$timestamp','$c_id','$u_id','$cdate','$cdate')";
         if ($connn->query($qu) === TRUE) {
             
             $pls_id=$connn->insert_id;
         }    else {
             echo "ERROR: Update Faild !!!!!!".$connn->error;
             $connn -> close();
         }
         
     }
     $stt=1;
     $qy="UPDATE plots_details SET pl_status='$stt' WHERE pl_id='$pl_id'";
     $con->query($qy);
     $qt="INSERT INTO plots_purchased_list (pls_id,u_id,c_id,pl_id,ph_id) VALUES ('$pls_id','$u_id','$c_id','$pl_id','$ph_id')";
     if ($con->query($qt) === TRUE) {
         $connn->close(); $con->close();
        
        header("location:add_purchasedplot.php?c_id=$c_id&pls_id=$pls_id&ph_id=$ph_id&msg=Submitted Sucessfully!");
         
     }    else {
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con -> close();
     }
     }
     
     
     
     
 }
 
 
 if(isset($_GET['add_pplotup'])) {
     
     $pls_id=$_GET['pls_id'];
     $pl_id=$_GET['pl_id'];
     $ph_id=$_GET['ph_id'];
     $c_id=$_GET['c_id'];
     $u_id=$_GET['u_id'];
     
     $s=1; $t=0; $check=0;
     $qu="SELECT * FROM plots_purchased_list WHERE pls_id='$pls_id' AND ppl_status='$s'";
     $qur=mysqli_query($connn,$qu);
     while ($res=mysqli_fetch_array($qur)) {
    
         $check=$res['pl_id'];
         if($check==$pl_id){
             echo "ch";
             header("location:update_purchasedplots.php?c_id=$c_id&pls_id=$pls_id&ph_id=$ph_id&Error=Plot Already Present!");
         }
         
     }
     
     if($check!=$pl_id){
         echo "ch2";
         if($pls_id==$t){
             $qu="INSERT INTO plot_sale_details (pls_timestamp,c_id,u_id,pls_sceme_startdate,pls_scheme_enddate) VALUES ('$timestamp','$c_id','$u_id','$cdate','$cdate')";
             if ($connn->query($qu) === TRUE) {
                 $pls_id=$connn->insert_id;
             }    else {
                 echo "ERROR: Update Faild !!!!!!".$connn->error;
                 $connn -> close();
             }
             
         }
         $stt=1;
         $qy="UPDATE plots_details SET pl_status='$stt' WHERE pl_id='$pl_id'";
         $con->query($qy);
         $qt="INSERT INTO plots_purchased_list (pls_id,u_id,c_id,pl_id,ph_id) VALUES ('$pls_id','$u_id','$c_id','$pl_id','$ph_id')";
         if ($con->query($qt) === TRUE) {
             $connn->close(); $con->close();
             
             header("location:update_purchasedplots.php?c_id=$c_id&pls_id=$pls_id&ph_id=$ph_id&msg=Submitted Sucessfully!");
             
         }    else {
             echo "ERROR: Update Faild !!!!!!".$con->error;
             $con -> close();
         }
     }
     
 }
 

 
 
 
 if(isset($_POST['updatebranchinfo'])){
     $firm_altcontact=$_POST['firm_altcontact']; $firm_name=$_POST['firm_name'];
     $firm_address=$_POST['firm_address']; $firm_contact=$_POST['firm_contact'];
     $s=1;

     $q="UPDATE branch_details SET branch_name='$firm_name', branch_address='$firm_address', branch_contact='$firm_contact', branch_alt_contact='$firm_altcontact' WHERE branch_id='$s'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:brances.php?msg=Branch Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['updatepromisedemiday'])){
     $pls_id=$_POST['pls_id']; $c_id=$_POST['c_id'];
     $pls_emiday=$_POST['pls_emiday'];
     
     $q="UPDATE plot_sale_details SET pls_emiday='$pls_emiday' WHERE pls_id='$pls_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:customer_plot_purchased_details.php?c_id=$c_id&pls_id=$pls_id&msg=Date Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['adduserdetails'])){
     $u_role=$_POST['u_role'];
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];$u_altcontact=$_POST['u_altcontact'];
     $u_email=$_POST['u_email'];$u_address=$_POST['u_address']; $u_password=$_POST['u_password']; $cu_password=$_POST['cu_password'];
     
     if($u_password==$cu_password || strlen($u_password)>=6){
     $q="INSERT INTO user_details(u_role,u_name,u_contact,u_altcontact,u_email,u_address,u_password) Values('$u_role','$u_name','$u_contact','$u_altcontact','$u_email','$u_address','$u_password')" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:users.php?msg=New User Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     } }
     else {
         $con->close();
         header("location:users.php?Error=Password Not Matched!");
     }
 }
 
 if(isset($_POST['updatecustomerdetails'])){
     $c_id=$_POST['c_id'];  $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];$u_altcontact=$_POST['u_altcontact'];
     $u_email=$_POST['u_email'];$c_addressone=$_POST['c_addressone'];$c_addresstwo=$_POST['c_addresstwo'];$c_location=$_POST['c_location'];
     $c_city=$_POST['c_city'];$c_pin=$_POST['c_pin'];
     
     $panno=$_POST['panno']; $adharno=$_POST['adharno'];
     
     $q="UPDATE customer_details SET c_name='$u_name',c_contact='$u_contact',c_altcontact='$u_altcontact',c_email='$u_email',
c_addressone='$c_addressone',c_addresstwo='$c_addresstwo',c_location='$c_location',c_city='$c_city',c_pin='$c_pin',
c_panno='$panno',c_adharno='$adharno' WHERE c_id='$c_id'" ;
   
     if ($con->query($q) === TRUE) {         
         $con->close();
        
        header("location:customer_details.php?c_id=$c_id&msg=Customer Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 if(isset($_POST['updaterefrancedetails'])){
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact']; $ppr_id=$_POST['ppr_id'];
     $u_address=$_POST['u_address']; $panno=$_POST['panno'];   $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];
     
     $q="UPDATE plot_purchase_refrences SET ppr_name='$u_name',ppr_contact='$u_contact',
ppr_address='$u_address',ppr_panno='$panno'  WHERE ppr_id='$ppr_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();         
         header("location:plot_purchase_refrance.php?pls_id=$pls_id&c_id=$c_id&msg=Refrence Update Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 if(isset($_POST['addrefrancedetails'])){
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact']; 
     $u_address=$_POST['u_address']; $panno=$_POST['panno'];  $c_id=$_POST['c_id']; $pls_id=$_POST['pls_id'];
   
     $q="INSERT INTO plot_purchase_refrences(ppr_name,ppr_contact,ppr_address,ppr_panno,pls_id,c_id) 
Values('$u_name','$u_contact','$u_address','$panno','$pls_id','$c_id')" ;
    
     if ($con->query($q) === TRUE) {
       
         
         $con->close();
         
        header("location:plot_purchase_refrance.php?pls_id=$pls_id&c_id=$c_id&msg=Refrence Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
    
 
 if(isset($_POST['addinquiryhistory'])){
     $u_id=$_POST['u_id'];  $ci_id=$_POST['ci_id']; 
     $ci_remark=$_POST['ci_remark']; $cic_status=$_POST['cic_status'];
     $ci_visitdate=$_POST['ci_visitdate'];
     $cic_intrestedin=$_POST['cic_intrestedin']; $cic_noofpeoples=$_POST['cic_noofpeoples'];
     $q="INSERT INTO inquiry_contact_details(ci_u_id,ci_id,cic_remark,cic_intrestedin,cic_noofpeoples,cic_dateofvisit,cic_status)
 Values('$u_id','$ci_id','$ci_remark','$cic_intrestedin','$cic_noofpeoples','$ci_visitdate','$cic_status')" ;
     
     if ($con->query($q) === TRUE) {
      
         $qu="UPDATE customer_inquiries SET ci_status='$cic_status' WHERE ci_id='$ci_id'" ;
         if ($conn->query($qu) === TRUE) {
             
             $con->close();     $conn->close();
             header("location:inquiry_details.php?ci_id=$ci_id&msg=Added Successfully!");
     
         }else {
             $conn->close();     $con->close();
             echo "ERROR: Update Faild !!!!!!".$conn->error;
         }
        
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 
 if(isset($_POST['updatevisittime'])){
     $u_id=$_POST['u_id'];  $ci_id=$_POST['ci_id']; $ci_remark="Update From Dashboard"; $cic_status=5;
     $ci_visitdate=$_POST['ci_visitdate'];$cic_timevisit=$_POST['cic_timevisit'];
     $cic_intrestedin=$_POST['cic_intrestedin']; $cic_noofpeoples=$_POST['cic_noofpeoples'];
     
     
     $q="INSERT INTO inquiry_contact_details(ci_u_id,ci_id,cic_remark,cic_intrestedin,cic_noofpeoples,cic_dateofvisit,cic_status,cic_timevisit)
 Values('$u_id','$ci_id','$ci_remark','$cic_intrestedin','$cic_noofpeoples','$ci_visitdate','$cic_status','$cic_timevisit')" ;
     
     if ($con->query($q) === TRUE) {
         
         $qu="UPDATE customer_inquiries SET ci_status='$cic_status' WHERE ci_id='$ci_id'" ;
         if ($conn->query($qu) === TRUE) {
             
             $con->close();     $conn->close();
             header("location:dashboard.php?msg=Updated Successfully!");
             
         }else {
             $conn->close();     $con->close();
             echo "ERROR: Update Faild !!!!!!".$conn->error;
         }
         
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['addinquirydetails'])){
     $u_id=$_POST['u_id'];  $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];
     $u_email=$_POST['u_email'];$c_addressone=$_POST['c_addressone'];$c_remark=$_POST['c_remark']; $ci_refrance=$_POST['ci_refrance'];
     $ci_status=1;
     $q="INSERT INTO customer_inquiries(ci_status,ci_datefirst,u_id,ci_name,ci_contact,ci_email,ci_address,ci_refrance,ci_remark)
 Values('$ci_status','$cdate','$u_id','$u_name','$u_contact','$u_email','$c_addressone','$ci_refrance','$c_remark')" ;
     
     if ($con->query($q) === TRUE) {
         $c_id=$con->insert_id;
         
         $con->close();
         
         header("location:inquiry_details.php?ci_id=$c_id&msg=Added Successfully!");
     }else {
        
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 

 
 
 
 if(isset($_POST['addinquirydetailsinvisit'])){
     $u_id=$_POST['u_id'];  $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];
     $u_email=$_POST['u_email'];$c_addressone=$_POST['c_addressone'];$c_remark=$_POST['c_remark']; $ci_refrance=$_POST['ci_refrance'];
     $ci_status=1;
     $sv_id=$_POST['sv_id'];
    
     
     $q="INSERT INTO customer_inquiries(ci_datefirst,ci_status,u_id,ci_name,ci_contact,ci_email,ci_address,ci_refrance,ci_remark)
 Values('$cdate','$ci_status','$u_id','$u_name','$u_contact','$u_email','$c_addressone','$ci_refrance','$c_remark')" ;
     
     if ($con->query($q) === TRUE) {
         $ci_id=$con->insert_id;
                  $qt="INSERT INTO customers_sitevisits(sv_id,u_id,ci_id) Values('$sv_id','$u_id','$ci_id')" ;
         
         if ($conn->query($qt) === TRUE) {
         $conn->close();
     
         header("location:site_visit_trips.php?sv_id=$sv_id&msg=Added Successfully!");
         }else {
             
             echo "ERROR: Update Faild !!!!!!".$conn->error; $conn->close(); 
         }
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 
 
 if(isset($_POST['addmarketingcalls'])){
     $u_id=$_POST['u_id'];  $u_name=$_POST['mc_name']; $u_contact=$_POST['mc_contact'];$mc_visitdate=$_POST['mc_visitdate'];
     $mc_noof_persons=$_POST['mc_noof_persons'];$c_addressone=$_POST['mc_address'];$c_remark=$_POST['mc_remarks']; $ci_refrance=$_POST['mc_refance'];
     
     $q="INSERT INTO marketing_calls(u_id,mc_date,mc_name,mc_contact,mc_visitdate,mc_noof_persons,mc_address,mc_refance,mc_remarks)
 Values('$u_id','$cdate','$u_name','$u_contact','$mc_visitdate','$mc_noof_persons','$c_addressone','$ci_refrance','$c_remark')" ;
     
     if ($con->query($q) === TRUE) {
         $c_id=$con->insert_id;
         
         $con->close();
         
         header("location:marketing_calls.php?msg=Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 if(isset($_POST['addmarketingtrip'])){
     $u_id=$_POST['u_id'];  $mt_u_id=$_POST['mt_u_id']; $mt_vehicleno=$_POST['mt_vehicleno'];
     $mt_partners=$_POST['mt_partners'];    $mt_openkm=$_POST['mt_openkm'];  
     $mt_closekm=$_POST['mt_closekm'];
     $mt_areacovered=$_POST['mt_areacovered'];
     $mt_remark=$_POST['mt_remark'];
     $mt_outtime=$_POST['mt_outtime'];
     $mt_intime=$_POST['mt_intime'];
     
 $q="INSERT INTO marketing_trips(mt_intime,mt_outtime,u_id,mt_date,mt_name,mt_partners,v_id,mt_openkm,mt_closekm,mt_areacovered,mt_remark)
 Values('$mt_intime','$mt_outtime','$u_id','$cdate','$mt_u_id','$mt_partners','$mt_vehicleno','$mt_openkm','$mt_closekm','$mt_areacovered','$mt_remark')" ;
     
     if ($con->query($q) === TRUE) {
         $mt_id=$con->insert_id;
         $con->close();
         
         header("location:marketing_trips.php?mt_id=$mt_id&msg=Added Successfully Add Inventory Items!");
     }else {
    
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close(); 
     }
 }
 
 
 if(isset($_POST['updatemarketingtrip'])){
     $mt_id=$_POST['mt_id'];  $u_id=$_POST['u_id'];  $mt_u_id=$_POST['mt_u_id']; $mt_vehicleno=$_POST['mt_vehicleno'];
     $mt_partners=$_POST['mt_partners'];    $mt_openkm=$_POST['mt_openkm'];
     $mt_closekm=$_POST['mt_closekm'];
     $mt_areacovered=$_POST['mt_areacovered'];
     $mt_remark=$_POST['mt_remark'];
     $mt_outtime=$_POST['mt_outtime'];
     $mt_intime=$_POST['mt_intime'];
     
     $q="UPDATE marketing_trips SET  mt_intime='$mt_intime',mt_outtime='$mt_outtime',u_id='$u_id',mt_name='$mt_u_id',
mt_partners='$mt_partners',v_id='$mt_vehicleno',mt_openkm='$mt_openkm',mt_closekm='$mt_closekm',mt_areacovered='$mt_areacovered',
mt_remark='$mt_remark' WHERE mt_id='$mt_id'" ;
     
     if ($con->query($q) === TRUE) {
       
         $con->close();
         
         header("location:marketing_trip_details.php?mt_id=$mt_id&msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 
 
 if(isset($_POST['addmarinvetoryitems'])){
     $mt_id=$_POST['mt_id'];  $is_id=$_POST['is_id']; $mti_instockqty=$_POST['mti_instockqty'];
     $mti_usedqty=$_POST['mti_usedqty'];    
     echo $mt_id;
     
     $r=1;
     $qq="SELECT * FROM inventory_stock WHERE is_id='$is_id' ";
     
     
     $queryq=mysqli_query($con,$qq);
     $resq=mysqli_fetch_array($queryq);
         
     if($mti_instockqty<=$resq['is_qty']){
         
         if($mti_instockqty>=$mti_usedqty){
     
     $q="INSERT INTO marketing_trip_inventory(mt_id,is_id,mti_instockqty,mti_usedqty)
 Values('$mt_id','$is_id','$mti_instockqty','$mti_usedqty')" ;
     
     if ($con->query($q) === TRUE) {
         
         $qt="UPDATE inventory_stock SET is_qty=is_qty-'$mti_usedqty' WHERE is_id='$is_id'" ;
         
         if ($conn->query($qt) === TRUE) {
         
         
             $conn->close();         $con->close(); 
         
         header("location:marketing_trips.php?mt_id=$mt_id&msg=Added Successfully!");
         }else {
   
             echo "ERROR: Update Faild !!!!!!".$conn->error;
             $conn->close();         $con->close(); 
         }
     }else {
       
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close(); 
     }
     
     }
     else{
         header("location:marketing_trips.php?mt_id=$mt_id&Error=Wrong value for Used Stock Quntity, It must be less than In Stock Quentity");
     }
     
     
     }
     else{
         header("location:marketing_trips.php?mt_id=$mt_id&Error=Wrong value for In Stock Quntity, It must be less than Stock Quentity");
     }
     
     
 }
 
 
 if(isset($_POST['updateinquirydetails'])){
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];
     $u_email=$_POST['u_email'];$c_addressone=$_POST['c_addressone'];$c_remark=$_POST['c_remark']; 
     $ci_refrance=$_POST['ci_refrance'];
     $ci_id=$_POST['ci_id']; 
     
     $q="UPDATE customer_inquiries SET  ci_name='$u_name', ci_contact='$u_contact', ci_altcontact='$u_altcontact', 
ci_email='$u_email', ci_refrance='$ci_refrance', ci_address='$c_addressone',ci_remark='$c_remark' WHERE ci_id='$ci_id'" ;
     
     if ($con->query($q) === TRUE) {
         $c_id=$con->insert_id;
         
         $con->close();
         
         header("location:inquiry_details.php?ci_id=$ci_id&msg=Updated Successfully!");
     }else {
   
         echo "ERROR: Update Faild !!!!!!".$con->error;  $con->close();
     }
 }
 
 
 
 if(isset($_POST['updateplothandoverincppd'])){
     $pls_dochandover_u_id=$_POST['pls_dochandover_u_id'];  $pls_dochandover_remark=$_POST['pls_dochandover_remark']; $pls_dochandover_date=$_POST['pls_dochandover_date'];
     $u_email=$_POST['u_email'];$pls_id=$_POST['pls_id'];  $pls_dochandover_status=$_POST['pls_dochandover_status'];
     $c_id=$_POST['c_id'];
     
     $q="UPDATE plot_sale_details SET pls_dochandover_u_id='$pls_dochandover_u_id', pls_dochandover_remark='$pls_dochandover_remark', pls_dochandover_date='$pls_dochandover_date',
pls_dochandover_status='$pls_dochandover_status' WHERE pls_id='$pls_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:customer_plot_purchased_details.php?c_id=$c_id&pls_id=$pls_id&msg=Updated Successfully!");
     }else {
       
         echo "ERROR: Update Faild !!!!!!".$con->error;  $con->close();
     }
 }
 
 
 if(isset($_POST['updatesitevisitlist'])){
     $sv_id=$_POST['sv_id'];  $csv_remark=$_POST['csv_remark']; $csv_feedback=$_POST['csv_feedback'];
     $csv_tokenstatus=$_POST['csv_tokenstatus'];  $csv_tokenmsg=$_POST['csv_tokenmsg'];
     $csv_id=$_POST['csv_id'];$csv_tokenarea=$_POST['csv_tokenarea'];
     $csv_noofpe=$_POST['csv_noofpe'];

     
     $q="UPDATE customers_sitevisits SET csv_tokenarea='$csv_tokenarea',csv_feedback='$csv_feedback',csv_noofpe='$csv_noofpe', csv_remark='$csv_remark', csv_tokenmsg='$csv_tokenmsg', csv_tokenstatus='$csv_tokenstatus' WHERE csv_id='$csv_id'" ;
     
     if ($con->query($q) === TRUE) {
        

         $con->close();
         
        header("location:site_visit_trips.php?sv_id=$sv_id&msg=Updated Successfully!");
     }else {
      
         echo "ERROR: Update Faild !!!!!!".$con->error;   $con->close();
     }
 }
 
 
 
 if(isset($_POST['finalsubmitsitevisitform'])){
     $sv_id=$_POST['sv_id'];  $sv_date=$_POST['sv_date']; $sv_driver=$_POST['sv_driver'];
     $v_id=$_POST['v_id'];  $sv_mobileno=$_POST['sv_mobileno'];
     $sv_timeout=$_POST['sv_timeout'];  $sv_timein=$_POST['sv_timein']; 
     $sv_kmsout=$_POST['sv_kmsout'];  $sv_kmsin=$_POST['sv_kmsin'];
     $sv_remark=$_POST['sv_remark'];  $sv_assistby=$_POST['sv_assistby'];
   

     
     
     
     $q="UPDATE sitevisit_details SET sv_date='$sv_date', sv_driver='$sv_driver', v_id='$v_id', 
sv_mobileno='$sv_mobileno',sv_timeout='$sv_timeout', sv_timein='$sv_timein', 
sv_kmsout='$sv_kmsout',sv_kmsin='$sv_kmsin', sv_assistby='$sv_assistby',sv_remark='$sv_remark'
 WHERE sv_id='$sv_id'" ;
     
     if ($con->query($q) === TRUE) {
         
         
         $con->close();
         
         header("location:print_sitevisit.php?sv_id=$sv_id&msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;   $con->close();
     }
 }
 
 
 
 if(isset($_POST['purchasebackplotsfinal'])){
     $c_name=$_POST['c_name']; $u_contact=$_POST['u_contact'];$u_altcontact=$_POST['u_altcontact'];
     $ph_id=$_POST['ph_id'];  $pl_id=$_POST['pl_id']; $u_id=$_POST['u_id'];
     $c_id=0;
     $q="INSERT INTO customer_details(c_name,c_contact,c_altcontact) Values('$c_name','$u_contact','$u_altcontact')" ;
     
     if ($con->query($q) === TRUE) {
         $c_id=$con->insert_id;
         
           
             $pls_plot_no=$_POST['pls_plot_no']; $pls_plot_size=$_POST['pls_plot_size'];
             $pls_price_persqft=$_POST['pls_price_persqft'];
             $pls_totalprice=$_POST['pls_totalprice'];
             $pls_scheme_count=$_POST['pls_scheme_count']; $pls_actual_totalprice=$_POST['pls_totalprice'];
             $pls_sceme_startdate=$_POST['pls_sceme_startdate'];
             
             
             function add_months($months, DateTime $dateObject)
             {
                 $next = new DateTime($dateObject->format('Y-m-d'));
                 $next->modify('last day of +'.$months.' month');
                 
                 if($dateObject->format('d') > $next->format('d')) {
                     return $dateObject->diff($next);
                 } else {
                     return new DateInterval('P'.$months.'M');
                 }
             }
             
             function endCycle($d1, $months)
             {
                 $date = new DateTime($d1);
                 
                 // call second function to add the months
                 $newDate = $date->add(add_months($months, $date));
                 
                 // goes back 1 day from date, remove if you want same day of month
                 $newDate->sub(new DateInterval('P1D'));
                 
                 //formats final date to Y-m-d form
                 $dateReturned = $newDate->format('Y-m-d');
                 
                 return $dateReturned;
             }
             
             $pls_scheme_enddate = endCycle($pls_sceme_startdate, $pls_scheme_count);
             echo $pls_scheme_enddate;
             
             $pls_remarkone=$_POST['pls_remarkone'];
             $u=3;
             $q="INSERT INTO plot_sale_details (c_id,u_id,pls_plot_no,ph_id,pls_plot_size, pls_totalprice,pls_price_persqft,pls_scheme_count, pls_sceme_startdate, pls_scheme_enddate,pls_remarkone,pls_status) 
             VALUES ('$c_id','$u_id','$pls_plot_no','$ph_id','$pls_plot_size','$pls_totalprice','$pls_price_persqft','$pls_scheme_count','$pls_sceme_startdate','$pls_scheme_enddate','$pls_remarkone','$u')" ;
             if ($connn->query($q) === TRUE) {
           
                $pls_id=$connn->insert_id;
                 $cpay_date=$_POST['pls_sceme_startdate']; $cpay_type=$_POST['cpay_type'];
                 $cpay_amount=$_POST['cpay_amount']; $cpay_mode=$_POST['cpay_mode'];
                 $cpay_remark=$_POST['pls_remarkone'];  $cchq_chqno=$_POST['cchq_chqno'];
                 $cchq_date="0000-00-00";
                 if($_POST['cchq_date']!=null){
                     $cchq_date=$_POST['cchq_date']; }
                     $cchq_bankname=$_POST['cchq_bankname']; $cchq_branch=$_POST['cchq_branch'];
                     $crcp_old_rcno=$cpay_old_receiptno=$_POST['cpay_old_receiptno'];
                     $crcp_new_rno=0;
           $qq="INSERT INTO customers_payreceipts(crcp_new_rno,c_id,pls_id,u_id,crcp_date,crcp_old_rcno,crcp_totalamount,crcp_remark) VALUES
('$crcp_new_rno','$c_id','$pls_id','$u_id','$cpay_date','$crcp_old_rcno','$cpay_amount','$cpay_remark')";
                     
                     
                     if ($conn->query($qq) === TRUE) {
                         $crcp_id=$conn->insert_id;
                         
                         $l=1; $p=2;
                     
           
    $qe="INSERT INTO customers_payments(cpay_status,cpay_chq_status,c_id,crcp_id,pls_id,u_id,cpay_date,cpay_type,cpay_old_receiptno,cpay_amount,cpay_mode,cpay_remark,cpay_chqno,cpay_chq_date,cpay_bankname,cpay_branch)
 VALUES ('$l','$p','$c_id','$crcp_id','$pls_id','$u_id','$cpay_date','$cpay_type','$cpay_old_receiptno','$cpay_amount','$cpay_mode','$cpay_remark','$cchq_chqno','$cchq_date','$cchq_bankname','$cchq_branch')";
                         
                         if ($conn->query($qe) === TRUE) {
                             
$qt="INSERT INTO plots_purchased_list (pls_id,u_id,c_id,pl_id,ph_id,ppl_plot_no) 
VALUES ('$pls_id','$u_id','$c_id','$pl_id','$ph_id','$pls_plot_no')";
                             if ($con->query($qt) === TRUE) {
  header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Added Succesfully!");
                             }else {
                                 echo "ERROR: Submit Faild !!!!!!".$conn->error;
                                 $conn->close();
                             }}else {
                             
                             echo "ERROR: Submit Faild !!!!!!".$conn->error;
                             $conn->close();
                         }}else {
                             
                             echo "ERROR: Submit Faild !!!!!!".$conn->error;
                             $conn->close();
                         }
                         $con->close();$conn->close();$connn->close();
                         
                         
             }else {
                 $conn->close();
                 echo "ERROR: Submit Faild !!!!!!".$con->error;
             }
             
       
         
         
         
       
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 
 
 
 
 
 if(isset($_POST['addcustomerdetails'])){
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];$u_altcontact=$_POST['u_altcontact'];
     $u_email=$_POST['u_email'];$c_addressone=$_POST['c_addressone'];$c_addresstwo=$_POST['c_addresstwo'];$c_location=$_POST['c_location'];
     $c_city=$_POST['c_city'];$c_pin=$_POST['c_pin'];$panno=$_POST['panno']; $adharno=$_POST['adharno'];
     
     $c_id=0;
     $q="INSERT INTO customer_details(c_name,c_contact,c_altcontact,c_email,c_addressone,c_addresstwo,c_location,c_city,c_pin,c_panno,c_adharno)
 Values('$u_name','$u_contact','$u_altcontact','$u_email','$c_addressone','$c_addresstwo','$c_location','$c_city','$c_pin','$panno','$adharno')" ;
     
     if ($con->query($q) === TRUE) {
        $c_id=$con->insert_id;
         
         $con->close();
         
         header("location:customer_details.php?c_id=$c_id&msg=Customer Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     }
 }
 
 
 
 if(isset($_POST['updateuserdetails'])){
     $u_role=$_POST['u_role']; $u_id=$_POST['u_id'];
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];$u_altcontact=$_POST['u_altcontact'];
     $u_email=$_POST['u_email'];$u_address=$_POST['u_address']; $u_password=$_POST['u_password']; $cu_password=$_POST['cu_password'];
     
     if($u_password==$cu_password){
     $q="UPDATE user_details SET u_role='$u_role', u_name='$u_name', u_contact='$u_contact', u_altcontact='$u_altcontact', u_email='$u_email', u_password='$u_password', u_address='$u_address' WHERE u_id='$u_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:users.php?u_id=$u_id&msg=User Updated Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
     } }
     else {
         $con->close();
         header("location:users.php?u_id=$u_id&Error=Password Not Matched!");
     }
 }
 if(isset($_POST['updateuserprofile'])){
      $u_id=$_POST['u_id'];
     $u_name=$_POST['u_name']; $u_contact=$_POST['u_contact'];$u_altcontact=$_POST['u_altcontact'];
     $u_email=$_POST['u_email'];$u_address=$_POST['u_address']; $u_password=$_POST['u_password']; $cu_password=$_POST['cu_password'];
     
     if($u_password==$cu_password){
         $q="UPDATE user_details SET  u_name='$u_name', u_contact='$u_contact', u_altcontact='$u_altcontact', u_email='$u_email', u_password='$u_password', u_address='$u_address' WHERE u_id='$u_id'" ;
         
         if ($con->query($q) === TRUE) {
             $con->close();
             
             header("location:profile.php?u_id=$u_id&msg=Profile Updated Successfully!");
         }else {
             $con->close();
             echo "ERROR: Update Faild !!!!!!".$con->error;
         } }
         else {
             $con->close();
             header("location:users.php?u_id=$u_id&Error=Password Not Matched!");
         }
 }
 
 if(isset($_POST['updatefirminfo'])){
     $firm_owner_name=$_POST['firm_owner_name']; $firm_name=$_POST['firm_name'];
     $firm_address=$_POST['firm_address']; $firm_contact=$_POST['firm_contact'];$firm_altcontact=$_POST['firm_altcontact'];
     $s=1;
     $firm_gstno=$_POST['firm_gstno']; $firm_website=$_POST['firm_website'];
     $firm_email=$_POST['firm_email']; 
     $q="UPDATE firm_details SET firm_owner_name='$firm_owner_name', firm_name='$firm_name', firm_altcontact='$firm_altcontact', firm_address='$firm_address', firm_contact='$firm_contact', firm_altcontact='$firm_altcontact', firm_gstno='$firm_gstno', firm_email='$firm_email', firm_website='$firm_website' WHERE firm_id='$s'" ;
   
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:firm.php?msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }

 if(isset($_POST['addemployeeinfo'])){
     $emp_post=$_POST['emp_post'];  $emp_name=$_POST['emp_name'];   $emp_contact=$_POST['emp_contact'];  $emp_altcontact=$_POST['emp_altcontact'];
     $emp_email=$_POST['emp_email'];   $emp_address=$_POST['emp_address'];  $emp_homecontact=$_POST['emp_homecontact'];
     $emp_dob=$_POST['emp_dob'];   $emp_pan=$_POST['emp_pan'];  $emp_adharcard=$_POST['emp_adharcard'];
     $emp_joiningdate=$_POST['emp_joiningdate']; 
     
     $q="INSERT INTO employees_details(emp_post,emp_joiningdate,emp_name,emp_contact,emp_altcontact,emp_homecontact,emp_address,emp_email,emp_adharcard,emp_pan,emp_dob)
Values('$emp_post','$emp_joiningdate','$emp_name','$emp_contact','$emp_altcontact','$emp_homecontact','$emp_address','$emp_email','$emp_adharcard','$emp_pan','$emp_dob')" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:employees.php?msg=Added Successfully!");
     }else {
        
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 
 
 if(isset($_POST['updateemployeeinfo'])){
     $emp_post=$_POST['emp_post'];  $emp_name=$_POST['emp_name'];   $emp_contact=$_POST['emp_contact']; 
     $emp_altcontact=$_POST['emp_altcontact'];$emp_id=$_POST['emp_id'];  
     $emp_email=$_POST['emp_email'];   $emp_address=$_POST['emp_address'];  $emp_homecontact=$_POST['emp_homecontact'];
     $emp_dob=$_POST['emp_dob'];   $emp_pan=$_POST['emp_pan'];  $emp_adharcard=$_POST['emp_adharcard'];
     $emp_joiningdate=$_POST['emp_joiningdate'];
     
     $q="UPDATE employees_details SET emp_post='$emp_post',  emp_name='$emp_name', emp_contact='$emp_contact',   emp_altcontact='$emp_altcontact', emp_email='$emp_email',
  emp_address='$emp_address', emp_homecontact='$emp_homecontact', emp_dob='$emp_dob',emp_joiningdate='$emp_joiningdate', emp_adharcard='$emp_adharcard', emp_pan='$emp_pan' WHERE emp_id='$emp_id'" ;
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:employees_details.php?emp_id=$emp_id&msg=Updated Successfully!");
     }else {
        
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 

 if(isset($_POST['addexpences'])){
     $ec_id=$_POST['ec_id'];  $u_id=$_POST['u_id'];   $exp_name=$_POST['exp_name']; 
     $exp_bank=$_POST['exp_bank'];
     $exp_chq_date='0000-00-00'; if(isset($_POST['exp_chq_date'])){
         $exp_chq_date=$_POST['exp_chq_date'];   }
     $exp_date=$_POST['exp_date'];   $exp_amount=$_POST['exp_amount'];  $exp_pay_details=$_POST['exp_pay_details'];
     $exp_note=$_POST['exp_note'];   $exp_for=$_POST['exp_for'];  $exp_mode=$_POST['exp_mode'];
     
     $q="INSERT INTO expence_details(ec_id,u_id,exp_name,exp_date,exp_amount,exp_mode,exp_pay_details,exp_for,exp_note,exp_bank,exp_chq_date) 
Values('$ec_id','$u_id','$exp_name','$exp_date','$exp_amount','$exp_mode','$exp_pay_details','$exp_for','$exp_note','$exp_bank','$exp_chq_date')" ;
     
    if ($con->query($q) === TRUE) {
     $con->close();
         
         header("location:expences_list.php?msg=Added Successfully!");
     }else {
         $con->close();
         echo "ERROR: Update Faild !!!!!!".$con->error;
         
         
         
     }
 }
 
 
 if(isset($_POST['addexpences'])){
     $ec_id=$_POST['ec_id'];  $u_id=$_POST['u_id'];   $exp_name=$_POST['exp_name'];
     $exp_bank=$_POST['exp_bank'];
     $exp_chq_date='0000-00-00'; if(isset($_POST['exp_chq_date'])){
         $exp_chq_date=$_POST['exp_chq_date'];   }
         $exp_date=$_POST['exp_date'];   $exp_amount=$_POST['exp_amount'];  $exp_pay_details=$_POST['exp_pay_details'];
         $exp_note=$_POST['exp_note'];   $exp_for=$_POST['exp_for'];  $exp_mode=$_POST['exp_mode'];
         
         $q="INSERT INTO expence_details(ec_id,u_id,exp_name,exp_date,exp_amount,exp_mode,exp_pay_details,exp_for,exp_note,exp_bank,exp_chq_date)
Values('$ec_id','$u_id','$exp_name','$exp_date','$exp_amount','$exp_mode','$exp_pay_details','$exp_for','$exp_note','$exp_bank','$exp_chq_date')" ;
         
         if ($con->query($q) === TRUE) {
             $con->close();
             
             header("location:expences_list.php?msg=Added Successfully!");
         }else {
             $con->close();
             echo "ERROR: Update Faild !!!!!!".$con->error;
             
             
             
         }
 }
 
 
 
 if(isset($_POST['updateexpences'])){
     $exp_id=$_POST['exp_id'];  $ec_id=$_POST['ec_id'];  $u_id=$_POST['u_id'];   $exp_name=$_POST['exp_name'];
     $exp_bank=$_POST['exp_bank'];
     $cpay_chq_date_start=$cpay_chq_date_end=null;
     if(isset($_POST['cpay_chq_date_start'])){ 
         $cpay_chq_date_start=$_POST['cpay_chq_date_start'];
         $cpay_chq_date_end=$_POST['cpay_chq_date_end'];
     }
     $exp_chq_date='0000-00-00'; if(isset($_POST['exp_chq_date'])){
         $exp_chq_date=$_POST['exp_chq_date'];   }
         $exp_date=$_POST['exp_date'];   $exp_amount=$_POST['exp_amount'];  $exp_pay_details=$_POST['exp_pay_details'];
         $exp_note=$_POST['exp_note'];   $exp_for=$_POST['exp_for'];  $exp_mode=$_POST['exp_mode'];
         
         $q="UPDATE expence_details SET ec_id='$ec_id',u_id='$u_id',exp_name='$exp_name',exp_date='$exp_date',
exp_amount='$exp_amount',exp_mode='$exp_mode',exp_pay_details='$exp_pay_details',exp_for='$exp_for',exp_note='$exp_note',
exp_bank='$exp_bank',exp_chq_date='$exp_chq_date' WHERE  exp_id='$exp_id'" ;
         
         if ($con->query($q) === TRUE) {
             $con->close();
             
             if(isset($_POST['cpay_chq_date_start'])){   
                 header("location:expences_list.php?msg=Updated Successfully!&cpay_chq_date_start=$cpay_chq_date_start&cpay_chq_date_end=$cpay_chq_date_end"); }
             else { header("location:expences_list.php?msg=Updated Successfully!");  } 
         
         
         }else {
             $con->close();
             echo "ERROR: Update Faild !!!!!!".$con->error;
         }
 }
 
 
 if(isset($_POST['addfaqs'])){
     $faqc_id=$_POST['faqc_id'];  $faq_question=$_POST['faq_question'];   $exp_name=$_POST['faq_answer'];

  $q="INSERT INTO faq_details(faqc_id,faq_question,faq_answer)
Values('$faqc_id','$faq_question','$exp_name')" ;
         
         if ($con->query($q) === TRUE) {
             $con->close();             
             header("location:faqs_list.php?msg=Added Successfully!");
         }else {
             $con->close();
             echo "ERROR: Update Faild !!!!!!".$con->error;
       }
 }
 
 if(isset($_POST['updatefaqs'])){
     $exp_id=$_POST['faq_id'];  $faqc_id=$_POST['faqc_id'];  $u_id=$_POST['faq_question'];   $exp_name=$_POST['faq_answer'];
  
     $q="UPDATE faq_details SET faqc_id='$faqc_id',faq_question='$u_id',faq_answer='$exp_name'
 WHERE  faq_id='$exp_id'" ;
         
         if ($con->query($q) === TRUE) {
             $con->close();
        header("location:faqs_list.php?msg=Updated Successfully!");  
         }else {
             $con->close();
             echo "ERROR: Update Faild !!!!!!".$con->error;
         }
         
 }
 
 
 if(isset($_POST['addexcategories'])){
      $ec_name=$_POST['ec_name'];
     $ec_remarks=$_POST['ec_remarks'];
     $q="INSERT INTO expence_catagories(ec_name,ec_remarks) Values('$ec_name','$ec_remarks')" ;
     
     if ($con->query($q) === TRUE) {
         
         
         $con->close();
         
         header("location:expences_categories.php?msg=Category Added Successfully!");
     }else {

         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 if(isset($_POST['addfaqcategories'])){
     $ec_name=$_POST['ec_name'];
     $ec_remarks=$_POST['ec_remarks'];
     $q="INSERT INTO faq_categories(faqc_name,faqc_remark) Values('$ec_name','$ec_remarks')";
     
     if ($con->query($q) === TRUE) {
         
         
         $con->close();
         
         header("location:faqs_categories.php?msg=Category Added Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 
 
 if(isset($_POST['addbankl'])){
     $ec_name=$_POST['ec_name'];
   
     $q="INSERT INTO bank_list(b_name) Values('$ec_name')";
     
     if ($con->query($q) === TRUE) {
         
         
         $con->close();
         
         header("location:banks_list.php?msg=Added Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 
 if(isset($_POST['addangency'])){
     $ec_name=$_POST['ec_name'];
     $fa_mno=$_POST['fa_mno'];
     $q="INSERT INTO field_verification_agencies(fa_name,fa_mno) Values('$ec_name','$fa_mno')";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         header("location:field_agencies_list.php?msg=Added Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 if (isset($_POST['addworkassign'])) {
     
     $u_id=$_POST['u_id']; $by_u_id=$_POST['by_u_id'];
     $w_assigndate=$_POST['w_assigndate'];
     $w_title=$_POST['w_title'];
     $w_description=$_POST['w_description'];
     $empatt_status=$_POST['w_status'];
     
$q="INSERT INTO work_assignments(u_id,by_u_id,w_assigndate,w_title,w_description,w_status)
VALUES ('$u_id','$by_u_id','$w_assigndate','$w_title','$w_description','$empatt_status')";
     
     if ($conn->query($q) === TRUE) {
         $conn->close();
         header("location:assignments.php?msg=Assigned Successfully !");
     } else {
         
         echo "Error: " . $q . "<br>" . $con->error;
         $conn -> close();
     }
     
 }
 
 if (isset($_POST['updateworkassign'])) {
     
     $w_id=$_POST['w_id']; 
   $w_completed=$_POST['w_completed'];
     $w_completedold=$_POST['w_completedold'];
     $empatt_status=$_POST['w_status'];
     $u_name=$_POST['u_name'];
     
     $w_completed= date("d/m/Y H:i")." By:".$u_name." :".$w_completed.", <br>".$w_completedold;
     
     $q="UPDATE work_assignments SET w_completed='$w_completed', w_status='$empatt_status' WHERE w_id='$w_id'";
     
     if ($conn->query($q) === TRUE) {
         $conn->close();
         header("location:assignments.php?msg=Updated Successfully !");
     } else {
         
         echo "Error: " . $q . "<br>" . $con->error;
         $conn -> close();
     }
     
 }
 
 
 
 if(isset($_POST['addinvntorycategories'])){
     $icat_name=$_POST['icat_name'];
    
     $q="INSERT INTO vehicles_details(v_no) 
Values('$icat_name')" ;
     
     if ($con->query($q) === TRUE) {
         
         
         $con->close();
         
         header("location:add_vehicles.php?msg=Added Successfully!");
     }else {
 
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 
 if(isset($_POST['addinvenstock'])){
     $is_vendor=$_POST['is_vendor'];
     $u_id=$_POST['u_id'];
     $is_name=$_POST['is_name'];
     $is_qty=$_POST['is_qty'];   $is_note=$_POST['is_note'];
     $q="INSERT INTO inventory_stock(is_vendor,u_id,is_date,is_name,is_qty,is_note)
Values('$is_vendor','$u_id','$cdate','$is_name','$is_qty','$is_note')";
     
 if ($con->query($q) === TRUE) {
 $con->close();
 
    
     
     header("location:inventory.php?msg=Added Successfully!");

      
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 
 
 
 
 if(isset($_POST['updateinventorycate'])){
     $icat_id=$_POST['icat_id'];  $icat_name=$_POST['icat_name'];
     $icat_remark=$_POST['icat_remark'];
     $icat_used=$_POST['icat_used'];
     $icat_qty=$_POST['icat_qty'];
     $q="UPDATE inventory_categories SET icat_name='$icat_name', icat_remark='$icat_remark',icat_used='$icat_used', icat_qty='$icat_qty'
 WHERE icat_id='$icat_id'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:inventory_category.php?msg=Updated Successfully!");
     }else {
        
         echo "ERROR: Update Faild !!!!!!".$con->error; $con->close();
     }
 }
 
 if(isset($_POST['addempattendance'])){
     $u_id=$_POST['u_id']; 
     $emp_id=$_POST['emp_id'];     
    $empatt_remark=$_POST['empatt_remark'];
    echo $timestamp;
     $q="INSERT INTO emp_attendence(emp_id,u_id,empatt_remark,empatt_in) Values('$emp_id','$u_id','$empatt_remark','$timestamp')";
     
     if ($con->query($q) === TRUE) {
               
         $con->close();
         
         header("location:employee_attendence.php?msg=Added Successfully!");
     }else {
     
         echo "ERROR: Update Faild !!!!!!". $con->close();;
         $con->close();
     }
 }
 
 

 
 
 if(isset($_POST['attendenceout'])){
    
     $empatt_id=$_POST['empatt_id'];
     $empatt_in=$_POST['empatt_in'];
     $empatt_remark=$_POST['empatt_remark'];
     $empatt_out=$timestamp;
     $indate=date('Y-m-d',strtotime($empatt_in));
     echo $indate;
     $upempatt_remark=null;
     if($cdate>$indate){
         $upempatt_remark=$empatt_remark." ".$_POST['upempatt_remark']." Out Updated At :".$timestamp;
         $empatt_out=$empatt_in;
     }
     else{
         $upempatt_remark=$empatt_remark." ".$_POST['upempatt_remark'];
         echo date('Y-m-d',$empatt_in);
     }
     $s=2;
      $q="UPDATE emp_attendence SET empatt_out='$timestamp', empatt_remark='$upempatt_remark',
 empatt_out='$empatt_out', empatt_remark='$upempatt_remark',empatt_status='$s' WHERE empatt_id='$empatt_id'";
     
     if ($con->query($q) === TRUE) {
         
         $con->close();
         
       header("location:employee_attendence.php?msg=Updated Successfully!");
     }else {
     
         echo "ERROR: Update Faild !!!!!!". $con->close();;
         $con->close();
     }
 }
 
 if(isset($_POST['updateexcategories'])){
     $ec_id=$_POST['ec_id']; $ec_name=$_POST['ec_name'];
     $ec_remarks=$_POST['ec_remarks'];
     $q="UPDATE expence_catagories SET ec_name='$ec_name', ec_remarks='$ec_remarks' WHERE ec_id='$ec_id'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:expences_categories.php?msg=Updated Successfully!");
     }else {
      
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 if(isset($_POST['updatebankl'])){
     $ec_id=$_POST['ec_id']; $ec_name=$_POST['ec_name'];

     $q="UPDATE bank_list SET b_name='$ec_name' WHERE b_id='$ec_id'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:banks_list.php?msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 if(isset($_POST['updateagency'])){
     $ec_id=$_POST['ec_id']; $ec_name=$_POST['ec_name']; $fa_mno=$_POST['fa_mno'];
     
     $q="UPDATE field_verification_agencies SET fa_name='$ec_name',fa_mno='$fa_mno' WHERE fa_id='$ec_id'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:field_agencies_list.php?msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 
 if(isset($_POST['updatefaqcategories'])){
     $ec_id=$_POST['ec_id']; $ec_name=$_POST['ec_name'];
     $ec_remarks=$_POST['ec_remarks'];
     $q="UPDATE faq_categories SET faqc_name='$ec_name', faqc_remark='$ec_remarks' WHERE faqc_id='$ec_id'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:faqs_categories.php?msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 if(isset($_GET['upate_inquiries_contact'])){
     $ec_id=$_GET['upate_inquiries_contact']; $ec_name=$_GET['wsv_id'];

     $q="UPDATE inquiries_contact SET ic_status='$ec_id' WHERE ic_id='$ec_name'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:contact_inquiries_list.php?msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 
 if(isset($_GET['upate_learningapp'])){
     $ec_id=$_GET['upate_learningapp']; $ec_name=$_GET['wsv_id'];     
     $q="UPDATE learning_application SET la_status='$ec_id' WHERE la_id='$ec_name'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:learning_applications.php?msg=Updated Successfully!");
     }else {
         
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }
 
 if(isset($_POST['plsupdateremark'])){
     $u_name=$_POST['u_name'];      
     $cda=date('d-m-Y');
     $pls_id=$_POST['pls_id']; $c_id=$_POST['c_id'];
     $pls_remarkone=$_POST['pls_remarkone'];     $pls_remarktwo=$_POST['pls_remarktwo'];
     $pre_pls_remarkone=$_POST['pre_pls_remarkone'];     $pre_pls_remarktwo=$_POST['pre_pls_remarktwo'];
    
     if($pls_remarkone!=null){
     $pls_remarkone="<br><b>".$cda."</b> - ".$u_name." - ".$pls_remarkone.", ".$pre_pls_remarkone;
     }else{
         $pls_remarkone=$pre_pls_remarkone;
     }
     if($pls_remarktwo!=null){
     $pls_remarktwo="<br><b>".$cda."</b> - ".$u_name." - ".$pls_remarktwo.", ".$pre_pls_remarktwo;
     }else{
         $pls_remarktwo=$pre_pls_remarktwo;
         
     }
     
     $q="UPDATE plot_sale_details SET pls_remarkone='$pls_remarkone', pls_remarktwo='$pls_remarktwo' WHERE pls_id='$pls_id'";
     
     if ($con->query($q) === TRUE) {
         $con->close();
         
         header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Updated Successfully!");
     }else {
        
         echo "ERROR: Update Faild !!!!!!".$con->error;
         $con->close();
     }
 }

 
 if(isset($_POST['updateplotstatusincppd'])){
 
     $pls_id=$_POST['pls_id']; $c_id=$_POST['c_id'];
   
     $pls_status=$_POST['pls_status']; 
     $sta=null;
     if($pls_status==1){ $sta="On Going"; } 
     if($pls_status==3){ $sta="Canceled"; } 
     if($pls_status==2){ $sta="Completed"; } 
     
     $u_name=$_POST['u_name'];
     $cda=date('d-m-Y');
     $pre_pls_statuschange=$_POST['pre_pls_statuschange'];      $pls_statuschange=$_POST['pls_statuschange'];
     
     if($pls_statuschange!=null){
         $pls_statuschange="<br><b>".$cda."</b> (".$sta.") - ".$u_name." - ".$pls_statuschange.", ".$pre_pls_statuschange;
     }else{
         $pls_statuschange=$pre_pls_statuschange;
         
     }
  
     $q="SELECT * FROM plots_purchased_list as p INNER JOIN plots_details as pl ON p.pl_id=pl.pl_id WHERE p.pls_id='$pls_id'";
     $qur=mysqli_query($connn,$q);
     while ($res=mysqli_fetch_array($qur)) { 
         $pl_id=$res['pl_id'];
         $ppl_id=$res['ppl_id'];
         $qy="UPDATE plots_details SET pl_status='$pls_status' WHERE pl_id='$pl_id'";
     $con->query($qy);
     if($pls_status==3){
     $qt="UPDATE plots_purchased_list SET ppl_status='$pls_status' WHERE ppl_id='$ppl_id' ";
     $conn->query($qt);
     }else{
     $qt="UPDATE plots_purchased_list SET ppl_status='$pls_status' WHERE ppl_id='$ppl_id' ";
     $conn->query($qt);
     }
     
     
     
  }
         
         $qn="UPDATE plot_sale_details SET pls_status='$pls_status', pls_statuschange='$pls_statuschange' WHERE pls_id='$pls_id'";
         
         if ($conn->query($qn) === TRUE) {
         
             $con->close();         $conn->close();
         
         header("location:customer_plot_purchased_details.php?pls_id=$pls_id&c_id=$c_id&msg=Updated Successfully!");
     }else {
      
         echo "ERROR: Update Faild !!!!!!".$conn->error;
         $con->close();         $conn->close();
     
     }

 }
 
 
 
 
 
 if(isset($_POST['createstevisitform'])){
     $v_id=$_POST['v_id'];  $u_id=$_POST['u_id'];
     $sv_date=$_POST['sv_date'];  $sv_driver=$_POST['sv_driver'];
     $sv_mobileno=$_POST['sv_mobileno'];  $sv_timeout=$_POST['sv_timeout'];
     $sv_kmsout=$_POST['sv_kmsout'];
         
         $qt="INSERT INTO sitevisit_details(u_id,sv_date,v_id,sv_driver,sv_mobileno,sv_timeout,sv_kmsout) 
VALUES ('$u_id','$sv_date','$v_id','$sv_driver','$sv_mobileno','$sv_timeout','$sv_kmsout')";
         
         if ($con->query($qt) === TRUE) {
             $sv_id=$con->insert_id;
             $con->close();
             header("location:site_visit_trips.php?sv_id=$sv_id&msg=Added Succesfully!");
             
         }else {
             
             echo "ERROR: Submit Faild !!!!!!".$con->error;
             $con->close();
         }
         
    
 }

 
 if(isset($_GET['addsitevisitcust'])){
     $ci_id=$_GET['ci_id'];  $u_id=$_GET['u_id'];
 $y="0";
 $sv_id=$_GET['sv_id'];
 
    
 $qu="INSERT INTO customers_sitevisits(u_id,ci_id,sv_id) VALUES ('$u_id','$ci_id','$sv_id')";
         
         if ($conn->query($qu) === TRUE) {
             
             $conn->close();
          
             header("location:site_visit_trips.php?sv_id=$sv_id&msg=Added Succesfully!");
         }else {
             
             echo "ERROR: Submit Faild !!!!!!".$conn->error;
             $conn->close();
         }
 }
 
 if(isset($_GET['adddepositcash'])){
     $pca_u_id=$_GET['pcd_u_id'];  $u_id=$_GET['u_id'];
     
     $pca_date=$_GET['pcd_date'];    $pca_amount=$_GET['pcd_amount'];    $pca_remark=$_GET['pcd_remark'];
     
     
     $qu="INSERT INTO payments_cash_deposit(u_id,pcd_u_id,pcd_date,pcd_amount,pcd_remark)
 VALUES ('$u_id','$pca_u_id','$pca_date','$pca_amount','$pca_remark')";
     
     if ($conn->query($qu) === TRUE) {
         
         $conn->close();
         
         header("location:report_collection.php?msg=Added Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 
 
 if(isset($_GET['addassigncash'])){
     $pca_u_id=$_GET['pca_u_id'];  $u_id=$_GET['u_id'];
  
     $pca_date=$_GET['pca_date'];    $pca_amount=$_GET['pca_amount'];    $pca_remark=$_GET['pca_remark'];
     
     
     $qu="INSERT INTO payments_cash_assign(u_id,pca_u_id,pca_date,pca_amount,pca_remark)
 VALUES ('$u_id','$pca_u_id','$pca_date','$pca_amount','$pca_remark')";
     
     if ($conn->query($qu) === TRUE) {
         
         $conn->close();
         
         header("location:report_collection.php?msg=Added Succesfully!");
     }else {
         
         echo "ERROR: Submit Faild !!!!!!".$conn->error;
         $conn->close();
     }
 }
 
 
 
 if(isset($_GET['upate_website_sitevisit'])){
     $upate_website_sitevisit=$_GET['upate_website_sitevisit']; $wsv_id=$_GET['wsv_id'];
     $q="UPDATE website_sitevisit SET wsv_status='$upate_website_sitevisit' WHERE wsv_id='$wsv_id'"; 
     if ($con->query($q) === TRUE) { $con->close(); header("location:website_sitevisit_list.php?msg=Updated Successfully!");
     }else { $con->close(); echo "ERROR: Update Faild !!!!!!".$con->error; } }
     if(isset($_GET['upate_website_booking'])){
         $upate_website_sitevisit=$_GET['upate_website_booking']; $wsv_id=$_GET['wsv_id'];
         $q="UPDATE website_booking SET wb_status='$upate_website_sitevisit' WHERE wb_id='$wsv_id'";
         if ($con->query($q) === TRUE) { $con->close(); header("location:website_booking_list.php?msg=Updated Successfully!");
         }else { $con->close(); echo "ERROR: Update Faild !!!!!!".$con->error; } }
 
 else{
     echo "Faild To Get Action";
 }
?>
