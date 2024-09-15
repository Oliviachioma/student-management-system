<?php
// students/delete.php
include '../includes/config.php';

// Check if 'id' is passed in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $query = "DELETE FROM students WHERE id = ?";
    $stmt = $pdo->prepare($query);

    // Execute the statement with the student ID
    if ($stmt->execute([$id])) {
        // Redirect back to the list after deletion
        header("Location: list.php");
        exit;
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "Invalid request.";
}
?>
