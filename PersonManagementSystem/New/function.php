<?php

function check_login($conn) {
    // Start the session
    session_start();

    // Check if user_id is set in the session
    if(isset($_SESSION['user_id'])) {
        // Sanitize the user ID to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

        // Prepare the SQL query
        $sql = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful and if user data exists
        if($result && mysqli_num_rows($result) > 0) {
            // Fetch user data
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        } else {
            // User data not found, redirect to login page
            echo "User data not found. Redirecting to login page."; // Debugging output
            redirectToLogin();
        }
    } else {
        // user_id is not set in the session, redirect to login page
        echo "User not logged in. Redirecting to login page."; // Debugging output
        redirectToLogin();
    }
}

function redirectToLogin() {
    // Redirect to the login page
    header("Location: login.php");
    exit; // Ensure script execution stops after redirection
}

    function random_num($lenght)
    {
        $text = "";
        if($lenght < 5)
        {
            $lenght = 5;

        }
        $len = rand(4,$lenght);

        for ($i=0; $i < $len; $i++) { 
            # code...

            $text .= rand(0,9);
        }
        return $text;
    }





