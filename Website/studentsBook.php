<?php 

    $check_connection = require_once 'PHPScripts/database.php';  // we get true or false

    if(!$check_connection)  // there is an error
    {
        exit();  // we want to end at once
    }

    // // select from Tests polish department
    $result = $connection->query("SELECT * FROM Books b INNER JOIN Departments d USING(departmentID) WHERE d.name = 'Polish';"); 
    $howManyRows = $result->num_rows;

    if($result)
    {
      
      for($i=0;$i<$howManyRows;$i++)
      {
            $row = $result->fetch_assoc();
            $book_title = $row['bookTitle'];
            $book_author = $row['author'];
            $book_link = $row['bookLink'];

            echo "<div>" . $book_title . " " . $book_author . " " . $book_link  . "</div>";
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
    <script src="./js/booksScroll.js" defer></script>
    <script src="./js/topNavBar.js" defer></script>
  </head>
  <body>
    <!-- <div class="main"> -->
    <div class="header">
      <h1>Masha's learning website</h1>
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
      <div class="mainLayout studentsBook" id="mainLayoutStudentsBook">
        <div class="topNavBarWrapper">
          <div class="topNavBar" id="expandTopNavBar" onclick="expand()">
            <span>Choose department</span>
            <img
              class="topNavBar-img"
              src="./subPagesImages/studentsBook/bxs-chevron-down 1.svg"
              alt="arrow down"
            />
          </div>

          <div id="topNavBarContent">
            <input type="checkbox" name="department" value="pl" id="plDep" />
            <label class="department" for="plDep">Polish department</label>

            <div class="break-point"></div>

            <input type="checkbox" name="department" value="en" id="enDep" />
            <label class="department" for="enDep">English department</label>
          </div>
        </div>

        <div class="white-box studentsBookWhiteBox">
          <div class="white-box-background"></div>
          <div class="white-box-content studentsBookContent">
            <div class="bookBar pl">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                jeden</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>
            <div class="bookBar en">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                dwa</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>
            <div class="bookBar pl">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                trzy</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>
            <!-- second box  -->
            <div class="bookBar pl">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                cztery</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>

            <div class="bookBar en">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                pięć</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>

            <div class="bookBar">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                sześć</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>
            <!--  -->

            <div class="bookBar">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                siedem</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
            </div>

            <div class="bookBar pl">
              <img
                src="./subPagesImages/studentsBook/bx-book-open 1.svg"
                alt="book"
              />
              <span
                >Jak zdobyć przyjaciół i zrównać wrogów - Dany Carnegie
                osiem</span
              >
              <img
                class="download-icon"
                src="./subPagesImages/studentsBook/bxs-download 1.svg"
                alt="download icon"
              />
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
