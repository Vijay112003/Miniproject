<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row = $query_res->fetch_assoc();
    if ($pass == $row['admin_pass']) {
        $_SESSION['admin'] = $row['admin_num'];
        $id = $_SESSION['admin'];
        // $current_date = date("Y-m-d");

        // $stud_late_query_today = "SELECT * FROM gate_entry where person='student' AND entry_date='".$current_date."'";
        // $stud_late_result_today = $conn->query($stud_late_query);


        $stud_late_query = "SELECT * FROM gate_entry where person='student'";
        $stud_late_result = $conn->query($stud_late_query);

        $staff_late_query = "SELECT * FROM gate_entry where person='staff'";
        $staff_late_result = $conn->query($staff_late_query);

        $staff_query = "SELECT * FROM staff_attendance where entry_status='absent'";
        $staff_result = $conn->query($staff_query);

        $stud_query = "SELECT * FROM stud_attendance where entry_status='absent'";
        $stud_result = $conn->query($stud_query);

        //$stud_count_today = mysqli_num_rows($stud_late_result_today);
        $stud_count = mysqli_num_rows($stud_late_result);
        $staff_count = mysqli_num_rows($staff_late_result);
        $staff_count_attend = mysqli_num_rows($staff_result);
        $stud_count_attend = mysqli_num_rows($stud_result);
        echo ("<script>alert('Admin $id');</script>"); ?>

        <body class='landing'><!-- Header -->
            <header id='header'>
                <h1 id='logo'>ADMIN
                    <?php echo ($_SESSION['admin']) ?>
                </h1>
                <nav id='nav'>
                    <ul>
                        <li><a href='today.php'>TODAY ACTIVITY</a></li>
                        <li>
                            <a href='#'>LATE ENTRY</a>
                            <ul>
                                <li><a href='studreport.php'>STUDENTS</a></li>
                                <li><a href='staffreport.php'>STAFFS</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href='requests.php'>REQUSETS</a>
                        </li>
                        <li>
                            <a href='#'>ATTENDANCE</a>
                            <ul>
                                <li><a href='staff_attendance.php'>ENTRY</a></li>
                                <li><a href='#'>REPORT</a>
                                    <ul>
                                        <li><a href='attendance.php'>TODAY</a></li>
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
            </header><br><br>

            <section>
                <div class="container mt-4">
                    <h1 style="color:White">LATE ENTRY</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Key</th>
                                <th scope="col">Value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:white">
                                    Students
                                </td>
                                <td style="color:white">
                                    <?php echo $stud_count; ?>
                                </td>
                                <td style="color:white">
                                    <a href="studreport.php">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:white">
                                    Staffs
                                </td>
                                <td style="color:white">
                                    <?php echo $staff_count; ?>
                                </td>
                                <td style="color:white">
                                    <a href="staffreport.php">View</a>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td style="color:white">
                                    Today
                                </td>
                                <td style="color:white">
                                    <?php echo $stud_count_today; ?>
                                </td>
                                <td style="color:white">
                                    <a href="staffreport.php">View</a>
                                </td>
                            </tr> -->
                            
                        </tbody>
                    </table>
            </section><br><br>

<section>
    <div class="container mt-4">
        <h1 style="color:White">ABSENTEES</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Key</th>
                    <th scope="col">Value</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color:white">
                        Students
                    </td>
                    <td style="color:white">
                        <?php echo $stud_count_attend; ?>
                    </td>
                    <td style="color:white">
                        <a href="all.php">View</a>
                    </td>
                </tr>
                <tr>
                    <td style="color:white">
                        Staffs
                    </td>
                    <td style="color:white">
                        <?php echo $staff_count_attend; ?>
                    </td>
                    <td style="color:white">
                        <a href="all.php">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
</section>

            <?php
            include ("footer.php");
    } else {
        echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
    }
} else if (mysqli_num_rows($query_res) != 1) {
    echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
} else {
    echo "<script>window.location='../';</script>";
}
?>