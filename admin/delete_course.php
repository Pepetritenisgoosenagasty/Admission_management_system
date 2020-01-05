<?php
$pageTitle = 'Admin | Courses';
include 'inc/header.php';
require_once '../config/config.php';
require_once '../libraries/Database.php';

$db = new Database;

 $id = $_GET['id'];
  $sql = 'DELETE FROM courses WHERE id = :id';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
if ($stmt) {
    echo '<script>
           alert("Course Successfully deleted");
           const url = "http://localhost/AdmissionProcessing/admin/add_courses.php";
           window.location.assign(url);
        </script>';
}
