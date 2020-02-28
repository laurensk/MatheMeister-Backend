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
      <li><a href="index.php">Home</a></li>
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
            <form action="helpers/category-updater.php" method="post" accept-charset="UTF-8">
                <h3>MatheMeister Edit Category</h3>
                <h4>Edit a MatheMeister category.</h4>

                <br>
                <a class="btn btn-primary" href="view-categories.php" role="button">Back</a>
                <br>
                <br>
                <fieldset>
                    <input name="cat_name" placeholder="Category" value="<?php echo rawurldecode($_GET['cat_name']); ?>" type="text" tabindex="1" required autofocus>
                </fieldset>
                <input type="hidden" name="cat_id" value="<?php echo rawurldecode($_GET['cat_id']); ?>">
                <br>
                <fieldset>
                    <button class="btn btn-primary" name="submit" type="submit" id="contact-submit" data-submit="...Sending" value="addCategory">Save</button>
                </fieldset>
                <span><br><br><?php echo $err; ?></span>
            </form>
        </div>
    </body>
</html>