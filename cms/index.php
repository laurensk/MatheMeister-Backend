<?php

session_start();

?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <title>MatheMeister</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/view-questions.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>

    <nav class="navbar navbar-default ">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="index.php">MatheMeister</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="view-questions.php">Questions</a></li>
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
            <h3>MatheMeister Content Management Systems</h3>
            <h4>Manage questions and categories for the MatheMeister app.</h4>
            <?php if($_SESSION["loggedin"] !== true) {
                echo '<br><h3>Please log in in order to manage MatheMeister.</h3><h4>Click the login button in the menu bar.</h4>';
            } ?>
        </div>
    </body>
</html>