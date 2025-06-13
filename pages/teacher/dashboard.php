<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "teacher"){
        $lecturer_id = $_SESSION['user_id'];
   
    ?>
   <div class="main">
    <div class="dashboard">
      <div class="header">
        <h1>Dashboard</h1>
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
      <div class="stats">
            <div class="stat-box">
                <h3>TESTS CREATED</h3>
                <p>
                    <span>
                    <?php 
                    $query = "SELECT COUNT(*) AS total FROM tests WHERE `lecturer_id` = '$lecturer_id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                    ?>
                    </span>
                    <span class="svg"><svg enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M37,47H11c-2.209,0-4-1.791-4-4V5c0-2.209,1.791-4,4-4h18.973  c0.002,0,0.005,0,0.007,0h0.02H30c0.32,0,0.593,0.161,0.776,0.395l9.829,9.829C40.84,11.407,41,11.68,41,12l0,0v0.021  c0,0.002,0,0.003,0,0.005V43C41,45.209,39.209,47,37,47z M31,4.381V11h6.619L31,4.381z M39,13h-9c-0.553,0-1-0.448-1-1V3H11  C9.896,3,9,3.896,9,5v38c0,1.104,0.896,2,2,2h26c1.104,0,2-0.896,2-2V13z M33,39H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18  c0.553,0,1,0.448,1,1C34,38.553,33.553,39,33,39z M33,31H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1  C34,30.553,33.553,31,33,31z M33,23H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1C34,22.553,33.553,23,33,23  z" fill-rule="evenodd"/></svg></span>
                </p>
                <p class="growth positive">⬆ 5.27% Since last month</p>
            </div>

            <div class="stat-box">
                <h3>PENDING TESTS</h3>
                <p>
                    <span> <?php 
                    $query = "SELECT COUNT(*) AS total FROM tests WHERE `lecturer_id` = '$lecturer_id' AND `is_published` = 0";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                    ?></span>
                    <span class="svg"><svg enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M37,47H11c-2.209,0-4-1.791-4-4V5c0-2.209,1.791-4,4-4h18.973  c0.002,0,0.005,0,0.007,0h0.02H30c0.32,0,0.593,0.161,0.776,0.395l9.829,9.829C40.84,11.407,41,11.68,41,12l0,0v0.021  c0,0.002,0,0.003,0,0.005V43C41,45.209,39.209,47,37,47z M31,4.381V11h6.619L31,4.381z M39,13h-9c-0.553,0-1-0.448-1-1V3H11  C9.896,3,9,3.896,9,5v38c0,1.104,0.896,2,2,2h26c1.104,0,2-0.896,2-2V13z M33,39H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18  c0.553,0,1,0.448,1,1C34,38.553,33.553,39,33,39z M33,31H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1  C34,30.553,33.553,31,33,31z M33,23H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1C34,22.553,33.553,23,33,23  z" fill-rule="evenodd"/></svg></span>
                </p>
                <p class="growth negative">⬇ 5.27% Since last month</p>
            </div>

            <div class="stat-box">
                <h3>STUDENTS</h3>
                <p>
                    <span><?php 
                    $query = "SELECT COUNT(*) AS total FROM students";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                    ?></span>
                    <span class="svg"><svg enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M9,9c0-1.7,1.3-3,3-3s3,1.3,3,3c0,1.7-1.3,3-3,3S9,10.7,9,9z M12,14c-4.6,0-6,3.3-6,3.3V19h12v-1.7C18,17.3,16.6,14,12,14z   "/></g><g><g><circle cx="18.5" cy="8.5" r="2.5"/></g><g><path d="M18.5,13c-1.2,0-2.1,0.3-2.8,0.8c2.3,1.1,3.2,3,3.2,3.2l0,0.1H23v-1.3C23,15.7,21.9,13,18.5,13z"/></g></g><g><g><circle cx="18.5" cy="8.5" r="2.5"/></g><g><path d="M18.5,13c-1.2,0-2.1,0.3-2.8,0.8c2.3,1.1,3.2,3,3.2,3.2l0,0.1H23v-1.3C23,15.7,21.9,13,18.5,13z"/></g></g><g><g><circle cx="5.5" cy="8.5" r="2.5"/></g><g><path d="M5.5,13c1.2,0,2.1,0.3,2.8,0.8c-2.3,1.1-3.2,3-3.2,3.2l0,0.1H1v-1.3C1,15.7,2.1,13,5.5,13z"/></g></g></svg></span>
                </p>
                <p class="growth positive">⬆ 5.27% Since last month</p>
            </div>

            <div class="stat-box">
                <h3>COMPLETED TESTS</h3>
                <p>
                    <span><?php 
                    $query = "SELECT 
                    COUNT(DISTINCT test_id) AS total FROM student_tests";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                    ?></span>
                    <span class="svg"><svg enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M37,47H11c-2.209,0-4-1.791-4-4V5c0-2.209,1.791-4,4-4h18.973  c0.002,0,0.005,0,0.007,0h0.02H30c0.32,0,0.593,0.161,0.776,0.395l9.829,9.829C40.84,11.407,41,11.68,41,12l0,0v0.021  c0,0.002,0,0.003,0,0.005V43C41,45.209,39.209,47,37,47z M31,4.381V11h6.619L31,4.381z M39,13h-9c-0.553,0-1-0.448-1-1V3H11  C9.896,3,9,3.896,9,5v38c0,1.104,0.896,2,2,2h26c1.104,0,2-0.896,2-2V13z M33,39H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18  c0.553,0,1,0.448,1,1C34,38.553,33.553,39,33,39z M33,31H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1  C34,30.553,33.553,31,33,31z M33,23H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1C34,22.553,33.553,23,33,23  z" fill-rule="evenodd"/></svg></span>
                </p>
                <p class="growth positive">⬆ 5.27% Since last month</p>
            </div>
        </div>

        <div class="dashboard-container">
    <div class="left-panel">
    <div class="stat-box card">
                <h3>YOUR COMPLETED TESTS</h3>
                <p>
                    <span><?php 
                    $query = "SELECT COUNT(DISTINCT student_tests.test_id) AS completed_tests
                              FROM student_tests
                              JOIN tests ON student_tests.test_id = tests.test_id
                              WHERE tests.lecturer_id = '$lecturer_id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['completed_tests'];
                    ?></span>
                    <span class="svg"><svg enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M37,47H11c-2.209,0-4-1.791-4-4V5c0-2.209,1.791-4,4-4h18.973  c0.002,0,0.005,0,0.007,0h0.02H30c0.32,0,0.593,0.161,0.776,0.395l9.829,9.829C40.84,11.407,41,11.68,41,12l0,0v0.021  c0,0.002,0,0.003,0,0.005V43C41,45.209,39.209,47,37,47z M31,4.381V11h6.619L31,4.381z M39,13h-9c-0.553,0-1-0.448-1-1V3H11  C9.896,3,9,3.896,9,5v38c0,1.104,0.896,2,2,2h26c1.104,0,2-0.896,2-2V13z M33,39H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18  c0.553,0,1,0.448,1,1C34,38.553,33.553,39,33,39z M33,31H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1  C34,30.553,33.553,31,33,31z M33,23H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1C34,22.553,33.553,23,33,23  z" fill-rule="evenodd"/></svg></span>
                </p>
                <p class="growth positive">⬆ 5.27% Since last month</p>
            </div>
            <div class="stat-box card">
                <h3>BEST STUDENT</h3>
                <p>
                    <span>
                    <?php 
                    $query = "SELECT 
    MAX(student_tests.score) AS score,
    students.full_name
FROM 
    student_tests
JOIN 
    students ON students.matric_no = student_tests.student_id
JOIN
    tests ON tests.test_id = student_tests.test_id
JOIN
    lecturers ON lecturers.lecturer_id = tests.lecturer_id
WHERE 
    lecturers.lecturer_id = '$lecturer_id'";


                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['full_name'] ?? 'None';
                    ?></span>
                    <span class="svg"><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><g id="user"><ellipse cx="12" cy="8" rx="5" ry="6"/><path d="M21.8,19.1c-0.9-1.8-2.6-3.3-4.8-4.2c-0.6-0.2-1.3-0.2-1.8,0.1c-1,0.6-2,0.9-3.2,0.9s-2.2-0.3-3.2-0.9    C8.3,14.8,7.6,14.7,7,15c-2.2,0.9-3.9,2.4-4.8,4.2C1.5,20.5,2.6,22,4.1,22h15.8C21.4,22,22.5,20.5,21.8,19.1z"/></g></g></svg></span>
                </p>
                <p class="growth positive">In the last month</p>
            </div>
    </div>

    <div class="right-panel">
    <div class="test-section">
    <h3>TEST MANAGEMENT</h3>
    <p>RECENT TESTS CREATED AND THEIR STATUS</p>
    <table>
        <thead>
            <tr>
                <th>Test Title</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Time Limit</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM tests ORDER BY id DESC LIMIT 3;";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
                
                $course_title = $row['course_title'];
                $question_count = $row['question_count'];
                $is_published = $row['is_published'];
                $duration = $row['duration'];
                $who_set = $row['lecturer_id'];
            ?>
            <tr>
                <td><?php echo $course_title ?></td>
                <td><?php 
                
                    if($is_published == 1){
                        echo "<span class='status live'>Live</span>";
                    }
                    else{
                        echo "<span class='status down'>Down</span>";
                    }
                ?></span></td>
                <td><?php 
                $who_query = "SELECT `full_name` FROM `lecturers` WHERE `lecturer_id` = '$lecturer_id'";
                $who_result = mysqli_query($conn, $who_query);
                $who_row = mysqli_fetch_assoc($who_result);
                echo $who_row['full_name'];
                
                ?></td>
                <td><?php echo $duration ?> mins</td>
                <!-- <td>
                    <a href="./manage_tests.php" style="text-decoration: none;"><span class="edit">✏️</span></a>
                    <a href="./manage_tests.php" style="text-decoration: none;"><span class="delete">🗑️</span></a>
                </td> -->
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    </div>
</div>

<div class="cbt-dashboard">
    <!-- Top Scoring Students -->
    <div class="top-scorers-section">
        <div class="cbt-card">
            <div class="cbt-card-header">
                <h3>TOP SCORERS</h3>
                <span class="cbt-menu-icon"></span>
            </div>
            <div class="cbt-table-wrapper">
                <table class="cbt-score-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Score</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT student_tests.score,
                                    students.full_name,
                                    tests.lecturer_id
                                    FROM student_tests
                                    JOIN students ON student_tests.student_id = students.matric_no
                                    JOIN tests ON tests.test_id = student_tests.test_id
                                    JOIN lecturers ON lecturers.lecturer_id = tests.lecturer_id 
                                    WHERE tests.lecturer_id = '$lecturer_id'
                                    ORDER BY 
                                    student_tests.score DESC
                                    LIMIT 5;";
                                    $result = mysqli_query($conn, $query);
                                    if($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            
                            <td><strong><?php echo $row['full_name'] ?></strong></td>
                            <td><?php echo $row['score'] ?>%</td>
                            <td>🥇</td>
                        </tr>
                        <tr>
                            <?php if($row = mysqli_fetch_assoc($result)){?>
                            <td><strong><?php echo $row['full_name'] ?></strong></td>
                            <td><?php echo $row['score'] ?>%</td>
                            <td>🥈</td>
                            <?php } ?>
                        </tr>
                        <tr>
                        <?php if($row = mysqli_fetch_assoc($result)){?>
                            <td><strong><?php echo $row['full_name'] ?></strong></td>
                            <td><?php echo $row['score'] ?>%</td>
                            <td>🥉</td>
                            <?php } ?>
                            
                        </tr>
                        <?php if($row = mysqli_fetch_assoc($result)){?>
                            <td><strong><?php echo $row['full_name'] ?></strong></td>
                            <td><?php echo $row['score'] ?>%</td>
                            <td>4️⃣</td>
                            <?php } ?>
                            
                        </tr>
                        <?php if($row = mysqli_fetch_assoc($result)){?>
                            <td><strong><?php echo $row['full_name'] ?></strong></td>
                            <td><?php echo $row['score'] ?>%</td>
                            <td>5️⃣</td>
                            <?php } ?>
                            
                        </tr>
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Test Schedule -->
    <div class="test-timing-section">
        <div class="cbt-card">
            <div class="cbt-card-header">
                <h3>TEST SCHEDULE</h3>
                <span class="cbt-menu-icon"></span>
            </div>
            <?php 
                $query = "  SELECT `test_id`,`created_at` FROM `tests` WHERE `lecturer_id` = '$lecturer_id' LIMIT 5";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                    $test_id = $row['test_id'];
                    $date = $row['created_at'];
                    $date_format = date("F j, Y", strtotime($date));
            ?>
            <div class="cbt-schedule-list">
                <div class="cbt-test-item">
                    <span class="cbt-time">🕒 <?php echo $date_format ?></span>
                    <p style="font-weight: bold;margin-top: 5px"><?php echo $test_id = strtoupper($test_id) ?></p>
                </div>
            <?php } ?> 
            </div>
        </div>
    </div>
  

</div>
    </div>





    
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
   
   

    



<script src = "../../assets/js/teacher/main.js"></script>

  <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>