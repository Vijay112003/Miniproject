<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-up</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-signup-container-9">
          <h2>Register</h2>
          <form action="stud_reg.php" method="POST">
            <div class="form-group">
              <input type="hidden" name="user_type" value="stud_register">
              <input type="text" class="form-control" id="name" name="stud_name" placeholder="Name"
                oninput="formatName(this)">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="stud_reg" placeholder="Register Number" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="stud_degree" placeholder="Degree" required>
            </div>
            <div class="form-group">
              <!-- <label class="form-control" for="department">Choose a department:</label> -->
              <select id="department" class="form-control" name="stud_dept" required>
                <option value="AIDS" selected>Department</option>
                <option value="AIDS">AIDS</option>
                <option value="IT">IT</option>
                <option value="CSE">CSE</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
                <option value="MECH">MECH</option>
                <option value="MBA">MBA</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" id="mobile" name="stud_mobile" placeholder="Mobile number"
                pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="stud_mail" placeholder="E-mail" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="parent_mail" placeholder="Parent E-mail" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="stud_pass" placeholder="Password" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="stud_confirm_pass" placeholder="Confirm-Password"
                required>
            </div>
            <input type="hidden" name="staff" value="0">
            <button type="submit" class="btn btn-primary btn-block">Request</button><br><br>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    window.onpageshow = function (event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
  </script>
</body>

</html>