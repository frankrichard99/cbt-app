<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "student"){
        $_SESSION['test_completed'] = false;


   
    ?>
   <div class="main">

   <div class="test-container">
    <h2>Available Tests</h2>
    <div class="test-list">

    <?php       
                $user_id = $_SESSION['user_id'];
                $query = "SELECT * FROM `tests`
                          WHERE `is_published` = 1
                          AND `test_id` NOT IN (
                          SELECT test_id FROM student_tests WHERE student_id = '$user_id'
                                              )
                          ORDER BY created_at DESC;
                          ";
                  $q_result = mysqli_query($conn, $query);
                
                  while($row = mysqli_fetch_assoc($q_result)){
                    $test_id= $row['test_id'];
                    $test_id = strtoupper($test_id);
                    $course_code = strtoupper($row['course_code']);
                    $course_title = $row['course_title'];
                    $question_count = $row['question_count'];
                    $duration = $row['duration'];

                    $lecturer_id = $row['lecturer_id'];
                    $query = "SELECT * FROM `lecturers` WHERE `lecturer_id` = '$lecturer_id'";
                    $result = mysqli_query($conn, $query);
            
                    if($n_row = mysqli_fetch_assoc($result)){
                        $name = $n_row['full_name'];
                    }
            ?>
        <div class="test-card">
            <h2 class="card-h2">Test ID: <?php echo $test_id ?></h2>
            <h3 class="card-h3">Course ID: <?php echo $course_code ?></h3>
            <p><?php echo $course_title ?></p>
            <p>Total Questions: <?php echo $question_count ?></p>
            <p>Time Allowed: <?php echo $duration ?> minutes</p>
            <p class="lecturer">Lecturer: <?php echo $name ?></p>
            <button class="take-test-btn"><a target="_blank" href="./begin_test.php?test_id=<?php echo htmlspecialchars($test_id) ?>">Take Test</a></button>
        </div>
                    <?php }  ?>
        
    </div>
</div>

   </div>
     <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>