<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "teacher"){
        $test_id = $_SESSION['user_id'];
   
    ?>

    <div class="main">
      <span class="heading">
        <h1>Create Tests</h1>
        <p>Click the button to create new test</p>
      </span>
        <div class="content">
            <!-- Create Test Button -->
       <div class="btn-area">
        <button class="create-btn" onclick="openPopup()">Create Test +</button>
        <p id="confirmP"></p>
        </div>
<!-- Table of Created Tests -->
<div class="test-list">
    
    <div class="header">
        <h2 style="  color: var(--deep-teal);">Created Tests</h2>
        <span class="menu-icon">⋮</span>
    </div>
    <table>
        <thead>
            <tr>
                <th>s/n</th>
                <th>Test ID</th>
                <th>Course Title</th>
                <th>Questions</th>
                <th>Time (mins)</th>
               
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM `tests` WHERE `lecturer_id` = '$test_id'";
                $result = mysqli_query($conn, $query);

                $sn = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $test_id= $row['test_id'];
                    $test_id = strtoupper($test_id);
                    $course_title = $row['course_title'];
                    $question_count = $row['question_count'];
                    $duration = $row['duration'];
            ?>
            <tr>
                <td><?php echo $sn ?></td>
                <td><?php echo $test_id?></td>
                <td><?php  echo $course_title?></td>
                <td><?php  echo $question_count?></td>
                <td><?php echo $duration ?></td>

            </tr>
            <?php 
        $sn++;
        } ?>
        </tbody>
    </table>
</div>
        </div>
    </div>

    <!-- Pop-up Form -->
    <div class="popup-overlay" id="popup">
        <div class="popup">
            <span class="close-btn" onclick="closePopup()">×</span>
            <h2>Create New Test</h2>
            <form id="testForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="text" placeholder="Course ID" name="course-id" required>
                <input type="text" placeholder="Course Title" name="course-title" required>
                <input type="number" placeholder="Number of Questions" name="question-count" required>
                <input type="number" placeholder="Time Limit (mins)" name="duration" required>
                <button type="submit" name="submit-btn">Create +</button>
            </form>
        </div>
    </div>

    <?php 



        if (isset($_POST['submit-btn'])) {

            $course_id = mysqli_real_escape_string($conn, stripslashes($_POST['course-id']));
            $course_title = mysqli_real_escape_string($conn, stripslashes($_POST['course-title']));
            $question_count = mysqli_real_escape_string($conn, stripslashes($_POST['question-count']));
            $duration = mysqli_real_escape_string($conn, stripslashes($_POST['duration']));

            $lecturer_id = $_SESSION['user_id'];


     
            $course_id = strtolower($course_id);
            $course_id = str_replace(" ", "", $course_id);
            $course_id = str_replace("-", "", $course_id);  

                //GENERATE TEST ID
                $sql = "SELECT COUNT(*) AS num FROM `tests` where course_code = '$course_id'";
                $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $count = $row['num'];
                
                $test_id = $course_id . '-'. ($count + 1);

               $query = "INSERT INTO `tests`(`test_id`, `course_code`, `course_title`, `duration`, `question_count`, `lecturer_id`) VALUES ('$test_id','$course_id','$course_title','$duration','$question_count','$lecturer_id')";

               if(mysqli_query($conn ,$query)){
                ?>
                
                <script>
                document.getElementById("confirmP").textContent = "Test Created Successfully";
               
                setTimeout(()=>{
                window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
                }, 1000);
                </script>
                <?php
              }

            } 

    
}
?>

 

    <script src="../../assets/js/teacher/create_test.js"></script>


<script src="../../assets/js/dashboard.js"></script>
</body>
</html>
<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>