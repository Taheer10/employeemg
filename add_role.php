<?php
include "db_conn.php";



   if(isset($_GET['first_name'])){
            $firstName = $_GET['first_name'];

            $sql = "Select first_name from emp_register WHERE id = $firstName";
            if($result = mysqli_query($conn, $sql)) {
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){
                        $dbselected = $row['first_name'];
                    }
                    // Function frees the memory associated with the result
                    mysqli_free_result($result);
                }
                else {
                    echo "Something went wrong...";
                }
            }
            else {
                echo "ERROR: Could not execute $sql." . mysqli_error($link);
            }
        }

        

        if (isset($_POST["submit"])) {
   $emp_name = $_POST['emp_name'];
   $position = $_POST['position'];
   $faculty = $_POST['faculty'];

   $sql = "INSERT INTO `roles`(`role_id`, `emp_name`, `position`, `faculty`) VALUES (NULL,'$emp_name','$position','$faculty')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: view_role.php?msg=New Role assigned successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}



        

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>     Employee Management System</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
     Employee Record Management System
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Assign Role to User</h3>
        
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                   <div class="col">
                  <label class="form-label">Employee Name:</label>
                  <input type="text" class="form-control" name="emp_name" >
               </div>


               <div class="col">
                  <label class="form-label">Position:</label>
                  <input type="text" class="form-control" name="position">
               </div>

                <div class="col">
                  <label class="form-label">Faculty:</label>
                  <input type="text" class="form-control" name="faculty">
               </div>
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>