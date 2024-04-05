<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row = $query_res->fetch_assoc();
    //echo "<script>alert('Password is right, Try again...?');</script>";
    if ($row['staff_pass'] == $pass) {
        $_SESSION['staff'] = $row['staff_name'];
        $staff_name = $row['staff_name'];
        $staff_id = $row['staff_id'];
        $staff_mail = $row['email'];
        $staff_qual = $row['staff_qual'];
        $staff_dept = $row['staff_dept'];
        $staff_mobile = $row['mobile'];
        echo ("<script>alert('Welcome $staff_name');</script>");
        echo ("<body class='landing'><!-- Header -->
                    <header id='header'>
                        <h1 id='logo'>" . $_SESSION['staff'] . "</h1>
                        <nav id='nav'>
    <ul>
        <li><a href='today.php'>TODAY ACTIVITY</a></li>
        <li>
            <a href='#'>LATE ENTRY</a>
            <ul>
                <li><a href='myreport.php'>MY REPORT</a></li>
                <li><a href='studreport.php'>STUDENT</a></li>
            </ul>
        </li>
        <li>
            <a href='#'>ATTENDANCE</a>
            <ul>
                <li><a href='stud_attendance.php'>ENTRY</a></li>
                <li><a href='#'>REPORT</a>
                <ul>
                <li><a href='report.php'>TODAY</a></li>
                <li><a href='all.php'>OVERALL</a></li>
            </ul>
            </li>
            </ul>
        </li>
        <li><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#adminModal'
                data-image-id='1'>
                <a href='../log-out.php'>Log-out</a>
            </button></li>
    </ul>
</nav>
</header><br><br><br><br><section>
<h1 id='logo' style='text-align:center'>MY PROFILE</h1>
</section>

<div class='container mt-4'>
<table class='table'>
    <thead>
        <tr>
            <th scope='col' style='color:White;font-weight: bold;'>Key</th>
            <th scope='col'>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td style='color:White;font-weight: bold;'>Name</td>
        <td style='color:White'>$staff_name</td>
        </tr>
        <tr>
        <td style='color:White;font-weight: bold;'>ID</td>
        <td style='color:White'>$staff_id</td>
        </tr>
        <tr>
        <td style='color:White;font-weight: bold;'>E-Mail</td>
        <td style='color:White'>$staff_mail</td>
        </tr>
        <tr>
        <td style='color:White;font-weight: bold;'>Qualification</td>
        <td style='color:White'>$staff_qual</td>
        </tr>
        <tr>
        <td style='color:White;font-weight: bold;'>Department</td>
        <td style='color:White'>$staff_dept</td>
        </tr>
        <tr>
        <td style='color:White;font-weight: bold;'>Your Mobile</td>
        <td style='color:White'>$staff_mobile</td>
        </tr>
    </tbody>
</table>");
        include ("footer.php");
    } else {
        echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
    }
} else {
    echo "<script>alert('Staff ID NOT Found or Password is wrong, Try again...?'); window.location='../';</script>";
}
?>