<?php
include "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student Record</h2>

<form method="POST" action="update_student.php">
    <input type="hidden" name="id" value="<?= $student['id'] ?>">

    Student ID:<br>
    <input type="text" name="student_id" value="<?= $student['student_id'] ?>" required><br><br>

    Full Name:<br>
    <input type="text" name="full_name" value="<?= $student['full_name'] ?>" required><br><br>

    Course:<br>
    <input type="text" name="course" value="<?= $student['course'] ?>" required><br><br>

    Year Level:<br>
    <select name="year_level" required>
        <option <?= $student['year_level']=="1st Year"?"selected":"" ?>>1st Year</option>
        <option <?= $student['year_level']=="2nd Year"?"selected":"" ?>>2nd Year</option>
        <option <?= $student['year_level']=="3rd Year"?"selected":"" ?>>3rd Year</option>
        <option <?= $student['year_level']=="4th Year"?"selected":"" ?>>4th Year</option>
    </select><br><br>

    <button type="submit">Update Student</button>
</form>

</body>
</html>
