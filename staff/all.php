<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row = mysqli_fetch_array($query_res);
    // echo($row['email']);
    $staff_id = $row['staff_id'];
    // echo($staff_id);
    ?>

    <body class='landing'>
        <!-- Header -->
        <header id='header'>
            <h1 id='logo'>ABSENTEES</h1>
            <?php include ("navbar.php");
            $current_date = date("Y-m-d");
            $absentees = []; // Initialize array to store student requests
            $stud_query8 = "SELECT * FROM stud_attendance where entry_staff_id='" . $staff_id . "' AND entry_status='absent' ORDER BY entry_date DESC";
            $student_result = $conn->query($stud_query8);
            while ($row2 = mysqli_fetch_assoc($student_result)) {
                $absentees[] = $row2;
            }
            ?>
            <br><br>
        </header>
        <br><br>
        <section>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Register Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($absentees as $request):
                            $reg_num = $request['reg_num'];
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
                                <!-- <td style="color:White">
                                    <?php //echo $row4['dept'];  ?>
                                </td> -->
                                <td style="color:White">
                                    <?php echo $request['entry_date']; ?>
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