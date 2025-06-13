<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "student"){
        $user_id = $_SESSION['user_id'];
   
    ?>
   <div class="main">
   <div class="dashboard-container">
        <h2>Student Dashboard</h2>
        
        <!-- Test Overview Section -->
        <section class="test-overview">
            <h3>Test Overview</h3>
            <div class="test-cards">
                <div class="card upcoming">Upcoming: <span>
                <?php 
                    $query = "SELECT COUNT(*) AS total FROM tests WHERE `is_published` = 0";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                    ?></span></div>
                <div class="card available">Available: <span> 
                    <?php 
                    $query = "SELECT COUNT(*) AS total 
                        FROM `tests`
                          WHERE `is_published` = 1
                          AND `test_id` NOT IN (
                          SELECT test_id FROM student_tests WHERE student_id = '$user_id'
                                              )
                          ORDER BY created_at DESC;
                          ";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                    ?></span></div>
                <div class="card completed">Completed: <span>
                <?php
                $query = "SELECT COUNT(`id`) AS total FROM `student_tests` WHERE `student_id` = '$user_id'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                echo $row['total'];
                ?></span></div>
            </div>
        </section>

        <!-- Quick Links Section -->
<section class="quick-links">
    <h3>Quick Links</h3>
    <div class="quick-links-container">
        <a href="take_test.php" class="quick-link take-test">Take a Test</a>
        <a href="view_results.php" class="quick-link view-results">View Results</a>
    </div>
</section>

<!-- Recent Scores Section -->
<section class="recent-scores">
    <h3>Recent Scores</h3>
    <div class="scores-list">
        
    <?php 
        $query = "SELECT 
        student_tests.score,
        tests.course_title
        FROM student_tests
        JOIN tests ON tests.test_id = student_tests.test_id
        WHERE student_tests.student_id = '$user_id'
        ORDER BY student_tests.date_taken DESC
        LIMIT 3
        ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="score-item">
            <span class="subject"><?php echo $row['course_title'] ?></span>
            <span class="score"><?php echo $row['score'] ?>%</span>
        </div>
        <?php } ?>
    </div>
</section>


<?php 
        $query = "SELECT 
        student_tests.score,
        tests.course_title,
        student_tests.test_id
        FROM student_tests
        JOIN tests ON tests.test_id = student_tests.test_id
        WHERE student_tests.student_id = '$user_id'
        ORDER BY student_tests.date_taken DESC
        LIMIT 5
        ";
        $result = mysqli_query($conn, $query);
        $test_labels = [];
        $test_scores = [];
        while($row = mysqli_fetch_assoc($result)){
        $test = $row['test_id'];
        $score = $row['score'];
        array_push($test_labels, $test);
        array_push($test_scores, $score);


        }
    ?>
        <!-- Recent Scores Section -->
        <section class="chart">
            <h3>Performance Summary</h3>
            <canvas id="performanceChart"></canvas>
        </section>
 

    
<footer class="cbt-footer">
    <div class="cbt-footer-container">
        <p class="cbt-footer-text">
            &copy; 2020 CBT App. All Rights Reserved | Design by Frank
        </p>
        <div class="cbt-footer-links">
            <a href="#">About</a>
            <a href="#">Support</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
</footer>

</div>

   </div>
   <script>
             
        const test_labels = <?php echo json_encode($test_labels); ?>;

        const test_scores = <?php echo json_encode($test_scores); ?>; 
    </script>
     <script src="../../assets/js/dashboard.js"></script>
     <script src="../../assets/js/student/student_dashboard.js"></script>
     <script src="../../assets/js/chart.js"></script>

</body>
</html>

<?php }
    else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>