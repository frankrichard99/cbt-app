
<?php 
  require('../include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/register_teacher.css">
  <title>Teacher Registration</title>
</head>
<body>
  <div class="parent">
    <div class="leftdiv">
      <h1>Registration Page</h1>
      <p>Create a Lecturer account here</p>
      <p>Not a lecturer? <a class="reg-link" href="./register_student.php">Sign up as a Student</a></p>
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
          <div class="field">
            <input type="email" name="email" placeholder="Enter Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : '' ?>" required>
          </div>
          <div class="field">
            <input type="tel" name="phone" placeholder="Enter Phone Number" value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : '' ?>" required>
          </div>
        </div>
        <div class="field">
          <input type="text" name="teacherID" placeholder="Employee ID" value="<?php echo (isset($_POST['teacherID'])) ? $_POST['teacherID'] : '' ?>" required>
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Enter Password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : '' ?>" required>
        </div>
        <div class="field">
          <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo (isset($_POST['confirm_password'])) ? $_POST['confirm_password'] : '' ?>" required>
        </div>
        <input name="register-btn" type="submit" value="Register">

        <?php 
          if (isset($_POST['register-btn'])) {

            $firstname = mysqli_real_escape_string($conn, stripslashes($_POST['firstname']));
            $lastname = mysqli_real_escape_string($conn, stripslashes($_POST['lastname']));
            $email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));
            $phone = mysqli_real_escape_string($conn, stripslashes($_POST['phone']));
            $lecturer_id = mysqli_real_escape_string($conn, stripslashes($_POST['teacherID']));
            $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, stripslashes($_POST['confirm_password']));

            $lastname = ucfirst($lastname);
            $firstname = ucfirst($firstname);
            $fullname = $lastname . " " . $firstname;

            $pattern = "/^[0-9]{2}\/[0-9]{4}$/";
  if(preg_match($pattern, $lecturer_id)){
          if($password === $confirm_password){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `lecturers`(`lecturer_id`, `full_name`, `email`, `phone_number`, `password`) VALUES ('$lecturer_id','$fullname','$email','$phone','$password')";

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
          echo "Wrong user id format";
        }

    
}
?>
        <span>Have an account? <a class="sign-link" href="./login.php">Sign in</a></span>
      </form>
    </div>
  </div>
</body>
</html>
