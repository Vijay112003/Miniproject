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
            <h1 id='logo'>STAFF ATTENDANCE ENTRY</h1>
            <?php include ("navbar.php");
            $current_date = date("Y-m-d");
            $staff_entries = []; // Initialize array to store staff requests
            $stud_query8 = "SELECT * FROM staff ORDER BY staff_id ASC";
            $staff_result = $conn->query($stud_query8);
            while ($row2 = mysqli_fetch_assoc($staff_result)) {
                $staff_entries[] = $row2;
            }
            ?>
            <br><br>
        </header><br><br>
        <section>
            <form action="attend.php" method="POST">
                <div class="container mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Staff ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Remark [If absent or leave else put No]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($staff_entries as $request):
                                // $stud_query9 = "SELECT * FROM staff where staff_id='" . $staff_id . "'";
                                // $staff_result1 = $conn->query($stud_query9);
                                // $row4 = mysqli_fetch_assoc($staff_result1);
                                ?>
                                <tr>
                                    <td style="color:White">
                                        <?php echo $request['staff_id']; ?>
                                        <input type="hidden" name="staff_id<?php echo $request['staff_id']; ?>" value="<?php echo $request['staff_id']; ?>">
                                    </td>
                                    <td style="color:White">
                                        <?php echo $request['staff_name']; ?>
                                    </td>
                                    <td style="color:White">
                                        <div class="form-group">
                                            <!-- <label class="form-control" for="department">Choose a department:</label> -->
                                            <select id="status" class="form-control" name="entry_status<?php echo $request['staff_id']; ?>" required>
                                                <option value="present" selected>Present</option>
                                                <option value="onduty">On Duty</option>
                                                <option value="absent">Absent</option>
                                                <option value="absent">Leave</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </td>
                                    </td>
                                    <td style="color:White">
                                        <input type="text" name="entry_reason<?php echo $request['staff_id']; ?>" required>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="entry_staff_id" value="admin">
                    <!-- <div class="form-group"> -->
                        <button type='submit' class='btn btn-primary btn-block' style="color:black">Submit</button>
                    <!-- </div> -->
                </div>
            </form>
        </section>
        <?php
} else {
    echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
}
include ("footer.php");
?>