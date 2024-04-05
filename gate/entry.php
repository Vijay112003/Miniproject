<?php
include ("../db/index.php");
include ("header.php");

date_default_timezone_set('Asia/Kolkata');
$current_time = date("H:i:s");
$current_date = date("Y-m-d");

if ($_POST['person'] == 'student') {
    $person = $_POST['person'];
    $reg_num = $_POST['reg_num'];
    $reason = $_POST['reason'];

    $stud_query6 = "SELECT * FROM student where reg_num='" . $reg_num . "'";
    $query_res2 = $conn->query($stud_query6);

    if (mysqli_num_rows($query_res2) == 1) {
        $row1 = $query_res2->fetch_assoc();

        $stud_query7 = "INSERT INTO gate_entry (person, staff_or_stud_id, reason, entry_date, entry_time) VALUES ('$person','$reg_num','$reason','$current_date','$current_time')";
        if ($conn->query($stud_query7)){
            $to8 = $row1['stud_email'];
            $to9 = $row1['parent_email'];

            $subject = "Late Entry Alert";

            $message10 = "<html><body>";
            $message10 .= "<p style='color:red'>You entered the college at <span style='color:blue'>$current_time</span>.</p>";
            $message10 .= "</body></html>";

            $message20 = "<html><body>";
            $message20 .= "<p style='color:red'>Your Son/Daughter entered the college at <span style='color:blue'>$current_time</span>.</p>";
            $message20 .= "</body></html>";

            $name = $row['stud_name'];
            $message21 = "<html><body>";
            $message21 .= "<p style='color:red'>Your Student $name entered the college at <span style='color:blue'>$current_time</span>.</p>";
            $message21 .= "</body></html>";

            $headers = "From: developervijay11@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            // Try to send email to both recipients
            $check1 = mail($to8, $subject, $message10, $headers);
            $check2 = mail($to9, $subject, $message20, $headers);
            

            // Check if both emails were sent successfully
            if ($check1 && $check2) {
                $staff_id = $row1['staff_id'];
                $staff_mail_query = "SELECT email FROM staff WHERE staff_id = '$staff_id'";
                $result = $conn->query($staff_mail_query);
                if(mysqli_num_rows($result) == 1){
                    $email = $result->fetch_assoc();
                    $staff_email = $email['email'];
                    $check3 = mail($staff_email, $subject, $message21, $headers);
                    if ($check3) {
                echo ("<script>alert('Entered');window.location='index.php';</script>");
                    } else {
                        echo ("<script>alert('Email doesn't sent to staff');window.location='index.php';</script>");
                    }
                }
                else{
                    echo ("<script>alert('Staff not found');window.location='index.php';</script>");
                }
            } else {
                echo ("<script>alert('Failed to send emails.');window.location='index.php';</script>");
            }
        } else {
            echo ("<script>alert('Something went wrong');window.location='index.php';</script>");
        }
    } else {
        echo ("<script>alert('Invalid user');window.location='index.php';</script>");
    }
} else if ($_POST['person'] == 'staff') {
    $person = $_POST['person'];
    $staff_id = $_POST['staff_id'];
    $reason = $_POST['reason'];
    $staff_query6 = "SELECT * FROM staff where staff_id='" . $staff_id . "'";
    $query_res2 = $conn->query($staff_query6);
    if (mysqli_num_rows($query_res2) == 1) {
        $row1 = $query_res2->fetch_assoc();
        $stud_query7 = "INSERT INTO gate_entry (person, staff_or_stud_id, reason, entry_date, entry_time) VALUES ('$person','$staff_id','$reason','$current_date','$current_time')";
        if ($conn->query($stud_query7)) {
            $to3 = $row1['email'];
            $subject1 = "Late Entry Alert";
            $message3 = "<html><body>";
            $message3 .= "<p style='color:red'>You enter the college at<span style='color:blue'>$current_time</span><h1></p>";
            $message3 .= "</body></html>";
            $headers1 = "From: developervijay11@gmail.com\r\n";
            $headers1 .= "MIME-Version: 1.0\r\n";
            $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $check3 = mail("$to3", "$subject1", "$message3", "$headers1");
            if ($check3) {
                echo ("<script>alert('Entered');window.location='index.php';</script>");
            } else {
                echo ("<script>alert('Entered But email doesn't sent');window.location='index.php';</script>");
            }
        } else {
            echo ("<script>alert('Something went wrong');window.location='index.php';</script>");
        }
    } else {
        echo ("<script>alert('INVALID');window.location='index.php';</script>");
    }
}