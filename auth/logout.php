

<?php

require('../include/config.php');
session_start();
$account_type = isset($_SESSION['account_type']) ?? '' ;

$user_id = isset($_SESSION['user_id']) ?? '';

if($account_type == "student"){
  $s_query = "UPDATE `students` SET `status` = 'offline' WHERE `matric_no` = '$user_id'";
        if(mysqli_query($conn, $s_query)){
    
          // header("Location: login.php"); // Redirect to login page
          // exit();
        }
}

session_destroy(); // Destroy all session data
// header("Location: login.php"); // Redirect to login page
// exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/logout.css">
  <title>Logout Page</title>
</head>
<body>
  <div class="parent">
    <div class="leftdiv">
      <h1>Goodbye For Now!</h1>
      <p>You can log back in to access your existing account </p>
    </div>
    <div class="main">
      
        <h1>Log out</h1>
        <span class="tick">
          <div>✔</div>
        </span>
     
        
        
        <a href="./login.php">Back to Login</a>
        
       
      
    </div>
  </div>
</body>
</html>
