<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    ?>

    <body class='landing'>
        <!-- Header -->
        <header id='header'>
            <h1 id='logo'>STUDENT REPORTS</h1>
            <?php include ("navbar.php");
            $current_date = date("Y-m-d");
            $staff_entries = []; // Initialize array to store student requests
            $staff_query8 = "SELECT * FROM gate_entry where person='staff' ORDER BY entry_date DESC";
            $staff_result = $conn->query($staff_query8);
            while ($row2 = mysqli_fetch_assoc($staff_result)) {
                $staff_entries[] = $row2;
            }
            ?>
            <br><br>
        </header><br><br>
        <section>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Staff ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Entry Date</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff_entries as $request):
                            $staff_id = $request["staff_or_stud_id"];
                            $staff_query9 = "SELECT * FROM staff where staff_id='" . $staff_id . "'";
                            $student_result1 = $conn->query($staff_query9);
                            $row4 = mysqli_fetch_assoc($student_result1);
                            ?>
                            <tr>
                                <td style="color:White">
                                    <?php echo $row4['staff_id']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $row4['staff_name']; ?>
                                </td>
                                <td style="color:White">
                                    <?php echo $row4['staff_dept']; ?>
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