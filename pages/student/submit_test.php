<?php
    include("../../include/t_top.php");
    include("../../include/t_left.php");
    $account_type = isset($_SESSION['account_type']) ?? '' ;
    
        

    if($account_type == "student") {
     
    $test_id = $_SESSION['test_id'];
    $student_id = $_SESSION['user_id'];

        
    $correct_amount = 0;
    $score = 0;

    if(isset($_POST['results'])){
        $_SESSION['test_completed'] = true;

        $results = json_decode($_POST['results'], true);


     
        foreach ($results as $result) {
            // Access the question, selected answer, correct answer, and whether the answer is correct
            //$question = $result['question'] . "<br>";
            $selected = $result['selected'] . "<br>";
            $correct = $result['correct'] . "<br>";
            //$isCorrect = $result['isCorrect'] ."<br>";

            if($selected == $correct){
                $correct_amount++;
            }  
        } 

        $correct_amount;
        $total_questions = count($results);
        $score = ($correct_amount / $total_questions) * 100;
        $score = round($score, 2);
        
        $test_id = strtolower($test_id);

        $send_query = "INSERT INTO `student_tests`(`student_id`, `test_id`, `correct_answers`, `score`) VALUES ('$student_id','$test_id','$correct_amount','$score')";
        
        if(mysqli_query($conn, $send_query)){
            
        }
        else{

        }

    
     }
 
        
?>


   <div class="main">

   <div class="submitted-test-container">

   <?php 
    $query = "SELECT * FROM tests WHERE test_id = '$test_id'";
    $q_result = mysqli_query($conn, $query);

    if($row = mysqli_fetch_assoc($q_result)){
        $test_id= $row['test_id'];
        $test_id = strtoupper($test_id);
        $course_code = strtoupper($row['course_code']);
        $course_title = $row['course_title'];
        $question_count = $row['question_count'];
        $duration = $row['duration'];
   ?>
    <h2 class="course-header"><?php echo $test_id ?> - <?php echo $course_title ?></h2>


    <div class="success-icon">
        ✔
    </div>


    <p class="confirmation-message">Your score has been captured!</p>

    <!-- Optional: Score Display -->
    <div class="score-box">
        <p><strong>Your Score:</strong> <?php echo $score ?>%</p>
    </div>

    <!-- Optional: Test Summary -->
    <div class="test-summary">
        
        <p><strong>Total Questions:</strong> <?php echo $question_count ?></p>
        <p><strong>Correct Answers:</strong> <?php echo $correct_amount ?></p>
    </div>

    <!-- Back to Dashboard Button -->
    <a href="student_dashboard.php" class="back-button">Back to Dashboard</a>
    <?php } ?>
</div>
   </div>
     <script src="../../assets/js/dashboard.js"></script>
     <script src="../../assets/js/student/submit_test.js"></script>
</body>
</html>
<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>