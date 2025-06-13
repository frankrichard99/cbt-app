
<?php 
  require('../include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/sign.css">
  <title>Login Page</title>
</head>
<body>
  <div class="parent">
    <div class="leftdiv">
      <h1>Welcome back!</h1>
      <p>You can sign in to access your existing account </p>
    </div>
    <div class="main">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h1>Sign in</h1>
        <span class="username">
          <span class="svg">
            <svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><g id="user"><ellipse cx="12" cy="8" rx="5" ry="6"/><path d="M21.8,19.1c-0.9-1.8-2.6-3.3-4.8-4.2c-0.6-0.2-1.3-0.2-1.8,0.1c-1,0.6-2,0.9-3.2,0.9s-2.2-0.3-3.2-0.9    C8.3,14.8,7.6,14.7,7,15c-2.2,0.9-3.9,2.4-4.8,4.2C1.5,20.5,2.6,22,4.1,22h15.8C21.4,22,22.5,20.5,21.8,19.1z"/></g></g></svg>
          </span>
          <input type="text" name="username" placeholder="Enter ID" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : '' ?>" required>
        </span>
        <span class="password">
          <span class="svg">
            <svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M20,10h-4H8l0-2.8c0-2.1,1.5-4,3.6-4.2C14,2.8,16,4.7,16,7l0,0c0,0.6,0.4,1,1,1h1c0.6,0,1-0.4,1-1l0,0   c0-3.8-3-6.9-6.8-7C8.3-0.1,5,3.1,5,7v3H4c-1.1,0-2,0.9-2,2v7c0,2.8,2.2,5,5,5h10c2.8,0,5-2.2,5-5v-7C22,10.9,21.1,10,20,10z    M13,17.7V19c0,0.5-0.5,1-1,1s-1-0.5-1-1v-1.3c-0.6-0.3-1-1-1-1.7c0-1.1,0.9-2,2-2s2,0.9,2,2C14,16.7,13.6,17.4,13,17.7z" id="password"/></g></svg>
          </span>
          <input type="password" name="password" placeholder="Enter password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : '' ?>" required>
        </span>
        <span class="account-type">
          <span class="teacher">
            <input type="radio" id="teacher" name="account-type" value="teacher" required>
            <label for="teacher">Lecturer</label>
          </span>
          <span class="student">
            <input type="radio" id="student" name="account-type" value="student">
            <label for="student">Student</label>
          </span>
        </span>
        <span class="recovery">
          <span class="recovery-left">
          <input type="checkbox" id="remember-me">
          <label for="remember-me">Remember me</label>
          </span>
          
          <a href="#">Forgot password?</a>
        </span>
        <input name="login-btn" type="submit" value="Sign in">
        
<?php



if(isset($_POST['login-btn'])){

  $username = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
  $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));
  $account_type = $_POST["account-type"];

  $pattern = "/^[0-9]{2}\/[0-9]{4}$/";
  if(preg_match($pattern, $username)){
    
    



  if($account_type == "teacher"){
    $query = "SELECT * FROM `lecturers` WHERE `lecturer_id` = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row){
      if(password_verify($password, $row['password'])){
        session_start();
        $_SESSION['user_id'] = $row['lecturer_id'];
        $_SESSION['name'] = $row['full_name'];
        $_SESSION['account_type'] = "teacher";
        
        
          echo "Login Successful";
          echo '
          <script>
          setTimeout(()=>{
          window.location.href = "../pages/teacher/dashboard.php";
          }, 1000);
          </script>';
        }
    }else{
      echo 'Lecturer does not exist';
    }
   
  }
  else if($account_type == "student"){
    $query = "SELECT * FROM `students` WHERE `matric_no` = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row){
      if(password_verify($password, $row['password'])){
        session_start();
        $_SESSION['user_id'] = $row['matric_no'];
        $_SESSION['name'] = $row['full_name'];
        $_SESSION['account_type'] = "student";
        
        $s_query = "UPDATE `students` SET `status` = 'online' WHERE `matric_no` = '$username'";
        if(mysqli_query($conn, $s_query)){
        
          echo "Login Successful";
          echo '
          <script>
          setTimeout(()=>{
          window.location.href = "../pages/student/student_dashboard.php";
          }, 1000);
          </script>';
        }
      }else{
        echo 'Incorrect username or password';
      }
    }else{
      echo 'Student does not exist';
    }
   
  }
}else{
  echo "Wrong user id format";
}
  
}

?>
        <span>New here? <a href="./register_student.php">Create an Account</a></span>
      </form>
    </div>
  </div>
</body>
</html>
