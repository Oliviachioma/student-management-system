<?php
// students/edit.php
include '../includes/config.php';

// Check if the form has been submitted (via POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $grade = $_POST['grade'];
    $contact = $_POST['contact'];

    // Prepare the update query
    $query = "UPDATE students SET name = ?, course = ?, grade = ?, contact = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);

    // Execute the update statement
    if ($stmt->execute([$name, $course, $grade, $contact, $id])) {
        // Redirect to the student list after updating
        header("Location: list.php");
        exit;
    } else {
        echo "Error updating record.";
    }
} else {
    // If 'id' is present in the query string, fetch the student's current details
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and execute the select query to get the current data
        $query = "SELECT * FROM students WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        // Fetch the student record
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$student) {
            echo "Student not found.";
            exit;
        }
    } else {
        echo "Invalid request.";
        exit;
    }
}
?>

<?php include '../includes/header.php'; ?>

<h1>Edit Student</h1>
<form method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>

    <label for="course">Course:</label>
    <input type="text" id="course" name="course" value="<?= htmlspecialchars($student['course']) ?>" required>

    <label for="grade">Grade:</label>
    <input type="text" id="grade" name="grade" value="<?= htmlspecialchars($student['grade']) ?>" required>

    <label for="contact">Contact:</label>
    <input type="text" id="contact" name="contact" value="<?= htmlspecialchars($student['contact']) ?>" required>

    <button type="submit">Update Student</button>
</form>

<?php include '../includes/footer.php'; ?>
