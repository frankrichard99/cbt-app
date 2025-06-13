<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "student"){
    

    // Check if the test has been completed
    if (isset($_SESSION['test_completed']) && $_SESSION['test_completed'] == true) {
    // Redirect to the results page if the test is completed
    header("Location: student_dashboard.php");
    exit();
    }

    ?>
   <div class="main">

   <?php 

   $test_id = $_GET['test_id'];

   $_SESSION['test_id'] = $test_id;
   
   $sql = "SELECT * FROM `tests` WHERE `test_id` = '$test_id'";

   $result = mysqli_query($conn, $sql);

   if($rw = mysqli_fetch_assoc($result)){
    $duration = $rw['duration'];
    $question_count = $rw['question_count'];


    ?>
    
    
   <div class="test-container">
    <!-- Header with Course Code and Timer -->
    <div class="test-header">
        <h2>Test ID: <?php echo $test_id ?></h2>
        <div class="timer">Time Left: <span id="time-left"><span class="min"></span>:<span class="sec"></span></span></div>
    </div>
<?php } ?>
    <!-- Question Number Navigation -->
    <div class="question-nav">
        
        
        <?php 

        $query = "SELECT * FROM `questions` WHERE `test_id` = '$test_id' ORDER BY RAND() LIMIT $question_count";
        $rs = mysqli_query($conn, $query);
        $sn = 1;

        $record = [];
        while($row = mysqli_fetch_assoc($rs)){ ?>
        <div class="question-box"><?php echo $sn ?></div>
        
        <?php 
      
        $question = $row['question_text'];
        $option_1 = $row['option_1'];
        $option_2 = $row['option_2'];
        $option_3 = $row['option_3'];
        $correct_option = $row['correct_option'];

        $question_details = [$question, $option_1, $option_2, $option_3, $correct_option];
        array_push($record, $question_details);
            $sn++;
            
            } 
        ?>
        
    </div>
     

       
           <!-- Question & Options Section -->
    <div class="question-section">
        <!-- <p class="question-text">What is 5 + 3?</p>
        <div class="options">
            <label><input type="radio" name="answer"> 6</label>
            <label><input type="radio" name="answer"> 7</label>
            <label><input type="radio" name="answer"> 8</label>
            <label><input type="radio" name="answer"> 9</label>
        </div> -->
    </div>

    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        <button class="prev-btn" onclick="prevQuestion()">Previous</button>
        <button class="next-btn" onclick="nextQuestion()">Next</button>
    </div>

    <!-- Submit Button -->
    <button class="submit-btn" style="margin-top: 5rem;" onclick="finishTest()"><a>Submit Test</a></button>
</div>

   </div>
     <script src="../../assets/js/dashboard.js"></script>
     <script>
             
        const duration = <?php echo json_encode($duration); ?>;

        const question_record = <?php echo json_encode($record); ?>; 
    </script>
     <script src="../../assets/js/student/begin_tests.js"></script>


</body>
</html>

<?php }
    else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>