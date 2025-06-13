<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "teacher"){
    
   
    ?>
    <?php 
    $test_id = $_GET['test_id'];

      
    $query = "SELECT * FROM `tests` WHERE `test_id` = '$test_id'";
    $result = mysqli_query($conn, $query);


    if($row = mysqli_fetch_assoc($result)){
        $course_title = $row['course_title'];
        $test_id = $row['test_id'];

   ?>
   <div class="main">
   <div class="header">
        <h2><?php echo strtoupper($test_id) . ": " . $course_title ?></h2>
        <button class="add-question-btn" onclick="openPopup('addQuestionPopup')" >Add Question</button>
    </div>
    <p id="confirmP" style="color: red; margin-left: 4rem; margin-top: 1rem"></p> 
    <div class="main-content">
      
    <?php 
   
   
    $query = "SELECT * FROM `questions` WHERE `test_id` = '$test_id'";
    $result = mysqli_query($conn, $query);

    $sn = 1;
    while($rw = mysqli_fetch_assoc($result)){
        $question_id = $rw['id'];
        $question_text = $rw['question_text'];
        $option_1 = $rw['option_1'];
        $option_2 = $rw['option_2'];
        $option_3 = $rw['option_3'];
        $correct_option = $rw['correct_option'];
       
        
    ?>
        <div class="question-box">
            <h3><?php echo $sn. ". ". $question_text ?></h3>
            <p>Option A: <?php echo $option_1 ?></p>
            <p>Option B: <?php echo $option_2 ?></p>
            <p>Option C: <?php echo $option_3 ?></p>
            <p class="correct-option">Correct Option: <?php echo $correct_option ?></p>
            <div class="question-actions">
                <button class="delete-btn" onclick="openPopup('deletePopup', '<?php echo $question_id ?>')">Delete</button>
                <button class="modify-btn"  onclick="populateModify('<?php echo $question_id ?>', '<?php echo htmlspecialchars($question_text) ?>', '<?php echo htmlspecialchars($option_1) ?>', '<?php echo htmlspecialchars($option_2) ?>', '<?php echo htmlspecialchars($option_3) ?>', '<?php echo htmlspecialchars($correct_option) ?>')">Modify</button>
            </div>
        </div>

        <?php 
        $sn++;
        } ?>
        
        </div>

        <form class="action-btns" action="" method="post">
         <button name="take" type="submit" class="take-btn">Take Down</button>
         <button name="push" type="submit" class="push-btn">Push Live</button>
        </form>
    </div>

    <?php 
    //TAKE DOWN
    if(isset($_POST['take'])){
        
        $check_query = "SELECT `is_published` FROM `tests` WHERE `test_id` = '$test_id'";
        $result = mysqli_query($conn, $check_query);
        $row = mysqli_fetch_assoc($result);

       $is_live = $row['is_published'];

        if($is_live){

            $query = "UPDATE `tests` SET `is_published`= 0 WHERE `test_id`='$test_id'";
            if(mysqli_query($conn ,$query)){
            ?>
            
            <script>
            document.getElementById("confirmP").textContent = "Test taken down successfully";
         
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
            }, 1000);
            </script>
            <?php
          }
            else{
            ?>
            <script>
            document.getElementById('confirmP').textContent = "Test take down un-successful";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
            }, 1000);
            </script>
            <?php
        }
    }else{
        ?>
            <script>
            document.getElementById('confirmP').textContent = "Test already down ";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
            }, 1000);
            </script>
            <?php
    }
}

    //PUSH LIVE
    if(isset($_POST['push'])){
       
        $query = "SELECT 
            tests.question_count AS expected_questions,
            COUNT(questions.id) AS created_questions
            FROM 
            tests
            LEFT JOIN 
            questions ON tests.test_id = questions.test_id
            WHERE 
            tests.test_id = '$test_id'
            GROUP BY 
            tests.test_id;
            ";
        
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

         $question_made = $row['created_questions'];
         $question_required = $row['expected_questions']; 

         

        if($question_made >= $question_required){

            $check_query = "SELECT `is_published` FROM `tests` WHERE `test_id` = '$test_id'";
            $result = mysqli_query($conn, $check_query);
            $row = mysqli_fetch_assoc($result);

            $is_live = $row['is_published'];

            if(!$is_live){

              $push_query = "UPDATE `tests` SET `is_published`= 1 WHERE `test_id`='$test_id'";

              if(mysqli_query($conn ,$push_query)){
              ?>
            
            
              <script>
              document.getElementById("confirmP").textContent = "Test pushed live successfully";
         
              setTimeout(()=>{
              window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
              }, 1000);
              </script>
              <?php
            }
              else{
            ?>
            <script>
            document.getElementById('confirmP').textContent = "Push live un-successful";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
            }, 1000);
            </script>
            <?php
            }
            
        }else{
          ?>
          <script>
          document.getElementById('confirmP').textContent = "Test Already live";
          setTimeout(()=>{
          window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
          }, 1000);
          </script>
          <?php
          }
      
        
    }
    else{
      ?>
      <script>
      document.getElementById('confirmP').textContent = "Question below specified amount";
      setTimeout(()=>{
      window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
      }, 1000);
      </script>
      <?php
      }
    }
    ?>


   <!-- Add Question Popup -->
<div id="addQuestionPopup" class="popup">
  <div class="popup-content">
    <h3>Add Question</h3>
    <form action="" method="post">
    <input type="text" name="question" id="add-question" placeholder="Enter question">
  <input type="text" name="option1" id="add-option1" placeholder="Option A">
  <input type="text" name="option2" id="add-option2" placeholder="Option B">
  <input type="text" name="option3" id="add-option3" placeholder="Option C">
  <input type="text" name="correct" id="add-correct" placeholder="Correct Option">
    <div class="popup-actions">
      <button type="button" onclick="closePopup('addQuestionPopup')" class="cancel-btn">Cancel</button>
      <button type="submit" name="add-btn" class="submit-btn">Add</button>
    </div>
    </form>
  </div>
</div>
<?php


if (isset($_POST['add-btn'])) {
    $question = mysqli_real_escape_string($conn, stripslashes($_POST['question']));
    $option1 = mysqli_real_escape_string($conn, stripslashes($_POST['option1']));
    $option2 = mysqli_real_escape_string($conn, stripslashes($_POST['option2']));
    $option3 = mysqli_real_escape_string($conn, stripslashes($_POST['option3']));
    $correct = mysqli_real_escape_string($conn, stripslashes($_POST['correct']));

    $test_id = strtolower($test_id);

    //has ?
    if (substr($question, -1) === '?') {
      $question = $question;
    }
    else{
      $question = $question . "?";
    }
  
    // Insert into database
    $sql = "INSERT INTO `questions`(`test_id`, `question_text`, `option_1`, `option_2`, `option_3`, `correct_option`) VALUES ('$test_id','$question','$option1','$option2','$option3','$correct')";

    if(mysqli_query($conn ,$sql)){
        ?>
        
        <script>
        document.getElementById("confirmP").textContent = "Question added Successfully";
     
        setTimeout(()=>{
        window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
        }, 1000);
        </script>
        <?php
      }
}
?>


<!-- Modify Question Popup -->
<div id="modifyQuestionPopup" class="popup">
  <div class="popup-content">
    <form action="" method="post">
    <h3>Modify Question</h3>
    <input type="text" style="display: none;" name="hide-id" id="hide-id">
    <input type="text" name="question_mod" id="mod-question" placeholder="Enter question">
    <input type="text" name="option1_mod" id="mod-option1" placeholder="Option A">
    <input type="text" name="option2_mod" id="mod-option2" placeholder="Option B">
    <input type="text" name="option3_mod" id="mod-option3" placeholder="Option C">
    <input type="text" name="correct_mod" id="mod-correct" placeholder="Correct Option">
    <div class="popup-actions">
      <button type="button" onclick="closePopup('modifyQuestionPopup')" class="cancel-btn">Cancel</button>
      <button type="submit" name="modify-btn" class="submit-btn">Save</button>
    </div>
    </form>
  </div>
</div>

<?php


if (isset($_POST['modify-btn'])) {
    $id = mysqli_real_escape_string($conn, stripslashes($_POST['hide-id']));
    $question = mysqli_real_escape_string($conn, stripslashes($_POST['question_mod']));
    $option1 = mysqli_real_escape_string($conn, stripslashes($_POST['option1_mod']));
    $option2 = mysqli_real_escape_string($conn, stripslashes($_POST['option2_mod']));
    $option3 = mysqli_real_escape_string($conn, stripslashes($_POST['option3_mod']));
    $correct = mysqli_real_escape_string($conn, stripslashes($_POST['correct_mod']));

    $test_id = strtolower($test_id);
    
     //has ?
     if (substr($question, -1) === '?') {
      $question = $question;
    }
    else{
      $question = $question . "?";
    }
    // Insert into database
    $sql = "UPDATE `questions` SET `question_text`='$question',`option_1`='$option1',`option_2`='$option2',`option_3`='$option3',`correct_option`='$correct' WHERE `id` = '$id'";

   
    if(mysqli_query($conn ,$sql)){
        ?>
        
        <script>
        document.getElementById("confirmP").textContent = "Question edited Successfully";
     
        setTimeout(()=>{
        window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
        }, 1000);
        </script>
        <?php
      }
      else{
        ?>
        <script>
        document.getElementById('confirmP').textContent = "Question edit un-successful";
        setTimeout(()=>{
        window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
        }, 1000);
        </script>
        <?php
    }
}
?>

<!-- Delete Confirmation Popup -->
<div id="deletePopup" class="popup">
  <div class="popup-content">
    <h3>Confirm Delete</h3>
    <form action="" method="post">
    <p>Do you want to delete this question?</p>
    <input type="text" style="display: none;" name="del-id" id="del-id">
    <div class="popup-actions">
      <button type="button" onclick="closePopup('deletePopup')" class="cancel-btn">Cancel</button>
      <button type="submit" name="del-button" class="delete-btn">Delete</button>
    </div>
    </form>
  </div>
</div>


<?php 
    if(isset($_POST['del-button'])){

        $id = $_POST['del-id'];
        $query = "DELETE FROM `questions` WHERE `id` = '$id'";

        if(mysqli_query($conn, $query)){

            ?>
            <script>
                
            document.getElementById('confirmP').textContent = "Deleted Successfully";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
            }, 1000);
            </script>
            <?php
        }
        else{
            ?>
            <script>
            document.getElementById('confirmP').textContent = "Deleted un-successful";
            setTimeout(()=>{
            window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?test_id=<?php echo $test_id?>";
            }, 1000);
            </script>
            <?php
        }
    }
      
    
?>

     <script src="../../assets/js/dashboard.js"></script>
     <script src="../../assets/js/student/add_questions.js"></script>
</body>
</html>
<?php } ?>

<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>