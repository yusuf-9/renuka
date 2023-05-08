<?php 
include("conn.php");
session_start();

if(empty($_SESSION['ID'])){
    header("location:/admin");
}

?>