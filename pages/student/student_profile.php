<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      include("../../include/functions.php");
      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "student"){
        $matric_no = $_SESSION['user_id'];
   
    ?>
   <div class="main">
   <h1>User Profile</h1>
      
<!-- Student Profile Page -->
<div class="profile-container">
    <?php 
        $query = "SELECT * FROM `students` WHERE `matric_no` = '$matric_no'";
        $result = mysqli_query($conn, $query);

        if($row = mysqli_fetch_assoc($result)){
            $name = $row['full_name'];
            $matric_no = $row['matric_no'];
            $email = $row['email'];
            $department = $row['department'];
    
    ?>
    <div class="profile-card">
        
        <h2><?php echo $name ?></h2>
        <p>Matric Number: <span class="details"><?php echo $matric_no ?></span></p>
        <p>Email: <span class="details"><?php echo $email ?></span></p>
        <p>Department: <span class="details"><?php echo $department ?></span></p>
        <button class="edit-btn" onclick="openEditPopup('<?php echo $name ?>', '<?php echo $email ?>', '<?php echo $matric_no ?>', '<?php echo $department ?>')">Edit Profile</button>
        <p id="confirmP" style="color: red; "></p>
    </div>
    <?php 
        }
    ?>
</div>
</div>
<!-- Edit Profile Popup -->
<div class="overlay" id="editProfilePopup">
    <div class="popup">
        <div class="popup-header">
            <h3>Edit Profile</h3>
            <span class="close-btn" onclick="closeEditPopup()">&times;</span>
        </div>
        <div class="popup-body">
            <form action="" method="post">
            <input type="text" name="hide-id" style="display: none;" id="hide-id">
            <label>Full Name</label>
            <input type="text" name="name" id="name" placeholder="Enter full name">
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email">
            <label>Matric no</label>
            <input type="text" name="matric" id="matric" placeholder="Enter new Matric no">
            <label>Department</label>
            <select class="field" name="department" id="department">
              <option value="software engineering">software engineering</option>
              <option value="computer science">computer science</option>
              <option value="information technology">information technology</option>
            </select>
            
        </div>
        <div class="popup-footer">
            <button type="button" class="cancel-btn" onclick="closeEditPopup()">Cancel</button>
            <button type="submit" name="save-btn" class="save-btn">Save Changes</button>
        </div>
        </form>
    </div>
</div>


<?php 
          if (isset($_POST['save-btn'])) {

            $old_id = mysqli_real_escape_string($conn, stripslashes($_POST['hide-id']));
            $fullname = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
            $email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));
            $department = mysqli_real_escape_string($conn, stripslashes($_POST['department']));

            $fullname = capitalizeAfterSpaces($fullname);
            $new_id = mysqli_real_escape_string($conn, stripslashes($_POST['matric']));

            $query = "UPDATE `students` SET `matric_no`='$new_id',`full_name`='$fullname',`email`='$email',`department`='$department' WHERE `matric_no` ='$old_id'";
           

            if(mysqli_query($conn, $query)){

                $_SESSION['name'] = $fullname;
                ?>
                <script>
                    
                document.getElementById('confirmP').textContent = "Profile updated Successfully";
                setTimeout(()=>{
                window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
                }, 1000);
                </script>
                <?php
            }
            else{
                ?>
                <script>
                document.getElementById('confirmP').textContent = "Profile update un-successful";
                setTimeout(()=>{
                window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>";
                }, 1000);
                </script>
                <?php
            }
   
          }
   ?>

  
     <script src="../../assets/js/dashboard.js"></script>
     <script src="../../assets/js/student/student_profile.js"></script>
</body>
</html>

<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>