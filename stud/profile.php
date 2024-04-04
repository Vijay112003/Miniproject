<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    ?>

    <body class='landing'><!-- Header -->
        <header id='header'>
            <h1 id='logo'>MY PROFILE</h1>
            <?php
            include ("navbar.php");
            ?>

            <?php
} else {
    echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
}
include ("footer.php");
?>