<?php
   
   
      include("../../include/t_top.php");
      include("../../include/t_left.php");
      include("../../include/functions.php");

      $account_type = isset($_SESSION['account_type']) ?? '' ;

      if($account_type == "teacher"){
    
   
    ?>
   <div class="main">
    <div class="profile-container">
        <div class="profile-card">

        <?php 
        $lecturer_id = $_SESSION['user_id'];
        $query = "SELECT * FROM `lecturers` WHERE `lecturer_id` = '$lecturer_id'";
        $result = mysqli_query($conn, $query);

        if($row = mysqli_fetch_assoc($result)){
            $name = $row['full_name'];
            $lecturer_id = $row['lecturer_id'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];

        ?>
            
            <h2 class="profile-name"><?php echo $name ?></h2>
            <h2 class="profile-matric"><?php echo $lecturer_id ?></h2>
            <p class="profile-email"><?php echo $email ?></p>
            <p class="profile-email"><?php echo $phone_number ?></p>
            
            <!-- <h3>Test Set</h3>
            <ul class="courses-list">
                <li>MAT101 - Algebra</li>
                <li>PHY202 - Physics</li>
                <li>CSC305 - Programming Basics</li>
            </ul> -->
            
            <button class="edit-profile-btn" onclick="openPopup('<?php echo $name?>','<?php echo $lecturer_id?>','<?php echo $email ?>','<?php echo $phone_number ?>')">Edit Profile</button>
            <p id="confirmP" style="color: red; "></p> 
        </div>
    </div>
    

    <?php } ?>
 <!-- Edit Profile Popup -->
<div class="popup-overlay" id="editProfilePopup">
    <div class="popup-content">
        <span class="close-popup" onclick="closePopup()">&times;</span>
        <h3>Edit Profile</h3>
        
        <form action="" method="post">
        <input type="text" name="hide-id" style="display: none;" id="hide-id" value="<?php echo $lecturer_id ?>">
        <label>Name: <input type="text" name="name" id="editName" value="John Doe" required></label>
        <label>Lecturer Id: <input name="new_id" type="text" id="editId" value="John Doe" required></label>
        <label>Email: <input type="email" name="email" id="editEmail" value="johndoe@example.com" required></label>
        
        <label>Phone: <input type="text" name="phone" id="editPhone" value="+1234567890"></label>
        

        <div class="popup-buttons">
            <button type="button" class="cancel-btn" onclick="closePopup()">Cancel</button>
            <button type="submit" name="save-btn" class="save-btn" onclick="saveChanges()">Save Changes</button>
        </div>
        </form>
    </div>
</div>

<?php 
          if (isset($_POST['save-btn'])) {

            $old_id = mysqli_real_escape_string($conn, stripslashes($_POST['hide-id']));
            $fullname = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
            $email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));
            $phone = mysqli_real_escape_string($conn, stripslashes($_POST['phone']));

             $fullname = capitalizeAfterSpaces($fullname);

            $new_id = mysqli_real_escape_string($conn, stripslashes($_POST['new_id']));

            $query = "UPDATE `lecturers` SET `lecturer_id`='$new_id',`full_name`='$fullname',`email`='$email',`phone_number`='$phone' WHERE `lecturer_id` ='$old_id'";
           

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

   </div>
     <script src="../../assets/js/dashboard.js"></script>
     <script src="../../assets/js/teacher/teacher_profile.js"></script>
</body>
</html>
<?php }else{
    echo "<p style='color:var(--soft-green-teal); display: flex; justify-content: center;align-items: center;font-size: 5rem;'>UNAUTHORIZED ACCESS</p>";
} ?>