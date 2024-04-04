<?php
session_start();
include("db/connection.php");
$_SESSION["user_type"]=$_POST['user-type'];
$_SESSION['user_name']="";
$_SESSION["password"]="";
$_SESSION['user_model']=$_POST['user-model'];;
if($_SESSION["user_type"]==='admin'){
    $_SESSION["password"]=$_POST['admin-pass'];
    header("Location:admin");
}
else if($_SESSION["user_type"]==='student'){
    $_SESSION['user_name']=$_POST['stud-roll'];
    $_SESSION["password"]=$_POST['stud-pass'];
    header("Location:stud");
}
else if($_SESSION["user_type"]==='staff'){
    $_SESSION['user_name']=$_POST['staff-id'];
    $_SESSION["password"]=$_POST['staff-pass'];
    header("Location:staff");
}
else if($_SESSION["user_type"]==='gate'){
    $_SESSION['user_name']=$_POST['gate-num'];
    $_SESSION["password"]=$_POST['gate-pass'];
    header("Location:gate");
}
?>