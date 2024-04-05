<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row=mysqli_fetch_array($query_res);
    // echo($row['email']);
    $reg_num=$row['reg_num'];
    // echo($stud_id);
    ?>

    <body class='landing'>
        <!-- Header -->
        <header id='header'>
            <h1 id='logo'>MY REPORTS</h1>
            <?php include ("navbar.php");
            $current_date = date("Y-m-d");
            $stud_entries = []; // Initialize array to store staff requests
            $stud_query8 = "SELECT * FROM gate_entry where staff_or_stud_id='$reg_num' ORDER BY entry_date DESC";
            $stud_result = $conn->query($stud_query8);
            while ($row2 = mysqli_fetch_assoc($stud_result)) {
                $stud_entries[] = $row2;
            }
            ?>
            <br><br>
        </header>
        <section>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Entry Date</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Reason</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stud_entries as $request):
                            ?>
                            <tr>
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