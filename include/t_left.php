<?php

$account_type = $_SESSION['account_type'] ?? '';

if ($account_type === 'teacher') {
?>
    <div class="sidebar">
        <!-- Dashboard -->
        <div class="menu-item">
            <a href="dashboard.php">Dashboard</a>
        </div>

        <!-- Tests -->
        <div class="menu-item" onclick="toggleSubMenu('testMenu', 'testIcon')">
            <span>Tests</span> <span class="icon" id="testIcon"><svg fill="var(--light-blue-gray)" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><polygon fill-rule="evenodd" points="13.293 4.293 14.707 5.707 8 12.414 1.293 5.707 2.707 4.293 8 9.586"/></svg></span>
        </div>
        <div id="testMenu" class="submenu">
            <a href="create_test.php">Create Test</a>
            <a href="manage_tests.php">Manage Tests</a>
        </div>

        <!-- Submissions -->
        <div class="menu-item">
            <a href="test_submissions.php">Test Submissions</a>
        </div>

        <!-- Student Records -->
        <div class="menu-item">
            <a href="student_records.php">Student Records</a>
        </div>

        <!-- Profile -->
        <div class="menu-item">
            <a href="teacher_profile.php">Profile</a>
        </div>

        <!-- Logout -->
        <div class="menu-item">
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>

<?php
} elseif ($account_type === 'student') {
?>
    <div class="sidebar">
        <!-- Dashboard -->
        <div class="menu-item">
            <a href="student_dashboard.php">Dashboard</a>
        </div>

        <!-- Tests -->
        <div class="menu-item" onclick="toggleSubMenu('testMenu', 'testIcon')">
            <span>Tests</span> <span class="icon" id="testIcon"><svg fill="var(--light-blue-gray)" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><polygon fill-rule="evenodd" points="13.293 4.293 14.707 5.707 8 12.414 1.293 5.707 2.707 4.293 8 9.586"/></svg></span>
        </div>
        <div id="testMenu" class="submenu">
            <a href="take_test.php">Take Test</a>
            <!-- <a href="past_results.php">Past Tests</a> -->
        </div>

        <!-- Results -->
        <div class="menu-item" onclick="toggleSubMenu('resultsMenu', 'resultsIcon')">
            <span>Results</span> <span class="icon" id="resultsIcon"><svg fill="var(--light-blue-gray)" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><polygon fill-rule="evenodd" points="13.293 4.293 14.707 5.707 8 12.414 1.293 5.707 2.707 4.293 8 9.586"/></svg></span>
        </div>
        <div id="resultsMenu" class="submenu">
            <a href="view_results.php">View Results</a>
        </div>

        <!-- Profile -->
        <div class="menu-item">
            <a href="student_profile.php">Profile</a>
        </div>

        <!-- Logout -->
        <div class="menu-item">
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>

<?php
} else {?>

<div class="sidebar">
       

        <!-- Logout -->
        <div class="menu-item">
            <a href="../../auth/logout.php">Logout</a>
        </div>
    </div>

<?php    
}
?>
