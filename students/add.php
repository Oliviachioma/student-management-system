<?php
// students/add.php
include '../includes/config.php';

// Check if the form has been submitted (via POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $grade = $_POST['grade'];
    $contact = $_POST['contact'];

    // Prepare the insert query
    $query = "INSERT INTO students (name, course, grade, contact) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);

    // Execute the statement with the form data
    if ($stmt->execute([$name, $course, $grade, $contact])) {
        // Redirect to the student list after successful insertion
        header("Location: list.php");
        exit;
    } else {
        echo "Error adding record.";
    }
}
?>

<?php include '../includes/header.php'; ?>

<h1>Add New Student</h1>
<form method="POST" action="add.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="course">Course:</label>
    <input type="text" id="course" name="course" required>

    <label for="grade">Grade:</label>
    <input type="text" id="grade" name="grade" required>

    <label for="contact">Contact:</label>
    <input type="text" id="contact" name="contact" required>

    <button type="submit">Add Student</button>
</form>

<?php include '../includes/footer.php'; ?>
