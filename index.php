<?php
// index.php
include 'includes/header.php';
?>

<div class="container">
    <h1>Welcome to the Student Management System</h1>
    <p>This system allows administrators to manage student information, including adding, updating, and deleting student records.</p>

    <div class="actions">
        <a href="students/list.php" class="btn">View All Students</a>
        <a href="students/add.php" class="btn">Add New Student</a>
    </div>
</div>

<?php
include 'includes/footer.php';
?>