<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    ?>

    <body class='landing'>
        <!-- Header -->
        <header id='header'>
            <h1 id='logo'>REQUESTS</h1>
            <?php include ("navbar.php");
            $student_requests = []; // Initialize array to store student requests
            $stud_query = "SELECT * FROM student_req";
            $student_result = $conn->query($stud_query);
            while ($row = mysqli_fetch_assoc($student_result)) {
                $student_requests[] = $row;
            }
            $staff_requests = []; // Initialize array to store staff requests
            $staff_query = "SELECT * FROM staff_req";
            $staff_result = $conn->query($staff_query);
            while ($row = mysqli_fetch_assoc($staff_result)) {
                $staff_requests[] = $row;
            }
            ?>
            <br><br>
        </header><br><br>
        <section>
            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Roll</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student_requests as $request): ?>
                            <tr>
                                <td style="color:White">
                                    <?php echo $request['stud_name']; ?>
                                </td>
                                <td style="color:White">Student</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#studreqmodel<?php echo $request['reg_num']; ?>" data-image-id="1">
                                        Approve
                                    </button>
                                    <?php include ("req_model1.php"); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($staff_requests as $request): ?>
                            <tr>
                                <td style="color:White">
                                    <?php echo $request['staff_name']; ?>
                                </td>
                                <td style="color:White">Staff</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#staffreqmodel<?php echo $request['staff_id']; ?>" data-image-id="1">
                                        Approve
                                    </button>
                                    <?php include ("req_model2.php"); ?>
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