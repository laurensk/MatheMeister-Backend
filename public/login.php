<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: view-questions.php");
  exit;
}
 
require_once "db/dbconfig.php";
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

 
    if(empty(trim($_POST["username"]))){
        $username_err = "I know that 1 + 1 is 2 but you must provide an username.";
    } else{
        $username = trim($_POST["username"]);
    }
    

    if(empty(trim($_POST["password"]))){
        $password_err = "I know that 1 + 1 is 2 but you must provide a password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT use_id, use_username, use_fullname, use_password FROM `mm_users` WHERE use_username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                  
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $fullname, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;  
                            $_SESSION["fullname"] = $fullname;                          
                            
                            header("location: view-questions.php");
                        } else{
                            
                            $password_err = "<br>not really... i mean, it's wrong...";
                        }
                    }
                } else{
                    
                    $username_err = "<br>not really... i mean, it's wrong...";
                }
            } else{
                echo "I tried everything but a connection to the database couldn't be made.";
            }

            mysqli_stmt_close($stmt);
        }
        
    }
    
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="de">
    <head>
                <title>MatheMeister Backend Login</title>
                <meta charset="utf-8">
                <link rel="stylesheet" href="/css/global.css">
                <link rel="stylesheet" href="/css/login.css">

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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <h3>MatheMeister Backend Login</h3>
                      <h4>Please log in to manage MatheMeister.</h4>
                      <br>
                      <fieldset>
                        <input name="username" id="username" placeholder="Username" type="text" tabindex="1" required autofocus>
                      </fieldset>
                      <br>
                      <fieldset>
                        <input name="password" id="password" placeholder="Password" type="password" tabindex="2" required>
                        <input type="hidden" name="hide" id="hide" />
                      </fieldset>
                      <br>
                      <fieldset>
                        <input class="btn btn-primary" name="login" type="submit" value="Login"></input>
                      </fieldset>
                      <span><?php echo $username_err; ?></span>
                      <span><?php echo $password_err; ?></span>
                    </form>
                  </div>

            </body>




</html>