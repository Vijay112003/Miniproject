<?php
include ("header.php");
if (mysqli_num_rows($query_res) == 1) {
    $row = $query_res->fetch_assoc();
    if ($pass == $row['admin_pass']) {
        $_SESSION['admin'] = $row['admin_num'];
        $id = $_SESSION['admin'];
        echo ("<script>alert('Admin $id');</script>"); ?>

        <body class='landing'><!-- Header -->
            <header id='header'>
                <h1 id='logo'>ADMIN
                    <?php echo ($_SESSION['admin']) ?>
                </h1>
                <nav id='nav'>
                    <ul>
                        <li><a href='today.php'>TODAY ACTIVITY</a></li>
                        <li>
                            <a href='#'>LATE ENTRY</a>
                            <ul>
                                <li><a href='studreport.php'>STUDENTS</a></li>
                                <li><a href='staffreport.php'>STAFFS</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href='requests.php'>REQUSETS</a>
                        </li>
                        <li>
                            <a href='#'>ATTENDANCE</a>
                            <ul>
                                <li><a href='staff_attendance.php'>ENTRY</a></li>
                                <li><a href='#'>REPORT</a>
                                    <ul>
                                        <li><a href='attendance.php'>TODAY</a></li>
                                        <li><a href='all.php'>OVERALL</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#adminModal'
                                data-image-id='1'>
                                <a href='../log-out.php'>Log-out</a>
                            </button></li>
                    </ul>
                </nav>
            </header>

            <!-- Banner -->

            <?php
            include ("footer.php");
    } else {
        echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
    }
} else if (mysqli_num_rows($query_res) != 1) {
    echo "<script>alert('Password is wrong, Try again...?'); window.location='../';</script>";
} else {
    echo "<script>window.location='../';</script>";
}
?>