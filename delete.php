<?php
require_once 'core/init.php';
try {
    $sql = 'DELETE FROM emails WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    if ($stmt->execute()) {
        echo '<script>
                alert("Message deleted Successfully");
             const   url = "http://localhost/AdmissionProcessing/notice.php";
                window.location.assign(url);
            </script>';
    }
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}
