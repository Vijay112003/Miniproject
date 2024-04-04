<?php
include ("header.php");
if (mysqli_num_rows($query_res)) {
    $row = $query_res->fetch_assoc();
    if($pass==$row['stud_pass']){
    $_SESSION['stud'] = $row['stud_name'];
    $name=$_SESSION['stud'];
    echo ("<script>alert('Welcome $name');</script>");
    echo ("<body class='landing'><!-- Header -->
                    <header id='header'>
                        <h1 id='logo'>" . $_SESSION['stud'] . "</h1>
                        <nav id='nav'>
                            <ul>
                            <li>
                                    <a href='profile.php'>PROFILE</a>
                                </li>
                                <li>
                                    <a href='reports.php'>MY REPORT</a>
                                </li>
                                <li>
                                    <a href='requests.php'>REQUSET</a>
                                </li>
                                <li><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#studModal' data-image-id='1'>
                                <a href='../log-out.php'>Log-out</a>
                              </button></li>
                            </ul>
                        </nav>
                    </header>
                ");
    include ("footer.php");
    }else{
        echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";

    }   
} else {
    echo "<script>alert('User not found'); window.location='../';</script>";
}
?>