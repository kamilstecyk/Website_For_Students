<?php 
    session_start();

    $check_connection = require_once 'PHPScripts/database.php';  // we get true or false
    $given_answer = 'B';
    $studentID = "1";   //TODO      session_variable after correct login

    if(!$check_connection)  // there is an error
    {
        exit();  // we want to end at once
    }

    //we get how many questions we have for particular test

    $result = $connection->query('SELECT * FROM Tests t INNER JOIN Departments d USING(departmentID) INNER JOIN TestsQuestions tq USING(testID) WHERE t.testTitle = "Grammar Test" AND d.name = "Polish" ORDER BY questionID;'); 
    
    $howManyQuestions = $result->num_rows;

     // we will be saving in session variable current question and in another total number of questions, now we will be handle this question
    
     $_SESSION['totalNumberOfQuestionsLeft'] = --$howManyQuestions;

    // we get beginning index of question, next question will be in sequence from this one

    if(!isset($_SESSION['currIndexOfQuestion']) )
    {
        $row = $result->fetch_assoc();
        $_SESSION['currIndexOfQuestion'] = $row['questionID'];
        $_SESSION['currIndexOfTest'] = $row['testID'];   
    }
    else if($howManyQuestions > 0)
    {
        $_SESSION['currIndexOfQuestion'] += 1;
    }

    // // select from Tests polish department
    $result = $connection->query('SELECT * FROM Tests t INNER JOIN Departments d USING(departmentID) INNER JOIN TestsQuestions tq USING(testID) INNER JOIN TestsAnswers USING(questionID) WHERE t.testTitle = "Grammar Test" AND d.name = "Polish" AND ' . 'tq.questionID = ' . $_SESSION['currIndexOfQuestion'] . ';'); 

    $howManyAnswers = $result->num_rows;
    $answer_literal_correct = "";

    if($result)
    {
      
        $question_content = $row['questionContent'];

        for($i = 0;$i<$howManyAnswers;$i++)
        {
            $row = $result->fetch_assoc();
            $question_answer_literal = $row['literal'];
            $question_answer_content = $row['answerContent'];
            $question_answer_isTrue = $row["isTrue"];

            if($question_answer_isTrue)
            {
                $answer_literal_correct = $question_answer_literal;
            }
            
            echo '<div>' . $question_answer_literal . " " . $question_answer_content . " " . $question_answer_isTrue . '</div>';

        }

    }

    if( $given_answer == $answer_literal_correct )
    {
        $_SESSION["currStudentTestResult"] += 1;
    }

    
    // session_destroy();

    // TODO       after all questions we should unset all variables which are need in test page
    // TODO       on submit we have to add record with result to DB, if $_SESSION["currStudentTestResult"] is unset this means student got 0 points from test
    


?>

