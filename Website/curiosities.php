<?php 

    $check_connection = require_once 'PHPScripts/database.php';  // we get true or false

    if(!$check_connection)  // there is an error
    {
        exit();  // we want to end at once
    }

    // // select from Tests polish department
    $result = $connection->query("SELECT * FROM Curiosities c INNER JOIN Departments d USING(departmentID) WHERE d.name = 'Polish';"); 
    $howManyRows = $result->num_rows;

    if($result)
    {
      
      for($i=0;$i<$howManyRows;$i++)
     {
          $row = $result->fetch_assoc();
          $curiosity_content = $row['curiosityContent'];

           echo "<div>" . $curiosity_content . "</div>";
     }

    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masha's learning website</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/subpagesStyle.css" />
  </head>
  <body>
    <!-- <div class="main"> -->
    <div class="header">
      <h2 class="subtitlePage curiosities-header">Curiosities</h2>
    </div>
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
    <!-- </div> -->

    <div class="main-content">
      <div class="mainLayout">
        <div class="white-box">
          <div class="white-box-background darker-background"></div>
          <div class="white-box-content curiositiesText">
            <span
              >The phrase “long time no see” is believed to be a literal
              translation of a Native American or Chinese phrase as it is not
              grammatically correct.</span
            >
          </div>

          <div class="another-one-button">
            <span>Get another one</span>
            <img
              src="./subPagesImages/curiosities/bx-shuffle 1.svg"
              alt="shuffle"
            />
          </div>
        </div>
        <div class="main-image">
          <img
            src="./subPagesImages/curiosities/undraw_researching_re_fuod 1.svg"
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
  </body>
</html>
