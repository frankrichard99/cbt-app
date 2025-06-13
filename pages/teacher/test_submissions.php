<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "teacher"){
    
   
    ?>
<div class="main">
    <div class="container">
    <div class="header">
        <h1>Test Submissions</h1>
        <span class="search">
        <form action="dashboard.php" method="post">
        <input class="search-bar" type="text" placeholder="Search" required>
        <button class="search-icon" type="submit">
            <svg enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M27.414,24.586l-5.077-5.077C23.386,17.928,24,16.035,24,14c0-5.514-4.486-10-10-10S4,8.486,4,14  s4.486,10,10,10c2.035,0,3.928-0.614,5.509-1.663l5.077,5.077c0.78,0.781,2.048,0.781,2.828,0  C28.195,26.633,28.195,25.367,27.414,24.586z M7,14c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S7,17.86,7,14z" id="XMLID_223_"/></svg></button>
        </form>
        <button class="reload-icon">    
            <svg        style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
	        .st0{display:none;}
	        .st1{display:inline;}
	        .st2{opacity:0.2;fill:none;stroke:#000000;stroke-width:5.000000e-02;stroke-miterlimit:10;}
            </style><g class="st0" id="grid_system"/><g id="_icons"><g><path d="M19.9,11c-0.6,0-1,0.4-1,1c0,3.9-3.1,7-7,7c-0.2,0-0.5,0-0.7,0c-0.2,0-0.3,0-0.5-0.1c-0.2,0-0.3-0.1-0.5-0.1    c-0.1,0-0.2-0.1-0.3-0.1c-0.7-0.2-1.4-0.6-2-1c-0.1-0.1-0.2-0.1-0.2-0.2c-0.1-0.1-0.2-0.2-0.3-0.2C7.2,17.2,7,17,6.9,16.9    c-0.1-0.1-0.1-0.1-0.2-0.2l1.8-0.3c0.5-0.1,0.9-0.6,0.8-1.2c-0.1-0.5-0.6-0.9-1.2-0.8L4.8,15l0,0L4,15.2c-0.3,0-0.5,0.2-0.6,0.4    s-0.2,0.5-0.2,0.7l0.8,4.2c0.1,0.5,0.5,0.8,1,0.8c0.1,0,0.1,0,0.2,0c0.5-0.1,0.9-0.6,0.8-1.2l-0.3-1.7c0,0,0,0,0,0    c0.2,0.2,0.5,0.4,0.7,0.6c0,0,0,0,0.1,0c0.1,0.1,0.2,0.2,0.3,0.2c0.2,0.2,0.4,0.3,0.7,0.4c0,0,0,0,0,0C7.7,20,8,20.1,8.3,20.3    l0.1,0c0.1,0.1,0.3,0.1,0.5,0.2c0.4,0.1,0.8,0.2,1.1,0.3c0.2,0,0.4,0.1,0.6,0.1c0,0,0.1,0,0.1,0c0.1,0,0.3,0,0.4,0    c0.2,0,0.5,0,0.7,0c5,0,9-4,9-9C20.9,11.4,20.4,11,19.9,11z"/><path d="M4,13c0.6,0,1-0.4,1-1c0-3.9,3.1-7,7-7c0.2,0,0.5,0,0.7,0c0.2,0,0.3,0,0.5,0.1c0.2,0,0.3,0.1,0.5,0.1    c0.1,0,0.2,0.1,0.3,0.1c0.7,0.2,1.4,0.5,2,1c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0.1,0.2,0.1,0.3,0.2C16.7,6.8,16.8,7,17,7.1    c0.1,0.1,0.1,0.1,0.2,0.2l-1.8,0.3c-0.5,0.1-0.9,0.6-0.8,1.2c0.1,0.5,0.5,0.8,1,0.8c0.1,0,0.1,0,0.2,0l4.2-0.8    c0.5-0.1,0.9-0.6,0.8-1.2L20,3.5c-0.1-0.5-0.6-0.9-1.2-0.8c-0.5,0.1-0.9,0.6-0.8,1.2l0.3,1.7c0,0,0,0,0,0    c-0.2-0.2-0.5-0.5-0.7-0.6c0,0,0,0-0.1,0c-0.1-0.1-0.2-0.2-0.3-0.2c-0.2-0.2-0.4-0.3-0.7-0.5c0,0,0,0,0,0    c-0.3-0.2-0.6-0.3-0.9-0.5l-0.1,0c-0.1-0.1-0.3-0.1-0.5-0.2c-0.4-0.1-0.8-0.2-1.1-0.3c-0.2,0-0.4-0.1-0.6-0.1c0,0-0.1,0-0.1,0    c-0.1,0-0.3,0-0.4,0c-0.2,0-0.5,0-0.7,0c-5,0-9,4-9,9C3,12.6,3.4,13,4,13z"/></g></g></svg>
        </button>
        </span>
      </div>

        <div class="table-container">
            <table class="submissions-table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Test ID</th>
                        <th>Score</th>
                        <th>Date Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $lecturer_id = $_SESSION['user_id'];
                    $query = "SELECT 
                            student_tests.id AS submission_id,
                            student_tests.student_id,
                            student_tests.score,
                            student_tests.date_taken,
                            student_tests.correct_answers,
                            tests.test_id,
                            tests.question_count,
                            students.full_name AS student_name
                            FROM 
                            student_tests
                            JOIN 
                            tests ON student_tests.test_id = tests.test_id
                            JOIN 
                            students ON student_tests.student_id = students.matric_no
                            WHERE 
                            tests.lecturer_id = '$lecturer_id'";

                    $result = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row['student_name'];
                        $test_id = $row['test_id'];
                        $score = $row['score'];
                        $date_taken = $row['date_taken'];
                        $question_count = $row['question_count'];
                        $correct_answers = $row['correct_answers'];

                        $date_format = date("F j, Y", strtotime($date_taken));
                    ?>
                    <tr>
                        <td data-label="Student Name"><?php echo $name ?></td>
                        <td data-label="Test ID"><?php echo strtoupper($test_id) ?></td>
                        <td data-label="Score"><?php echo $score ?>%</td>
                        <td data-label="Date Submitted"><?php echo $date_format ?></td>
                        <td data-label="Actions">
                        <button class="view-btn" onclick="openPopup('<?php echo $name ?>','<?php echo strtoupper($test_id) ?>', '<?php echo $score ?>%','<?php echo $date_taken ?>', '<?php echo $correct_answers ?>/<?php echo $question_count ?>')">View</button>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Popup Modal -->
    <div class="popup-overlay" id="submissionPopup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <h3>Test Submission Details</h3>
            <p><strong>Student:</strong> <span id="popupStudent"></span></p>
            <p><strong>Test:</strong> <span id="popupTest"></span></p>
            <p><strong>Date Taken:</strong> <span id="popupDate"></span></p>
            <p><strong>Score:</strong> <span id="popupScore"></span></p>
            
            <p><strong>Correct Answers:</strong> <span id="popupCorrect"></span></p>
        </div>
    </div>
</div>

<script src="../../assets/js/dashboard.js"></script>
<script src="../../assets/js/teacher/test_submissions.js"></script>
  </body>
  </html>
  <?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>