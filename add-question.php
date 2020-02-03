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
        <title>MatheMeister Add Question</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/view-questions.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <form action="helpers/question-adder.php" method="post">
                <h3>MatheMeister Add Questions</h3>
                <h4>Create a new MatheMeister question.</h4>

                <div class="d-flex" style="float: right;">
                <div class="ml-auto">
                <div> <h5 style="display: inline-block;">Welcome, </h5> <h4 style="display: inline-block;"><?php echo $_SESSION["fullname"] ?></h4> <a style="display: inline-block;" class="btn btn-primary" href="helpers/logout.php" role="button">Logout</a> </div>
                    
                </div>
                </div>

                <br>
                <a class="btn btn-primary" href="view-questions.php" role="button">Back</a>
                <br>
                <br>
                <fieldset>
                    <input name="level" placeholder="Level" type="number" tabindex="1" required autofocus>
                </fieldset>
                <br>
                <fieldset>
                    <input name="question" placeholder="Question" type="text" tabindex="2" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="correctAnswer" placeholder="Correct answer" type="text" tabindex="3" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="wrongAnswerOne" placeholder="Wrong answer 1" type="text" tabindex="4" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="wrongAnswerTwo" placeholder="Wrong answer 2" type="text" tabindex="5" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="wrongAnswerThree" placeholder="Wrong answer 3" type="text" tabindex="6" required>
                </fieldset>
                <br>
                <fieldset>
                    <button class="btn btn-primary" name="submit" type="submit" id="contact-submit" data-submit="...Sending" value="addQuestion">Add Question</button>
                </fieldset>
                <span><br><br><?php echo $err; ?></span>
            </form>
        </div>
    </body>
</html>