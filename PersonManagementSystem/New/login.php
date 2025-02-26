<?php 

session_start();

	include("dbconn.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$sql = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($conn, $sql);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "<script>alert('Username or password incorrect!');</script>";
		}else
		{
			echo "<script>alert('Please enter both username and password!');</script>";

		}
	}

?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body id="body">	
		
		
	
        <div id="box">
		<h3> Person Management System </h3>
		
		

            <form method="post">
                <div class=Login_div>Login</div>
                <input id="text" type="text" name="user_name" placeholder="Username"> <br><br>
                <input id="text" type="password" name="password" placeholder="Password"><br><br>

                <input id="button" type="submit" value="Login"><br><br>

                <a href="signup.php">Click to Signup</a>
        
        </form>

        </div>

		
    </body>
    </html>