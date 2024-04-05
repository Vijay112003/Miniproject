<?php
include ("../db/index.php");
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assests/css/style.css'>
    <title>STAFF</title>
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
    <meta name='description'
        content='The web based alert and reporting system for absentees and late comers of an organization' />
    <meta name='keywords' content='Absentees,late comers' />
    <script src='js/jquery.min.js'></script>
    <script src='js/jquery.scrolly.min.js'></script>
    <script src='js/jquery.dropotron.min.js'></script>
    <script src='js/jquery.scrollex.min.js'></script>
    <script src='js/skel.min.js'></script>
    <script src='js/skel-layers.min.js'></script>
    <script src='js/init.js'></script>
    <noscript>
        <link rel='stylesheet' href='css/skel.css' />
        <link rel='stylesheet' href='css/style.css' />
        <link rel='stylesheet' href='css/style-xlarge.css' />
    </noscript>
</head>
<?php
$pass = $_SESSION["password"];
$staff_query1 = "SELECT * FROM staff WHERE staff_id='" . $_SESSION['user_name'] . "'";
$query_res = $conn->query($staff_query1);
?>
