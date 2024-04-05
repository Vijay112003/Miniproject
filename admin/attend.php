<?php
include ("../db/index.php");
session_start();
error_reporting(0);

if (isset($_POST["entry_staff_id"]) && $_POST["entry_staff_id"] == 'admin') {
    $staff = [];
    echo "entering";

    // Fetching all staffs associated with the given staff_id
    $entry_query8 = "SELECT * FROM staff";
    $entry_result = $conn->query($entry_query8);
    while ($row2 = mysqli_fetch_assoc($entry_result)) {
        $staff[] = $row2;
        echo "<br>while";
    }

    // Loop through each staff and insert their attendance record
    foreach ($staff as $request) {
        echo "<br>for";
        $staff_id = $request['staff_id'];
        $staff_email = $request['email'];
        echo "<br>$staff_email";
        $entry_status = $_POST['entry_status' . $staff_id]; // Accessing status using dynamic field name
        $entry_reason = $_POST['entry_reason' . $staff_id]; // Accessing reason using dynamic field name
        date_default_timezone_set('Asia/Kolkata');
        $entry_date = date("Y-m-d");
        $entry_time = date("H:i:s");
        echo ($staff_id . '<br>' . $entry_status . '<br>' . $entry_reason . '<br>' . $entry_date . '<br>' . $entry_time);
        $entry_query = "INSERT INTO staff_attendance (staff_id, entry_date, entry_time, entry_status, entry_reason) VALUES ('$staff_id', '$entry_date', '$entry_time', '$entry_status', '$entry_reason')";
        if ($conn->query($entry_query)) {
            echo "<br>inserted";
            if ($entry_status == 'absent') {
                echo "<br>absent";
                $subject = "Attendance Alert";
                $message1 = "Dear " . $request['staff_name'] . ",\n\n";
                $message1 .= "This is to inform you that you were marked absent today for the reason of " . $entry_reason . " at " . $entry_time . ".\n\n";
                $message1 .= "Please ensure to take the classes regularly.\n\n";
                $message1 .= "Regards,\nChettinadtech";
                $headers = "From: developervijay11@gmail.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $check4 = mail($staff_email, $subject, $message1, $headers);
                if ($check4) {
                    //echo ("<script>alert('Entered');window.location='index.php';</script>");
                } else {
                    //echo ("<script>alert('Email doesn't sent');window.location='index.php';</script>");
                }
            }
        } else {
           // echo ("<script>alert('Something went wrong try again later...');window.location='index.php';</script>");
        }
    }
    echo ("<script>alert('Entered');window.location='index.php';</script>");

} else {
    echo ("<script>alert('Something went wrong try again later...');window.location='index.php';</script>");
}
?>