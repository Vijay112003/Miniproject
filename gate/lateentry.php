<br><br>
<?php
date_default_timezone_set('Asia/Kolkata');
$current_time = date("H:i:s A");
$current_date = date("d-m-y");

echo "<h3 style='text-align:center'><span style='color:blue'>Time:</span> $current_time <span style='color:blue;'>Date:</span> $current_date</h3>";
?>
<section>
    <div class="container mt-4">
        <h1 style="color:White">STUDENTS</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Register Number</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="entry.php" method="POST">
                        <input type="hidden" name="person" value="student">
                        <td style="color:White">
                            <input type="text" name="reg_num" placeholder="Enter Student Register Number" required>
                        </td>
                        <td style="color:White">
                            <input type="text" name="reason" placeholder="Enter the reason" required>
                        </td>
                        <td>
                            <button type='submit' class='btn btn-primary btn-block' style="color:black">Submit</button>
                        </td>
                    </form>
                </tr>
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
                    <th scope="col">Reason</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="entry.php" method="POST">
                        <input type="hidden" name="person" value="staff">
                        <td style="color:White">
                            <input type="text" name="staff_id" placeholder="Enter Staff ID" required>
                        </td>
                        <td style="color:White">
                            <input type="text" name="reason" placeholder="Enter the reason" required>
                        </td>
                        <td>
                            <button type='submit' class='btn btn-primary btn-block' style="color:black">Submit</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</section>