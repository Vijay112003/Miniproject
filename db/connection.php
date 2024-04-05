<?php
try {
    // echo("Connection page");
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        echo ("<script>alert('Connection failed');</script>");
        throw new Exception("Connection failed", 1);
    } else {
        $query1 = 'CREATE DATABASE IF NOT EXISTS absentees';
        $res = $conn->query($query1);
        if ($res) {
            // echo("<br>Database created");
            $query2 = 'USE absentees';
            $res1 = $conn->query($query2);
            if ($res) {
                // echo("<br>DB selected");
                $query1 = "CREATE TABLE IF NOT EXISTS student (
                        reg_num VARCHAR(12) not null,
                        stud_name VARCHAR(50) not null,
                        degree VARCHAR(30) not null,
                        dept VARCHAR(30) not null,
                        mobile varchar(10) unique not null,
                        stud_email VARCHAR(50) unique not null,
                        parent_email VARCHAR(50) unique not null,
                        staff_id INT(2) not null,
                        stud_pass varchar(16) not null,
                        PRIMARY KEY(reg_num)
                        );";
                $query11 = "CREATE TABLE IF NOT EXISTS student_req (
                            reg_num VARCHAR(12) not null,
                            stud_name VARCHAR(50) not null,
                            degree VARCHAR(30) not null,
                            dept VARCHAR(30) not null,
                            mobile varchar(10) unique not null,
                            stud_email VARCHAR(50) unique not null,
                            parent_email VARCHAR(50) unique not null,
                            stud_pass varchar(16) not null,
                            PRIMARY KEY(reg_num)
                        );";
                $query2 = "CREATE TABLE IF NOT EXISTS staff(
                        staff_id INT(2) AUTO_INCREMENT not null,
                        staff_name VARCHAR(50) not null,
                        email VARCHAR(50) unique not null,
                        staff_qual VARCHAR(20) not null,
                        staff_dept VARCHAR(30) not null,
                        mobile varchar(10) not null,
                        staff_pass varchar(16) not null,
                        PRIMARY KEY(staff_id)
                    )";
                $query21 = "CREATE TABLE IF NOT EXISTS staff_req(
                            staff_id INT(2) AUTO_INCREMENT not null,
                            staff_name VARCHAR(50) not null,
                            email VARCHAR(50) unique not null,
                            staff_qual VARCHAR(20) not null,
                            staff_dept VARCHAR(30) not null,
                            mobile varchar(10) not null,
                            staff_pass varchar(16) not null,
                            PRIMARY KEY(staff_id)
                        )";
                $query3 = "CREATE TABLE IF NOT EXISTS gate(
                        gate_num int(2) not null,
                        gate_pass varchar(16) not null,
                        primary key(gate_num)
                    )";
                    $query31 = "CREATE TABLE IF NOT EXISTS gate_entry(
                        serial_num INT(4) AUTO_INCREMENT not null,
                        person VARCHAR(10),
                        staff_or_stud_id VARCHAR(12) not null,
                        reason VARCHAR(100) not null,
                        entry_date DATE,
                        entry_time TIME,
                        primary key(serial_num)
                    )";
                $query4 = "CREATE TABLE IF NOT EXISTS admin_abs(
                        admin_num int(2) not null,
                        admin_pass varchar(16) not null,
                        primary key(admin_num)
                    )";
                    $query41 = "CREATE TABLE IF NOT EXISTS stud_attendance(
                        serial_num INT(4) AUTO_INCREMENT not null,
                        reg_num VARCHAR(12) not null,
                        entry_date DATE not null,
                        entry_time TIME not null,
                        entry_status varchar(10) not null,
                        entry_reason varchar(100) not null,
                        entry_staff_id int(2) not null,
                        primary key(serial_num)
                    )";
                    $query42 = "CREATE TABLE IF NOT EXISTS staff_attendance(
                        serial_num INT(4) AUTO_INCREMENT not null,
                        staff_id VARCHAR(12) not null,
                        entry_date DATE not null,
                        entry_time TIME not null,
                        entry_status varchar(10) not null,
                        entry_reason varchar(100) not null,
                        primary key(serial_num)
                    )";
                if ($conn->query($query1) == TRUE && $conn->query($query11) == TRUE && $conn->query($query2) == TRUE && $conn->query($query21) == TRUE && $conn->query($query3) == TRUE && $conn->query($query31) == TRUE && $conn->query($query4) == TRUE && $conn->query($query41) == TRUE && $conn->query($query42) == TRUE) {
                    // echo("<script>alert('Welcome');</script>");
                } else {
                    // echo("<br>Table doesn't created");
                }
            } else {
                // echo("<br>DB not selected");
            }
        } else {
            // echo("<br>DB not created");
        }
    }
} catch (Exception $e) {
    echo '<h1>Error</h1>: ' . $e->getMessage();
}
?>