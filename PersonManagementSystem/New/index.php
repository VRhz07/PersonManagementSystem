<?php
    include "dbconn.php";
    include  "function.php";
    /*check if the user is logged in*/
    $user_data = check_login($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
        crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>List of Person</title>
</head>
<body id="bgbody">
    
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        List of Person
    </nav>

    <div class="container">
        <?php
        include "dbconn.php";

        $search = '';  // Initialize the search variable

        if (isset($_GET['search'])) {
            // Get the search query from the URL
            $search = $_GET['search'];
        }

        $sql = "SELECT * FROM `person` WHERE 
                `Firstname` LIKE '%$search%' OR 
                `Lastname` LIKE '%$search%' OR 
                `Gender` LIKE '%$search%' OR 
                `Email` LIKE '%$search%'";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        }
        ?>

        <!-- Add New User button -->
        <a href="addnew.php" class="btn btn-dark mb-3">Add new Person</a>

        <!--Logout button-->
        <a href="login.php" class="btn btn-dark mb-3">Logout</a>


        <!-- Search bar -->
        <form class="mb-3" method="get" action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-outline-dark">Search</button>
            </div>
        </form>

        <!-- Display search results -->
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Gender</th>
                    <th scope="col">ContactNumber</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Firstname'] ?></td>
                        <td><?php echo $row['Lastname'] ?></td>
                        <td><?php echo $row['Gender'] ?></td>
                        <td><?php echo $row['ContactNumber'] ?></td>
                        <td><?php echo $row['Email'] ?></td>

                        <td>
                            <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark">
                                <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
                            </a>
                            <a href="delete.php?id=<?php echo $row['id']?>" class="link-dark">
                                <i class="fa-solid fa-trash fs-5"></i>
                            </a>
                        </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous"></script>
</body>
</html>
