<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    ?>

    <body class='landing'>
        <!-- Header -->
        <header id='header'>
            <h1 id='logo'>TODAY ABSENTEES</h1>
            <?php include ("navbar.php");
            $current_date = date("Y-m-d");
            $stud_query8 = "SELECT * FROM stud_attendance where entry_status='absent' AND entry_date='" . $current_date . "'";
            $student_result = $conn->query($stud_query8);
            while ($row2 = mysqli_fetch_assoc($student_result)) {
                $student_entries[] = $row2;
            }
            $staff_entries = []; // Initialize array to store staff requests
            $staff_query7 = "SELECT * FROM staff_attendance where entry_status='absent' AND entry_date='" . $current_date . "'";
            $staff_result = $conn->query($staff_query7);
            while ($row3 = mysqli_fetch_assoc($staff_result)) {
                $staff_entries[] = $row3;
            }
            ?>
            <br><br>
        </header>
        <section>
            <div class="container mt-4">
                <h1 style="color:White">STUDENTS</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Register Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Staff ID</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student_entries as $request):
                            $reg_num = $request['reg_num'];
                            //echo "$reg_num";
                            $stud_query9 = "SELECT * FROM student where reg_num='" . $reg_num . "'";
                            $student_result1 = $conn->query($stud_query9);
                            $row4 = mysqli_fetch_assoc($student_result1);
                            ?>
                            <tr>
                                <td style="color:White">
                                    <?php echo $row4['reg_num']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $row4['stud_name']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $row4['dept']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['entry_time']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['entry_reason']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['entry_staff_id']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div class="container mt-4">
                <h1 style="color:White">STAFFS</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Staff ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff_entries as $request):
                            $staff_id = $request['staff_id'];
                            $staff_query8 = "SELECT * FROM staff where staff_id='" . $staff_id . "'";
                            $staff_result1 = $conn->query($staff_query8);
                            $row5 = mysqli_fetch_assoc($staff_result1);
                            ?>
                            <tr>
                                <td style="color:White">
                                    <?php echo $row5['staff_id']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $row5['staff_name']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $row5['staff_dept']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['entry_time']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['entry_reason']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php
} else {
    echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
}
include ("footer.php");
?>