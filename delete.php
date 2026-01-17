<?php
include "db.php";
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ccc; padding:10px; }
        th { background:#f2f2f2; }
        a { margin-right:10px; }
    </style>
</head>
<body>

<h2>Student Records</h2>

<table>
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Name</th>
    <th>Course</th>
    <th>Year</th>
    <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['student_id'] ?></td>
    <td><?= $row['full_name'] ?></td>
    <td><?= $row['course'] ?></td>
    <td><?= $row['year_level'] ?></td>
    <td>
        <a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a>
        <a href="delete_student.php?id=<?= $row['id'] ?>"
           onclick="return confirm('Are you sure you want to delete this student?')">
           Delete
        </a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
