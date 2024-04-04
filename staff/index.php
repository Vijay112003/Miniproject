<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row = $query_res->fetch_assoc();
    //echo "<script>alert('Password is right, Try again...?');</script>";
    if ($row['staff_pass'] == $pass) {
        $_SESSION['staff'] = $row['staff_name'];
        $name = $row['staff_name'];
        echo ("<script>alert('Welcome $name');</script>");
        echo ("<body class='landing'><!-- Header -->
                    <header id='header'>
                        <h1 id='logo'>" . $_SESSION['staff'] . "</h1>
                        <nav id='nav'>
    <ul>
        <li><a href='today.php'>TODAY ACTIVITY</a></li>
        <li><a href='profile.php'>MY PROFILE</a></li>
        <li>
            <a href='#'>REPORTS</a>
            <ul>
                <li><a href='myreport.php'>MY REPORT</a></li>
                <li><a href='studreport.php'>STUDENT</a></li>
            </ul>
        </li>
        <li>
            <a href='requests.php'>REQUSETS</a>
        </li>
        <li><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#adminModal'
                data-image-id='1'>
                <a href='../log-out.php'>Log-out</a>
            </button></li>
    </ul>
</nav>
</header>");
        include ("footer.php");
    } else {
        echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
    }
} else {
    echo "<script>alert('Staff ID NOT Found or Password is wrong, Try again...?'); window.location='../';</script>";
}
?>