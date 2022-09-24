<?php 
    session_start();

    if(isset($_POST['login_input']) && isset($_POST['password_input']))
    {

      $check_connection = require_once 'PHPScripts/database.php';  // we get true or false

      if(!$check_connection)  // there is an error
      {
          exit();  // we want to end at once
      }

      $login_input = $_POST['login_input'];
      $password_input = $_POST['password_input'];

      $sql_query = "SELECT * FROM Students WHERE email = " . "'" . $login_input . "'" . ";";
      $result = $connection->query($sql_query); 
      $howManyRows = $result->num_rows;

      $login_info = "";

      if($result)
      {

        if($howManyRows > 0)
        {
            $row = $result->fetch_assoc();
            $correctHashedUserPassword = $row['password'];

            if(password_verify($password_input, $correctHashedUserPassword))
            {
              header('Location: ./studentChosenTestPage.php');
              echo 'success';
            }
            else
            {
              $login_info = "Incorrect password for user with this email!";
              echo 'faiolure';
            }

        }
        else
        {
          $login_info = "User with such an email does not exist!";
        }

      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Login Page</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/subpagesStyle.css" />
  </head>
  <body>    
    <div class="left-vector">
      <img src="./images/Vector6.png" />
    </div>
    <div class="right-vector">
      <img src="./images/Vector7.svg" />
      <div class="right-vector-text">
        <span>All rights reserved </span>
        <span id="copy-sign">&copy;</span>
      </div>
    </div>

    <div class="main-content">
      <div class="mainLayout">
        <div class="white-box">
          <div class="white-box-background darker-background"></div>
          <form id="form-student-login" method="POST" >
              <h3 id="student_login_page_title">Login to your account</h3>
              <div id="login-info" <?php if(strlen($login_info) > 0){echo 'style="visibility: visible;"';} ?>>
                <?php if(strlen($login_info) > 0){echo $login_info;} ?>
              </div>
              <div id="student-login-inputs" >
                <input id="student_login_input" class="login-input" type="text" placeholder="Enter your email" name="login_input" <?php if(isset($_POST['login_input'])){echo 'value="' . $_POST['login_input'] . '"';} ?> />
                <input id="student_login_password" class="login-input" type="password" placeholder="Enter your password" name="password_input" />
              </div>
              <input id="login-submit-btn" type="submit" value="LOG IN" />
          </form>
        </div>
        <div class="main-image">
          <img
            src="./subPagesImages/loginPage/student_login.svg"
            alt="girl"
          />
        </div>
      </div>

      <div class="homepage-button">
        <a href="./index.html">
          <img src="./subPagesImages/HomeButton.svg" alt="home button" />
        </a>
      </div>
    </div>

    <script src="./js/handleLoginSubmit.js"></script>
  </body>
</html>
