<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="de">
    <head>
        <title>MatheMeister Questions</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/view-questions.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="js/deleteQuestion.js"></script>
        <script src="js/editQuestion.js"></script>

    </head>
    <body>

    <nav class="navbar navbar-default ">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="index.php">MatheMeister</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="view-questions.php">Questions</a></li>
      <li><a href="add-question.php">Add Question</a></li>
      <li><a href="view-categories.php">Categories</a></li>
      <li><a href="add-category.php">Add Category</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
    if($_SESSION["loggedin"] !== true) {
        echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
    } else {
        echo '<li><a><span></span> '.$_SESSION["fullname"].'</a></li>
        <li><a href="helpers/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
    }
    ?>
    </ul>
    </div>
    </nav>


        <div class="container">
            <h3>MatheMeister Questions</h3>
            <h4>See all MatheMeister questions.</h4>

            <br>
            <a class="btn btn-primary" href="add-question.php" role="button">Add Question</a>
            <br>
            <br>
            <div>
                <table class="table table-bordered">
                <thead>
                <tr>
                <th>ID</th>
                <th>Level</th>
                <th>Category</th>
                <th>Question</th>
                <th>Correct answer</th>
                <th>Wrong answer 1</th>
                <th>Wrong answer 2</th>
                <th>Wrong answer 3</th>
                <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php

                include("db/dbconfig.php");
                
                $result = mysqli_query($conn, "SELECT * FROM mm_questions ORDER BY que_level");
                
                while($question = mysqli_fetch_array($result))
                {
                
                $catSth = sprintf("SELECT cat_name FROM mm_category WHERE cat_id = '%s'", $question['que_catId']);
                $catRes = $conn->query($catSth);
                $catRow = $catRes->fetch_assoc();

                $id = $question['id']; 
                echo"<td>".$question['que_id']."</td>";
                echo"<td>".$question['que_level']."</td>";
                echo"<td>".$catRow['cat_name']."</td>";
                echo"<td>".$question['que_question']."</td>";
                echo"<td>".$question['que_correctAnswer']."</td>";
                echo"<td>".$question['que_wrongAnswerOne']."</td>"; 
                echo"<td>".$question['que_wrongAnswerTwo']."</td>"; 
                echo"<td>".$question['que_wrongAnswerThree']."</td>";
                $questionId = $question['que_id'];
                $questionString = "\"".$question['que_question']."\"";
                echo"<td><button class='btn btn-primary' type='submit' onclick='editQuestion(\"".$question['que_id']."\", \"".$question['que_level']."\", \"".$catRow['cat_name']."\", \"".$question['que_question']."\", \"".$question['que_correctAnswer']."\", \"".$question['que_wrongAnswerOne']."\", \"".$question['que_wrongAnswerTwo']."\", \"".$question['que_wrongAnswerThree']."\");'>Edit</button> <button class='btn btn-primary' type='submit' onclick='deleteQuestion(".$questionId.", ".$questionString.");'>Delete</button> </td>";
                echo "</tr>";
                }
                mysqli_close($conn);
                ?>
                </table>
            </div>
        </div>
    </body>
</html>