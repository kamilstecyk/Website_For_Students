<?php 

    $check_connection = require_once 'PHPScripts/database.php';  // we get true or false

    if(!$check_connection)  // there is an error
    {
        exit();  // we want to end at once
    }

    // // select from Tests polish department
    $result = $connection->query("SELECT * FROM Tests t INNER JOIN Departments d USING(departmentID) WHERE d.name = 'Polish';"); 
    $howManyRows = $result->num_rows;

    if($result)
    {
      
      for($i=0;$i<$howManyRows;$i++)
     {
          $row = $result->fetch_assoc();
          $test_title = $row['testTitle'];

           echo "<div>" . $test_title . "</div>";
     }

    }

    // this is only for tests, this script will be on test page with questions when will be ready
   require_once 'PHPScripts/handleStudentTest.php';

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
    <script src="./js/testsAndQuizScroll.js" defer></script>
    <script src="./js/topNavBar.js" defer></script>
  </head>
  <body>
    <!-- <div class="main"> -->
    <div class="header">
      <h1 class="subtitlePage tests-header">Tests</h1>
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

    <div class="main-content testsMainContent">
      <div class="mainLayout" id="mainLayoutTests">
        <div class="white-box testsWhiteBox">
          <div class="white-box-background"></div>
          <div class="white-box-content testsContent">
            <div class="testBar">
              <img
                src="./subPagesImages/tests/bxs-briefcase-alt-2 1.svg"
                alt="book"
              />
              <span>Vocabulary test jeden</span>
              <a href="studentLoginPage.php">
                <img
                  class="right-arrow"
                  src="./subPagesImages/tests/bxs-right-arrow-square 1.svg"
                  alt="right arrow"
                />
              </a>
            </div>
            <div class="testBar">
              <img
                src="./subPagesImages/tests/bxs-briefcase-alt-2 1.svg"
                alt="book"
              />
              <span>Vocabulary test dwa</span>
              <a href="studentLoginPage.php">
                <img
                  class="right-arrow"
                  src="./subPagesImages/tests/bxs-right-arrow-square 1.svg"
                  alt="right arrow"
                />
              </a>
            </div>
            <div class="testBar">
              <img
                src="./subPagesImages/tests/bxs-briefcase-alt-2 1.svg"
                alt="book"
              />
              <span>Vocabulary test trzy</span>
              <a href="studentLoginPage.php">
                <img
                  class="right-arrow"
                  src="./subPagesImages/tests/bxs-right-arrow-square 1.svg"
                  alt="right arrow"
                />
              </a>
            </div>
            <div class="testBar">
              <img
                src="./subPagesImages/tests/bxs-briefcase-alt-2 1.svg"
                alt="book"
              />
              <span>Vocabulary test cztery</span>
              <a href="studentLoginPage.php">
                <img
                  class="right-arrow"
                  src="./subPagesImages/tests/bxs-right-arrow-square 1.svg"
                  alt="right arrow"
                />
              </a>
            </div>
            <div class="testBar">
              <img
                src="./subPagesImages/tests/bxs-briefcase-alt-2 1.svg"
                alt="book"
              />
              <span>Vocabulary test pięć</span>
              <a href="studentLoginPage.php">
                <img
                  class="right-arrow"
                  src="./subPagesImages/tests/bxs-right-arrow-square 1.svg"
                  alt="right arrow"
                />
              </a>
            </div>

            <img
              class="up-arrows"
              id="prev"
              onclick="plusBox(-1)"
              src="./subPagesImages/studentsBook/bxs-chevrons-up 1.svg"
              alt="up arrows"
            />
            <img
              class="down-arrows"
              id="next"
              onclick="plusBox(1)"
              src="./subPagesImages/studentsBook/bxs-chevrons-down 1.svg"
              alt="down arrows"
            />
          </div>
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
