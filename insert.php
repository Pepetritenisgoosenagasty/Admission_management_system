<?php

require_once 'core/init.php';

    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    if (isset($_POST['school_region'])) {
        for ($val = 0; $val < count($_POST['school_region']); $val++) {
             $sql = "INSERT INTO academic_info(user_id,school_region,school_name,field_of_study,cert,mathematics,english_language,social_studies,science,first_elective,grade,second_elective,grades,third_elective,gradess,fourth_elective,gradesss)
         VALUES(:user_id,:school_region,:school_name,:field_of_study,:cert,:mathematics,:english_language,:social_studies,:science,:first_elective,:grade,:second_elective,:grades,:third_elective,:gradess,:fourth_elective,:gradesss)";
            $stmt = $db->prepare($sql);
             $stmt = $db->prepare($sql);
            $stmt->bindParam(':user_id', $id);
            $stmt->bindParam(':school_region', $_POST['school_region'][$val]);
            $stmt->bindParam(':school_name', $_POST['school_name'][$val]);
            $stmt->bindParam(':field_of_study', $_POST['field_of_study'][$val]);
            $stmt->bindParam(':cert', $_POST['cert'][$val]);
            $stmt->bindParam(':mathematics', $_POST['mathematics'][$val]);
            $stmt->bindParam(':english_language', $_POST['english_language'][$val]);
            $stmt->bindParam(':social_studies', $_POST['social_studies'][$val]);
            $stmt->bindParam(':science', $_POST['science'][$val]);
            $stmt->bindParam(':first_elective', $_POST['first_elective'][$val]);
            $stmt->bindParam(':grade', $_POST['grade'][$val]);
            $stmt->bindParam(':second_elective', $_POST['second_elective'][$val]);
            $stmt->bindParam(':grades', $_POST['grades'][$val]);
            $stmt->bindParam(':third_elective', $_POST['third_elective'][$val]);
            $stmt->bindParam(':gradess', $_POST['gradess'][$val]);
            $stmt->bindParam(':fourth_elective', $_POST['fourth_elective'][$val]);
            $stmt->bindParam(':gradesss', $_POST['gradesss'][$val]);
            if ($stmt->execute()) {
                  header("Location: upload.php?id=$id");
            }
        }
    }
}
