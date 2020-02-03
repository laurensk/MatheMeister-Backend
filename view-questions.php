<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
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

    </head>
    <body>
        <div class="container">
            <h3>MatheMeister Questions</h3>
            <h4>See all MatheMeister questions.</h4>

            <div class="d-flex" style="float: right;">
                <div class="ml-auto">
                <div> <h5 style="display: inline-block;">Welcome, </h5> <h4 style="display: inline-block;"><?php echo $_SESSION["fullname"] ?></h4> <a style="display: inline-block;" class="btn btn-primary" href="helpers/logout.php" role="button">Logout</a> </div>
                    
                </div>
            </div>


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

                include("auth/dbconfig.php");
                
                $result = mysqli_query($conn, "SELECT * FROM mm_questions ORDER BY que_level");
                
                while($question = mysqli_fetch_array($result))
                {
                $id = $question['id']; 
                echo"<td>".$question['que_id']."</td>";
                echo"<td>".$question['que_level']."</td>";
                echo"<td>".$question['que_question']."</td>";
                echo"<td>".$question['que_correctAnswer']."</td>";
                echo"<td>".$question['que_wrongAnswerOne']."</td>"; 
                echo"<td>".$question['que_wrongAnswerTwo']."</td>"; 
                echo"<td>".$question['que_wrongAnswerThree']."</td>";
                $questionId = $question['que_id'];
                $questionString = "\"".$question['que_question']."\"";
                echo"<td><button class='btn btn-primary' type='submit' onclick='deleteQuestion(".$questionId.", ".$questionString.");'>Delete</button></td>";
                echo "</tr>";
                }
                mysqli_close($conn);
                ?>
                </table>
            </div>
        </div>
    </body>
</html>