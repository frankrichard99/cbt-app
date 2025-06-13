<?php 
  require('../../include/config.php');
  session_start();

  $account_type = $_SESSION['account_type'] ?? '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/dashboard.css">
  
  
  <?php
  $current_page = basename($_SERVER["PHP_SELF"]); // Get the filename

    if ($current_page === "dashboard.php") {
     echo '<link rel="stylesheet" href="../../assets/css/teacher/main.css">';
     echo '<title>Dashboard &#9679 Lecturer</title>';
  }else if ($current_page === "create_test.php") {
     echo '<link rel="stylesheet" href="../../assets/css/teacher/create_test.css">';
     echo '<title>Create Test</title>';
  } else if($current_page === "manage_tests.php"){
    echo '<link rel="stylesheet" href="../../assets/css/teacher/manage_tests.css">';
    echo '<title>Manage Test</title>';
  }
   else if($current_page === "add_questions.php"){
    echo '<link rel="stylesheet" href="../../assets/css/teacher/add_questions.css">';
    echo '<title>Add Questions</title>';
  }
   else if($current_page === "test_submissions.php"){
    echo '<link rel="stylesheet" href="../../assets/css/teacher/test_submissions.css">';
    echo '<title>Test Submissions</title>';
  }
   else if($current_page === "teacher_profile.php"){
    echo '<link rel="stylesheet" href="../../assets/css/teacher/teacher_profile.css">';
    echo '<title>Profile &#9679 Lecturer</title>';
  }
   else if($current_page === "student_records.php"){
    echo '<link rel="stylesheet" href="../../assets/css/teacher/student_records.css">';
    echo '<title>Student Records</title>';
  }
   else if($current_page === "student_dashboard.php"){
    echo '<link rel="stylesheet" href="../../assets/css/student/student_dashboard.css">';
    echo '<title>Dashboard &#9679 Student</title>';
  }
   else if($current_page === "student_profile.php"){
    echo '<link rel="stylesheet" href="../../assets/css/student/student_profile.css">';
    echo '<title>Profile &#9679 Student</title>';
  }
   
   else if($current_page === "take_test.php"){
    echo '<link rel="stylesheet" href="../../assets/css/student/take_test.css">';
    echo '<title>Take Test</title>';
  }
   else if($current_page === "begin_test.php"){
    echo '<link rel="stylesheet" href="../../assets/css/student/begin_test.css">';
    echo '<title>Test &#9679 Encrypted</title>';
  }
   else if($current_page === "submit_test.php"){
    echo '<link rel="stylesheet" href="../../assets/css/student/submit_test.css">';
    echo '<title>Submitted Test</title>';
  }
   else if($current_page === "view_results.php"){
    echo '<link rel="stylesheet" href="../../assets/css/student/view_results.css">';
    echo '<title>View Results</title>';
  }
  
?>
  <title>Document</title>
</head>
<body>
  <div class="parent">
    <nav>
      <span>Quizette</span>
      <div class="dropdown">
        <button id="dropbtn" class="account-div">
        <svg class="account-icon" style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><g id="user"><ellipse cx="12" cy="8" rx="5" ry="6"/><path d="M21.8,19.1c-0.9-1.8-2.6-3.3-4.8-4.2c-0.6-0.2-1.3-0.2-1.8,0.1c-1,0.6-2,0.9-3.2,0.9s-2.2-0.3-3.2-0.9    C8.3,14.8,7.6,14.7,7,15c-2.2,0.9-3.9,2.4-4.8,4.2C1.5,20.5,2.6,22,4.1,22h15.8C21.4,22,22.5,20.5,21.8,19.1z"/></g></g></svg>
        <p class="account-name"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Visitor'?></p>
        <svg fill="var(--light-blue-gray)" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><polygon fill-rule="evenodd" points="13.293 4.293 14.707 5.707 8 12.414 1.293 5.707 2.707 4.293 8 9.586"/></svg>
        </button>
        <div id="dropdown-content" class="dropdown-content">
        <?php if ($account_type === 'teacher') { ?>
        <a href="teacher_profile.php">My Account</a>
        <a href="#">FAQ</a>
        <a href="#">Settings</a>
        <?php }else{ ?>
          <a href="student_profile.php">My Account</a>
        <a href="#">FAQ</a>
        <a href="#">Settings</a>
        <?php } ?>
      </div>
</div>

      <button id="hamburger" class="hamburger">
      <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
      </button>
    </nav>