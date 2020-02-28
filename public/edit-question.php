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
        <title>MatheMeister Edit Question</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/view-questions.css">

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
            <form action="helpers/question-updater.php" method="post" accept-charset="UTF-8">
                <h3>MatheMeister Edit Questions</h3>
                <h4>Edit a MatheMeister question.</h4>

                <br>
                <a class="btn btn-primary" href="view-questions.php" role="button">Back</a>
                <br>
                <br>
                <fieldset>
                    <input name="level" placeholder="Level" value="<?php echo rawurldecode($_GET['que_level']); ?>" type="number" tabindex="1" required autofocus>
                </fieldset>
                <br>
                <select id="category" name="category" placeholder="Level" value="<?php echo rawurldecode($_GET['cat_name']); ?>" tabindex="2" required autofocus>
                    <?php
                    include("db/dbconfig.php");
                    $result = mysqli_query($conn, "SELECT * FROM mm_category ORDER BY cat_name");
                                    
                    while($category = mysqli_fetch_array($result))
                    {
                    $catId = $category['cat_id'];
                    $catName = $category['cat_name'];

                    if (rawurldecode($_GET['cat_name']) == $catName) {
                        echo '<option value="'.$catId.'" selected >'.$catName.'</option>';
                    } else {
                        echo '<option value="'.$catId.'">'.$catName.'</option>';
                    }
                    }
                    mysqli_close($conn);
                    ?>
                </select>
                <br>
                <br>
                <fieldset>
                    <input name="question" placeholder="Question" value="<?php echo rawurldecode($_GET['que_question']); ?>" type="text" tabindex="3" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="correctAnswer" placeholder="Correct answer" value="<?php echo rawurldecode($_GET['que_correctAnswer']); ?>" type="text" tabindex="4" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="wrongAnswerOne" placeholder="Wrong answer 1" value="<?php echo rawurldecode($_GET['que_wrongAnswerOne']); ?>" type="text" tabindex="5" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="wrongAnswerTwo" placeholder="Wrong answer 2" value="<?php echo rawurldecode($_GET['que_wrongAnswerTwo']); ?>" type="text" tabindex="6" required>
                </fieldset>
                <br>
                <fieldset>
                    <input name="wrongAnswerThree" placeholder="Wrong answer 3" value="<?php echo rawurldecode($_GET['que_wrongAnswerThree']); ?>" type="text" tabindex="7" required>
                </fieldset>
                <br>
                <input type="hidden" name="queId" value="<?php echo rawurldecode($_GET['que_id']); ?>">
                <fieldset>
                    <button class="btn btn-primary" name="submit" type="submit" id="contact-submit" data-submit="...Sending" value="addQuestion">Save</button>
                </fieldset>
                <span><br><br><?php echo $err; ?></span>
            </form>
        </div>
    </body>
</html>