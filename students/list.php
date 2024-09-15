<?php
// students/list.php
include '../includes/config.php';

$query = "SELECT * FROM students";
$stmt = $pdo->query($query);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../includes/header.php'; ?>

<h1>Student List</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Grade</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['course']) ?></td>
                <td><?= htmlspecialchars($student['grade']) ?></td>
                <td><?= htmlspecialchars($student['contact']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $student['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $student['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
