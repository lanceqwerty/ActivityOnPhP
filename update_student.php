<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];

    $sql = "UPDATE students 
            SET student_id=?, full_name=?, course=?, year_level=?
            WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $student_id, $full_name, $course, $year_level, $id);

    if ($stmt->execute()) {
        header("Location: studentrecord.php");
        exit();
    } else {
        echo "Update failed";
    }
}
?>
