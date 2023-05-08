<?php include("authverification.php") ;
$rid = sha1(md5(time()));
$checkreq="SELECT * FROM `withdraw` WHERE `tid`='$adminid' AND `status`=0 ";
$checkif=mysqli_num_rows(mysqli_query($conn, $checkreq));
if($checkif>0){
    echo 'alreadyrequest';
}
else if($limit<=$earnings){
    $requestquery="INSERT INTO `withdraw` (`tid`, `reqid`, `amt`, `pmod`, `status`) VALUES ('$adminid', '$rid', '$earnings',  '0', '0')";
    if(mysqli_query($conn,$requestquery)){
        echo "requested";
        // $updateamount=mysqli_query($conn, "UPDATE `teachers` SET `income` = '0' WHERE `teachers`.`id` = '$adminid'");
    }
    
}
else{
    echo 'lessthanlimit';
    
}

?>