<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>
  <?php
  if ($_POST['staff_pass'] == $_POST['staff_confirm_pass']) {
    include ("db/connection.php");
    $staff_name = $_POST["staff_name"];
    $staff_degree = $_POST["staff_degree"];
    $staff_dept = $_POST["staff_dept"];
    $staff_phone = $_POST["staff_mobile"];
    $staff_email = $_POST["staff_mail"];
    $staff_pass = $_POST["staff_pass"];
    //echo($staff_name." ".$staff_degree." ".$staff_dept." ".$staff_phone." ".$staff_email." ".$staff_pass);
    $staff_query1 = "SELECT * FROM staff WHERE email='" . $staff_email . "'";
    $query_res1 = $conn->query($staff_query1);
    if (mysqli_num_rows($query_res1) != 1) {
      $staff_query2 = "INSERT INTO staff_req (staff_name,email,staff_qual,staff_dept,mobile,staff_pass)
      VALUES ('$staff_name', '$staff_email','$staff_degree', '$staff_dept', '$staff_phone',  '$staff_pass')";
      if ($conn->query($staff_query2)) {
        $to = "sasinathengineer@gmail.com";
        $subject = "New request";
        $message = "<html><body>";
        $message .= "<h1>New Request</h1>";
        $message .= "<p style='color:red'>The new request from <span style='color:blue'>$staff_name</span> in Absentees and latecomers alert system at <span style='color:blue'>STAFF</span> roll.</p>";
        $message .= "</body></html>";
        $headers = "From: developervijay11@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $check = mail($to, $subject, $message, $headers);
        if ($check) {
          ?>
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="login-signup-container-8">
                  <h2>Registered Successfully</h2>
                  <div class="form-group">
                    <label class="form-label">Hello
                      <?php echo ($staff_name); ?>
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
    echo ("<script>alert('Password and Confirm password mismatch');window.location='staff-sign-up.php';</script>");
  } ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>