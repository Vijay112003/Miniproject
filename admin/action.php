<?php
include ("../db/index.php");
session_start();
error_reporting(0);
if ($_POST['status'] == 'approved') {
    if ($_POST['roll'] == 'stud') {
        $reg_num = $_POST['reg_num'];
        $stud_name = $_POST['stud_name'];
        $degree = $_POST['degree'];
        $dept = $_POST['dept'];
        $mobile = $_POST['mobile'];
        $stud_email = $_POST['stud_email'];
        $parent_email = $_POST['parent_email'];
        $staff_id = $_POST['staff_id'];
        $stud_pass = $_POST['stud_pass'];
        $stud_query3 = "INSERT INTO student (reg_num, stud_name, degree, dept, mobile, stud_email, parent_email, staff_id, stud_pass) VALUES ('$reg_num','$stud_name','$degree','$dept','$mobile','$stud_email','$parent_email', '$staff_id', '$stud_pass')";
        $stud_query4 = "DELETE FROM student_req WHERE reg_num= '$reg_num';";
        if ($conn->query($stud_query3) && $conn->query($stud_query4)) {
            $to = $stud_email;
            $subject = "Request Approved";
            $message = "<html><body>";
            $message .= "<p style='color:red'>The Login was created for you in Absentees and latecomers alert system at <span style='color:blue'>STUDENT</span> roll, and your credentials are as follows:<br><h1>REGISTER NUMBER:<span style='color:blue'>$reg_num</span><br>PASSWORD:<span style='color:blue'>$stud_pass</span></h1></p>";
            $message .= "</body></html>";
            $headers = "From: developervijay11@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $check = mail("$to", "$subject", "$message", "$headers");
            if ($check) {
                echo ("<script>alert('Approved');window.location='requests.php';</script>");
            } else {
                echo ("<script>alert('Approved But email doesn't sent');window.location='requests.php';</script>");
            }
        } else {
            echo ("<script>alert('Something went wrong');window.location='requests.php';</script>");
        }
    } else if ($_POST['roll'] == 'staff') {
        $staff_id = $_POST['staff_id'];
        $staff_name = $_POST['staff_name'];
        $email = $_POST['email'];
        $staff_qual = $_POST['staff_qual'];
        $staff_dept = $_POST['staff_dept'];
        $mobile = $_POST['mobile'];
        $staff_pass = $_POST['staff_pass'];
        $staff_query3 = "INSERT INTO staff (staff_id, staff_name, email, staff_qual, staff_dept, mobile, staff_pass) VALUES ('$staff_id','$staff_name','$email','$staff_qual','$staff_dept','$mobile','$staff_pass')";
        $staff_query4 = "DELETE FROM staff_req WHERE staff_id = '$staff_id'";
        if ($conn->query($staff_query3) && $conn->query($staff_query4)) {
            $to = $email;
            $subject = "Request Approved";
            $message = "<html><body>";
            $message .= "<p style='color:red'>The Login was created for you in Absentees and latecomers alert system at <span style='color:blue'>STAFF</span> roll, and your credentials are as follows:<br><h1>STAFF ID:<span style='color:blue'>$staff_id</span><br>PASSWORD:<span style='color:blue'>$staff_pass</span></h1></p>";
            $message .= "</body></html>";
            $headers = "From: developervijay11@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $check = mail("$to", "$subject", "$message", "$headers");
            if ($check) {
                echo ("<script>alert('Approved');window.location='requests.php';</script>");
            } else {
                echo ("<script>alert('Approved But email doesn't sent');window.location='requests.php';</script>");
            }
        } else {
            echo ("<script>alert('Something went wrong');window.location='requests.php';</script>");
        }
    }
} else if ($_POST['status'] == 'decline') {
    if ($_POST['roll'] == 'stud') {
        $reg_num = $_POST['reg_num'];
        //echo $reg_num;
        $stud_query5 = "DELETE FROM student_req WHERE `student_req`.`reg_num` = '$reg_num'";
        if ($conn->query($stud_query5)) {
            $to = $_POST['stud_email'];
            $subject = "Request Declined";
            $message = "<html><body>";
            $message .= "<p style='color:red'>The request was declined in Absentees and latecomers alert system at <span style='color:blue'>STUDENT</span> roll.</p>";
            $message .= "</body></html>";
            $headers = "From: developervijay11@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $check = mail("$to", "$subject", "$message", "$headers");
            if ($check) {
                 echo ("<script>alert('Declined');window.location='requests.php';</script>");
            } else {
                echo ("<script>alert('Declined But email doesn't sent');window.location='requests.php';</script>");
            }
        } else {
            echo "<br>doesn't Deleted";
            echo ("<script>alert('Something went wrong');window.location='requests.php';</script>");
        }
    } else if ($_POST['roll'] == 'staff') {
        $staff_id=$_POST['staff_id'];
        echo $staff_id;
        $staff_query5 = "DELETE FROM staff_req WHERE staff_id = '$staff_id'";
        if ($conn->query($staff_query5)) {
            $to = $_POST['email'];
            $subject = "Request Declained";
            $message = "<html><body>";
            $message .= "<p style='color:red'>The request was declined in Absentees and latecomers alert system at <span style='color:blue'>STAFF</span> roll.</p>";
            $message .= "</body></html>";
            $headers = "From: developervijay11@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $check = mail("$to", "$subject", "$message", "$headers");
            if ($check) {
                echo ("<script>alert('Declined');window.location='requests.php';</script>");
            } else {
                echo ("<script>alert('Declined But email doesn't sent');window.location='requests.php';</script>");
            }
        } else {
            echo"doesn't delete";
            echo ("<script>alert('Something went wrong');window.location='requests.php';</script>");
        }
    }
}
?>