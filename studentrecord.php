<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Enrollment System</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        form { margin-bottom: 30px; }
        input, select { padding: 8px; margin: 5px; width: 250px; }
        button { padding: 10px 15px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

<h2>Student Enrollment</h2>

<form method="POST" action="save_student.php">
    <input type="text" name="student_id" placeholder="Student ID" required><br>
    <input type="text" name="full_name" placeholder="Full Name" required><br>
    <input type="text" name="course" placeholder="Course" required><br>
    <select name="year_level" required>
        <option value="">Select Year Level</option>
        <option>1st Year</option>
        <option>2nd Year</option>
        <option>3rd Year</option>
        <option>4th Year</option>
    </select><br>
    <button type="submit">Save Student</button>
</form>

<h3>Enrolled Students</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Course</th>
        <th>Year Level</th>
        <th>Date Enrolled</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['student_id']; ?></td>
        <td><?= $row['full_name']; ?></td>
        <td><?= $row['course']; ?></td>
        <td><?= $row['year_level']; ?></td>
        <td><?= $row['created_at']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
