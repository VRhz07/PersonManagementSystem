
<?php
include "dbconn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $Firstname = $_POST['first_name'];
    $Lastname = $_POST['last_name'];
    $Gender = $_POST['gender'];
    $ContactNumber = $_POST['ContactNumber'];
    $Email = $_POST['Email'];

    $sql = "UPDATE `person` SET `Firstname`='$Firstname',`Lastname`='$Lastname',`Gender`='$Gender',`ContactNumber` = '$ContactNumber',`Email`='$Email' WHERE id=$id";

    $result = mysqli_query($conn, $sql);    

    if($result){
        header("Location: index.php?msg=Data updated successfully");
    }
    else{
        echo "Failed: " . mysqli_connect_error($conn);
    }
}


?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

   <!--Bootstrap-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
   crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
   integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
   crossorigin="anonymous" referrerpolicy="no-referrer" />




    <title>Document</title>
</head>
<body id="bgbody">
    
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Persons Information
     </nav>

     <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Persons Information</h3>
            <p class="text-muted">Click update after change any information</p>
        </div>

        <?php
       
        $sql = "SELECT * FROM `person` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        ?>

        <div class="container d=flex; justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px">
                <div class="row mb-3">

                    <div class="col">
                    <label for="" class="form-label">Firstname:</label>
                    <input type="text" class="form-control" name="first_name"
                    value="<?php echo $row['Firstname']?>";
                    </div>

                    <div class="col">
                    <label for="" class="form-label">Lastname:</label>
                    <input type="text" class="form-control" name="last_name"
                    value="<?php echo $row['Lastname']?>";
                    </div>

                </div>
                
                <div class="mb-3">

                <label for="" class="form-label">Contact Number:</label>
                    <input type="tel" class="form-control" name="ContactNumber"
                    value="<?php echo $row['ContactNumber']?>";
                    
                <label for="" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="Email"
                    value="<?php echo $row['Email']?>";

                </div>

                <div class="form-group mb-3">
                    <label for="">Gender:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="male" value="male" <?php echo ($row["Gender"] == 'male') ? "checked" : ""; ?>>
                    <label for="male" class="form-input-label">Male</label>

                    &nbsp;

                    <input type="radio" class="form-check-input" name="gender"
                    id="female" value="female" <?php echo ($row["Gender"] == 'female') ? "checked" : ""; ?>>
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>


            </form>
        </div>
     </div>

     <!-- Bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
     crossorigin="anonymous"></script>

     
</body>
</html>