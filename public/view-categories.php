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

        <script src="js/deleteCategory.js"></script>
        <script src="js/editCategory.js"></script>

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
      <li class="active"><a href="view-categories.php">Categories</a></li>
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
            <h3>MatheMeister Categories</h3>
            <h4>See all MatheMeister categories.</h4>

            <br>
            <a class="btn btn-primary" href="add-category.php" role="button">Add Category</a>
            <br>
            <br>
            <div>
                <table class="table table-bordered">
                <thead>
                <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Questions</th>
                <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php

                include("db/dbconfig.php");
                
                $result = mysqli_query($conn, "SELECT * FROM mm_category ORDER BY cat_id");
                
                while($category = mysqli_fetch_array($result))
                {
                $categoryId = $category['cat_id'];

                $qcSth = sprintf("SELECT que_id FROM mm_questions WHERE que_catId = %s", $categoryId);
                $qcRes = $conn->query($qcSth);

                echo"<td>".$category['cat_id']."</td>";
                echo"<td>".$category['cat_name']."</td>";
                echo"<td>".$qcRes->num_rows."</td>";
                $categoryString = "\"".$category['cat_name']."\"";
                echo"<td><button class='btn btn-primary' type='submit' onclick='editCategory(".$categoryId.", ".$categoryString.");'>Edit</button> <button class='btn btn-primary' type='submit' onclick='deleteCategory(".$categoryId.", ".$categoryString.", ".$qcRes->num_rows.");'>Delete</button> </td>";
                echo "</tr>";
                }
                mysqli_close($conn);
                ?>
                </table>
            </div>
        </div>
    </body>
</html>