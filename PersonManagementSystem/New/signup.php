<?php
    session_start();

    include("dbconn.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD']== "POST")
    {
       $user_name = $_POST['user_name'];
       $password = $_POST['password'];

       if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
       {
        //save to database
        $user_id = random_num(20);
        $sql = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        mysqli_query ($conn, $sql);

        header("Location: login.php");
        die;

       }else
       {
        echo "Please enter some valid information";
       }
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="body">
        <div id="box">

            <form method="post">
                <div class=Login_div>Signup</div>
                <input id="text" type="text" name="user_name" placeholder="Username"> <br><br>
                <input id="text" type="password" name="password" placeholder="Password"><br><br>

                <input id="button" type="submit" value="Signup"><br><br>

                <a href="login.php">Click to Login</a>
        
        </form>

        </div>
    </body>
    </html>