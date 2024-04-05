<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row=mysqli_fetch_array($query_res);
    // echo($row['email']);
    $staff_id=$row['staff_id'];
    // echo($staff_id);
    ?>

    <body class='landing'>
        <!-- Header -->
        <header id='header'>
            <h1 id='logo'>STUDENT REPORTS</h1>
            <?php include ("navbar.php");
            $current_date = date("Y-m-d");
            $student_entries = []; // Initialize array to store student requests
            $stud_query8 = "SELECT * FROM gate_entry where person='student' ORDER BY entry_date DESC";
            $student_result = $conn->query($stud_query8);
            while ($row2 = mysqli_fetch_assoc($student_result)) {
                $student_entries[] = $row2;
            }
            ?>
            <br><br>
        </header><br><br>
        <section>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Register Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Entry Date</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student_entries as $request):
                            $stud_query9 = "SELECT * FROM student where staff_id='" . $staff_id . "'";
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
                                    <?php echo $request['entry_date']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['entry_time']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $request['reason']; ?>
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