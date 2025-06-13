
<?php 
  require('../include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/register_student.css">
  <title>Student Registration</title>
</head>
<body>
  <div class="parent">
    <div class="leftdiv">
      <h1>Registration Page</h1>
      <p>Create a Student account here</p>
      <p>Not a student? <a class="reg-link" href="./register_teacher.php">Sign up as a Lecturer</a></p>
    </div>
    <div class="main">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h1>Register Here</h1>
        <div class="input-group">
          <div class="field">
            <input type="text" name="firstname" placeholder="Enter Firstname" value="<?php echo (isset($_POST['firstname'])) ? $_POST['firstname'] : '' ?>" required>
          </div>
          <div class="field">
            <input type="text" name="lastname" placeholder="Enter Lastname" value="<?php echo (isset($_POST['lastname'])) ? $_POST['lastname'] : '' ?>" required>
          </div>
        </div>
        <div class="input-group">
          
            <select class="field" name="department" id="department" required>
              <option value="software engineering">software engineering</option>
              <option value="computer science">computer science</option>
              <option value="information technology">information technology</option>
            </select>
          
          <div class="field">
            <input type="email" name="email" placeholder="Enter Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : '' ?>" required>
          </div>
        </div>
        <div class="field">
          <input type="text" name="matric" placeholder="Matric Number" value="<?php echo (isset($_POST['matric'])) ? $_POST['matric'] : '' ?>" required>
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Enter Password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : '' ?>" required>
        </div>
        <div class="field">
          <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo (isset($_POST['confirm_password'])) ? $_POST['confirm_password'] : '' ?>" required>
        </div>
        <input type="submit" value="Register" name="register-btn">
        <?php 
          if (isset($_POST['register-btn'])) {

          $firstname = mysqli_real_escape_string($conn, stripslashes($_POST['firstname']));
          $lastname = mysqli_real_escape_string($conn, stripslashes($_POST['lastname']));
          $department = mysqli_real_escape_string($conn, stripslashes($_POST['department']));
          $email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));
          $matric_no = mysqli_real_escape_string($conn, stripslashes($_POST['matric']));
          $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));
          $confirm_password = mysqli_real_escape_string($conn, stripslashes($_POST['confirm_password']));

          $lastname = ucfirst($lastname);
          $firstname = ucfirst($firstname);
          $fullname = $lastname . " " . $firstname;

          
  $pattern = "/^[0-9]{2}\/[0-9]{4}$/";
  if(preg_match($pattern, $matric_no)){
      
          if($password === $confirm_password){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `students`(`matric_no`, `full_name`, `email`, `department`, `password`) VALUES ('$matric_no','$fullname','$email','$department','$password')";

            if(mysqli_query($conn, $sql)){
              echo "Registration Successful";
              echo '
              <script>
              setTimeout(()=>{
              window.location.href = "login.php";
              }, 1000);
              </script>';
            }
          }
        }else{
          echo "Wrong matric no format";
        }
    
}
?>

        <span>Have an account? <a class="sign-link" href="./login.php">Sign in</a></span>
      </form>
    </div>
  </div>
</body>
</html>
