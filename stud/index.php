<?php
include ("header.php");
if (mysqli_num_rows($query_res)) {
    $row = $query_res->fetch_assoc();
    if ($pass == $row['stud_pass']) {
        $_SESSION['stud'] = $row['stud_name'];
        $name = $_SESSION['stud'];
        $reg_num=$row['reg_num'];
        $degree=$row['degree'];
        $dept=$row['dept'];
        $mobile=$row['mobile'];
        $stud_email=$row['stud_email'];
        $parent_email=$row['parent_email'];
        echo ("<script>alert('Welcome $name');</script>");
        echo ("<body class='landing'><!-- Header -->
                    <header id='header'>
                        <h1 id='logo'>" . $_SESSION['stud'] . "</h1>
                        <nav id='nav'>
                            <ul>
                                <li>
                                    <a href='reports.php'>LATE ENTRY</a>
                                </li>
                                <li>
                                    <a href='requests.php'>ATTENDANCE</a>
                                </li>
                                <li><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#studModal' data-image-id='1'>
                                <a href='../log-out.php'>Log-out</a>
                              </button></li>
                            </ul>
                        </nav>
                    </header>
                    <br><br>
                    <section>
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
                                <td style='color:White'>$name</td>
                                </tr>
                                <tr>
                                <td style='color:White;font-weight: bold;'>Register Number</td>
                                <td style='color:White'>$reg_num</td>
                                </tr>
                                <tr>
                                <td style='color:White;font-weight: bold;'>Degree</td>
                                <td style='color:White'>$degree</td>
                                </tr>
                                <tr>
                                <td style='color:White;font-weight: bold;'>Department</td>
                                <td style='color:White'>$dept</td>
                                </tr>
                                <tr>
                                <td style='color:White;font-weight: bold;'>Mobile</td>
                                <td style='color:White'>$mobile</td>
                                </tr>
                                <tr>
                                <td style='color:White;font-weight: bold;'>Your E-Mail</td>
                                <td style='color:White'>$stud_email</td>
                                </tr>
                                <tr>
                                <td style='color:White;font-weight: bold;'>Parent E-Mail</td>
                                <td style='color:White'>$parent_email</td>
                                </tr>
                            </tbody>
                        </table>");
                
        include ("footer.php");
    } else {
        echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";

    }
} else {
    echo "<script>alert('User not found'); window.location='../';</script>";
}
?>