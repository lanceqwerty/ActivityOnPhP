<?php
include "db.php";

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>List of Enrolled Students</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Course</th>
        <th>Year Level</th>
        <th>Date Enrolled</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['student_id']; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['course']; ?></td>
                <td><?= $row['year_level']; ?></td>
                <td><?= $row['created_at']; ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" style="text-align:center;">No student records found</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
