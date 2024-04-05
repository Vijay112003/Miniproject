<div class="modal fade" id="staffreqmodel<?php echo $request['staff_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="imageModalLabel" style="color:black">
          <?php echo "Request"; ?>
        </h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="imageDetails">
          <div class="login-signup-container-1">
            <form action="action.php" method="POST" style="color:black">
              <?php
              if (isset($request['staff_id'])) {
                $staff_id= $request['staff_id'];
                $fetch_query = "SELECT * FROM staff_req WHERE staff_id = '" . $staff_id . "'";
                $result = $conn->query($fetch_query);
                if ($result->num_rows == 1) {
                  $row = $result->fetch_assoc();
                  $html = "";
                  // echo "<h1 style='color:black'>$row</h1>";?>
                  <form action='action.php' method='POST' style='color:black'>
                  <?php
                  foreach ($row as $key => $value) {
                    $html .= "<div class='form-group'>";
                    $html .= "<label for='$key' style='color:black'>" . ucfirst(str_replace('_', ' ', $key)) . "</label>";
                    $html .= "<input type='text' class='form-control' name='$key' value='$value'>";
                    $html .= "</div>";
                  }
                  $html .= "
                                  <input type='hidden' name='status' value='approved'>
                                  <input type='hidden' name='roll' value='staff'>
                                  <button type='submit' class='btn btn-primary btn-block'>Approved</button>
                                </form>";
                  $html .= "<div class='login-signup-container-1'>
                                  <form action='action.php' method='POST' style='color:black'>
                                    <input type='text' name='staff_id' value='" . $staff_id . "'>
                                    <input type='text' name='email' value='" . $row['email'] . "'>
                                    <input type='hidden' name='status' value='decline'>
                                    <input type='hidden' name='roll' value='staff'>
                                    <button type='submit' class='btn btn-primary btn-block' style='color:black'>Decline</button>
                                  </form>
                                </div>";
  
                  echo $html;
                }
              } else {
                echo "Staff ID not provided.";
              }
              ?>
              <!-- <p class="text-center mt-3" style="color:black;font-size:20px">Don't have an account? <a href="stud-sign-up.php">Request to Admin</a></p> -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button><a href="https://drive.google.com/drive/folders/1xU8LfCYuQzd1U9j2wH39TQdoOBZ_GExJ?usp=sharing" target="_blank">More</a></button> -->
        </div>
      </div>
    </div>
  </div>