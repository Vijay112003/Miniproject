<?php
include ("../db/index.php");
session_start();
error_reporting(0);

if (isset($_POST["entry_staff_id"])) {
    $entry_staff_id = $_POST['entry_staff_id'];
    $student = [];

    // Fetching all students associated with the given staff_id
    $entry_query8 = "SELECT * FROM student where staff_id='" . $entry_staff_id . "'";
    $entry_result = $conn->query($entry_query8);
    while ($row2 = mysqli_fetch_assoc($entry_result)) {
        $student[] = $row2;
    }

    // Loop through each student and insert their attendance record
    foreach ($student as $request) {
        $reg_num = $request['reg_num'];
        $stud_email = $request['stud_email'];
        $parent_email = $request['parent_email'];
        $entry_status = $_POST['entry_status' . $reg_num]; // Accessing status using dynamic field name
        $entry_reason = $_POST['entry_reason' . $reg_num]; // Accessing reason using dynamic field name
        date_default_timezone_set('Asia/Kolkata');
        $entry_date = date("Y-m-d");
        $entry_time = date("H:i:s");
        //echo($reg_num.'<br>'.$entry_status.'<br>'. $entry_reason.'<br>'. $entry_date.'<br>'. $entry_time);
        $entry_query = "INSERT INTO stud_attendance (reg_num, entry_date, entry_time, entry_status, entry_reason, entry_staff_id) VALUES ('$reg_num', '$entry_date', '$entry_time', '$entry_status', '$entry_reason', '$entry_staff_id')";
        if ($conn->query($entry_query)) {
            if ($entry_status == 'absent') {
                $subject = "Attendance Alert";
                $message2 = "Dear Parent\n\nThis is to inform you that your Son/Daughter were marked absent today for the reason of ".$entry_reason."  at" . $entry_time . ".\n\nPlease ensure to Him/His attend the classes regularly.\n\nRegards,\nChettinadtech";
                $message1 = "Dear " . $request['stud_name'] . ",\n\nThis is to inform you that you were marked absent today at " . $entry_time . ".\n\nPlease ensure to attend the classes regularly.\n\nRegards,\nChettinadtech";
                $headers = "From: developervijay11@gmail.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $check4 = mail($stud_email, $subject, $message1, $headers);
                $check5 = mail($parent_email, $subject, $message2, $headers);
                if ($check4 && $check5) {
                    //echo ("<script>alert('Entered');window.location='index.php';</script>");
                } else {
                    //echo ("<script>alert('Email doesn't sent');window.location='index.php';</script>");
                }
            }
        } else {
            //echo ("<script>alert('Something went wrong try again later...');window.location='index.php';</script>");
        }
    }
    echo ("<script>window.location='index.php';</script>");

}
else{
    echo ("<script>alert('Something went wrong try again later...');window.location='index.php';</script>");
}
?>