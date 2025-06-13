<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "teacher"){
    
   
    ?>
   <div class="main">
   <div class="header">
        <h2>Manage Tests</h2>
        <p id="confirmP" style="color: red"></p>
        <span class="search">
        <form action="dashboard.php" method="post">
        <input class="search-bar" type="text" placeholder="Search by course code" required>
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
    
    <div class="test-container">
    <?php 
                $lecturer_id = $_SESSION['user_id'];
                $query = "SELECT * FROM `tests` WHERE `lecturer_id` = '$lecturer_id'";
                $result = mysqli_query($conn, $query);

                $sn = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $test_id= $row['test_id'];
                    $test_id = strtoupper($test_id);
                    $course_code = $row['course_code'];
                    $course_code = strtoupper($course_code);
                    $course_title = $row['course_title'];
                    $question_count = $row['question_count'];
                    $duration = $row['duration'];
                    $is_published = $row['is_published'];
            ?>
        <div class="test-card">
            <div class="state <?php if($is_published){
                echo 'green';
            }
            else{
                echo "red";
            }?>">
            <?php
            if($is_published){
                echo "LIVE";
            }
            else{
                echo "DOWN";
            }
            ?></div>
            <div class="test-id">Test ID: <?php echo $test_id ?></div>
            <div class="course-code">Course ID: <?php echo $course_code ?></div>
            <div class="course-name"><?php echo $course_title ?></div>
            <div class="details">Total Questions: <?php  echo $question_count?></div>
            <div class="details">Time Allowed: <?php echo $duration ?> minutes</div>
            <div class="details">Questions Made: 
            <?php 
            $count_query = "SELECT COUNT(*) as `num` FROM `questions` WHERE `test_id` = '$test_id'";
            $rs = mysqli_query($conn, $count_query);
            $num = mysqli_fetch_assoc($rs);

            echo $num['num'];
            ?></div>
            <div class="btn-group">
                <button class="btn add"><a href="add_questions.php?test_id=<?php echo htmlspecialchars(strtolower($test_id)) ?>">Add Question</a></button>
                <button class="btn modify modify-btn" onclick="openModifyCoursePopup('<?php echo $test_id ?>','<?php echo $course_code ?>', '<?php echo $course_title ?>', '<?php echo $question_count ?>', '<?php echo $duration ?>')">Modify</button>
                <button class="btn delete" onclick="openDeletePopup('<?php echo $test_id ?>', '<?php echo $test_id ?>')">Delete</button>
            </div>
        </div>
        <?php }
        ?>

    </div>
    
   </div>

    <!-- DELETE POP UP -->
   <div id="deletePopup" class="popup-overlay">
    <div class="popup-box">
        <form id="delForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <input type="text" style="display: none;" name="hide-id" id="hide-id">
        <p id="deleteMessage"></p>
        <div class="popup-buttons">
            
            <button type="button" class="no-btn" onclick="closePopup()">No</button>
            <button name="del-btn" type="submit" class="yes-btn" onclick="closePopup()">Yes</button>
        </div>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['del-btn'])){

        $id = $_POST['hide-id'];

        $live_query = "SELECT `is_published` FROM `tests` WHERE `test_id` = '$id'";
        $live_result = mysqli_query($conn, $live_query);
        $live_row = mysqli_fetch_assoc($live_result);
    
        if($live_row['is_published'] == 0){
            
            $query = "DELETE FROM `tests` WHERE `test_id` = '$id'";
            if(mysqli_query($conn, $query)){

                ?>
                <script>
                
                document.getElementById('confirmP').textContent = "Deleted Successfully";
                setTimeout(()=>{
                window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
                }, 1000);
                </script>
                <?php
            }
            else{
            ?>
            <script>
            document.getElementById('confirmP').textContent = "Deleted un-successful";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
            }, 1000);
            </script>
            <?php
        }
    } else{
        ?>
        <script>
        document.getElementById('confirmP').textContent = "Take Test down before deleting";
        setTimeout(()=>{
        window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
        }, 1000);
        </script>
        <?php
        }
}
      
    
?>
<!-- MODIFY POP UP -->
<div id="modifyPopup" class="popupoverlay">
    <div class="popupbox" id="popup-box">
        <span class="popup-close-btn" onclick="closeModifyCoursePopup()">&times;</span>
        <h3>Modify Course</h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" style="display: none;" name="hide-mod" id="hide-mod">
        <input type="text" id="CourseId" placeholder="Course ID" name="course-code">
        <input type="text" id="CourseName" placeholder="Course Name" name="course-name">
        <input type="number" id="NumQuestions" placeholder="Number of Questions" name="question-count">
        <input type="number" id="TimeLimit" placeholder="Time Limit (mins)" name="duration">
        
        <div class="popup-buttons">
            <button type="button" class="popup-close" onclick="closeModifyCoursePopup()">Close</button>
            <button type="submit" name="save-btn" class="popup-save" onclick="saveChanges()">Save Changes</button>
        </div>
        </form>
    </div>
</div>

<?php 
if(isset($_POST['save-btn'])){
    
    $id = stripslashes(mysqli_real_escape_string($conn, $_POST['hide-mod']));
    $course_code = stripslashes(mysqli_real_escape_string($conn, $_POST['course-code']));
    $course_name = stripslashes(mysqli_real_escape_string($conn, $_POST['course-name']));
    $question_count = stripslashes(mysqli_real_escape_string($conn, $_POST['question-count']));
    $duration = stripslashes(mysqli_real_escape_string($conn, $_POST['duration']));



    $course_code = strtolower($course_code);
    $course_code = str_replace(" ", "", $course_code);
    $course_code = str_replace("-", "", $course_code);  

   

    $live_query = "SELECT `is_published` FROM `tests` WHERE `test_id` = '$id'";
    $live_result = mysqli_query($conn, $live_query);
    $live_row = mysqli_fetch_assoc($live_result);

    if($live_row['is_published'] == 0){

        $sql = "SELECT COUNT(*) AS num FROM `tests` where course_code = '$course_code'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['num'];
        
        $test_id = $course_code . '-'. ($count + 1);

        
        $query = "UPDATE `tests` SET `test_id`='$test_id',`course_code`='$course_code',`course_title`='$course_name',`duration`='$duration',`question_count`='$question_count' WHERE `test_id`='$id'";

        
        if(mysqli_query($conn, $query)){

            ?>
            <script>
                
            document.getElementById('confirmP').textContent = "Updated Successfully";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
            }, 1000);
            </script>
            <?php
        }
        else{
            ?>
            <script>
            document.getElementById('confirmP').textContent = "Update un-successful";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
            }, 1000);
            </script>
            <?php
            }
    
        }
    }
    else{
        ?>
        <script>
        document.getElementById('confirmP').textContent = "Take Test down before editing";
        setTimeout(()=>{
        window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
        }, 1000);
        </script>
        <?php
        }
}
?>
     
  <script src="../../assets/js/dashboard.js"></script>
     
    <script src="../../assets/js/teacher/manage_tests.js"></script>
</body>
</html>
<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>