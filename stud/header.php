<?php
include ("../db/index.php");
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-LCtsgBOXl98ns4vUr0yxcwv7v4u6DQfWg0rHbLPtGHMXkPuJq9lMO8AmBTZ+I9SKdaeqsgAekibJt75ezhwo8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assests/css/style.css'>
    <title>STUDENT</title>
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
    <meta name='description'
        content='The web based alert and reporting system for absentees and late comers of an organization' />
    <meta name='keywords' content='Absentees,late comers' />
    <!--[if lte IE 8]><script src='css/ie/html5shiv.js'></script><![endif]-->
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
$pass=$_SESSION['password'];
$stud_query1 = "SELECT * FROM student WHERE reg_num='" . $_SESSION['user_name'] . "' AND stud_pass='" . $_SESSION['password'] . "'";
$query_res = $conn->query($stud_query1);
?>