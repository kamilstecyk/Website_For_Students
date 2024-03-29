<?php 

    $check_connection = require_once 'PHPScripts/database.php';  // we get true or false

    if(!$check_connection)  // there is an error
    {
        exit();  // we want to end at once
    }

    // // select from Tests polish department
    $result = $connection->query("SELECT * FROM Quizes q INNER JOIN Departments d USING(departmentID) WHERE d.name = 'Polish';"); 
    $howManyRows = $result->num_rows;

    if($result)
    {
      
      for($i=0;$i<$howManyRows;$i++)
     {
          $row = $result->fetch_assoc();
          $quiz_title = $row['quizTitle'];
          $quiz_link = $row['quizLink'];

           echo "<div>" . $quiz_title .  " " . '<a target="_blank" href="' . "http://" . $quiz_link . '">' . $quiz_link . "</a>" . "</a>" . "</div>";
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
    <script src="./js/testsAndQuizScroll.js" defer></script>
    <script src="./js/topNavBar.js" defer></script>
  </head>
  <body>
    <!-- <div class="main"> -->
    <div class="header">
      <h1 class="subtitlePage tests-header">Quizes</h1>
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
      <div class="mainLayout" id="mainLayoutQuizes">
        <div class="white-box">
          <div class="white-box-background darker-background"></div>
          <div class="white-box-content quizesContent">
            <div class="quizBar">
              <span>Vocabulary Kahoot Part 1</span>
              <a>https://kahoot.it/</a>
            </div>
            <div class="quizBar">
              <span>Vocabulary Kahoot Part 2</span>
              <a>https://kahoot.it/</a>
            </div>
            <div class="quizBar">
              <span>Grammar Quizlet Part 1</span>
              <a>https://quizlet.com/pl</a>
            </div>
            <div class="quizBar">
              <span>Grammar Quizlet Part 2</span>
              <a>https://quizlet.com/pl</a>
            </div>
            <div class="quizBar">
              <span>Mixed Quiziz Part 1</span>
              <a>https://quizizz.com/</a>
            </div>
            <div class="quizBar">
              <span>Mixed Quiziz Part next</span>
              <a>https://quizizz.com/</a>
            </div>

            <!-- zmienic kolor fill strzalek i nadac im go w css -->
            <img
              class="up-arrows"
              id="prev"
              onclick="plusBox(-1)"
              src="./subPagesImages/quizes/bxs-chevrons-up white 1.svg"
              alt="up arrows"
            />
            <img
              class="down-arrows"
              id="next"
              onclick="plusBox(1)"
              src="./subPagesImages/quizes/bxs-chevrons-down white 1.svg"
              alt="down arrows"
            />
          </div>
        </div>

        <div class="main-image">
          <img
            src="./subPagesImages/quizes/undraw_quiz_re_aol4 1.svg"
            alt="man"
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
