<?php 
include("conn.php");
session_start();
$uname=$_POST['username'];
$pass=$_POST['password'];
$todayDate=date("Y-m-d H:i:s");
$loginsql="SELECT * FROM `admin` WHERE `username`='$uname' AND `pass`='$pass' ";
$login_query_arr=mysqli_fetch_array(mysqli_query($conn, $loginsql));
if($login_query_arr==TRUE){
    $_SESSION['ID']=$login_query_arr['id'];
    $adminid=$_SESSION['ID'];
    $LogOn=date("Y-m-d H:i:s");
    $updatedt="UPDATE `admin` SET `lastlogin` = '$LogOn' WHERE  `id` = '$adminid'";
    $Result=$conn->query($updatedt); 
    echo ('Login');
    
}
else{
    echo 'failed';
}
?>