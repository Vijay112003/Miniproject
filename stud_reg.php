<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-up</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>
  <?php
  if ($_POST['stud_pass'] == $_POST['stud_confirm_pass']) {
    include ("db/connection.php");
    $stud_name = $_POST["stud_name"];
    $stud_reg = $_POST["stud_reg"];
    $stud_degree = $_POST["stud_degree"];
    $stud_dept = $_POST["stud_dept"];
    $stud_phone = $_POST["stud_mobile"];
    $stud_email = $_POST["stud_mail"];
    $parent_email = $_POST["parent_mail"];
    $stud_pass = $_POST["stud_pass"];
    $stud_query1 = "SELECT * FROM student WHERE reg_num='" . $stud_reg . "'";
    $query_res1 = $conn->query($stud_query1);
    if (mysqli_num_rows($query_res1) != 1) {
      $stud_query2 = "INSERT INTO student_req (reg_num, stud_name, degree, dept, mobile, stud_email, parent_email,  stud_pass)
      VALUES ('$stud_reg', '$stud_name', '$stud_degree', '$stud_dept', '$stud_phone', '$stud_email', '$parent_email', '$stud_pass')";
      if ($conn->query($stud_query2)) {
        $to = "sasinathengineer@gmail.com";
        $subject = "New request";
        $message = "<html><body>";
        $message .= "<h1>New Request</h1>";
        $message .= "<p style='color:red'>The new request from <span style='color:blue'>$stud_name</span> in Absentees and latecomers alert system at <span style='color:blue'>STUDENT</span> roll.</p>";
        $message .= "</body></html>";
        $headers = "From: developervijay11@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $check = mail("$to", "$subject", "$message", "$headers");
        if ($check) {
          ?>
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="login-signup-container-8">
                  <h2>Registered Successfully</h2>
                  <div class="form-group">
                    <label class="form-label">Hello
                      <?php echo ($stud_name); ?>
                    </label><br>
                    <label class="form-label">Admin Approoval Soon....</label>
                    <label class="form-label">We will contact with E-mail & the user credentials send to the registered
                      E-mail</label>
                  </div>
                  <button type="submit" class="btn btn-success btn-block"><a href="index.php"
                      style="color:black">OKAY...!</a></button>
                </div>
              </div>
            </div>
          </div>
        <?php } else {
          echo ("<script>alert('Traffic issue....Try again later');window.location='index.php';</script>");
        }
      } else {
        echo ("<script>alert('Already Registered wait sometime for email to be sent');window.location='index.php';</script>");
      }
    } else {
      echo ("<script>alert('You already have an account, Please login');window.location='index.php';</script>");
    }

  } else {
    echo ("<script>alert('Password and Confirm password mismatch');window.location='stud-sign-up.php';</script>");
  } ?>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>