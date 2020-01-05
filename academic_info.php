<?php
$pageTitle = 'Academics History';
include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['exams'])) {
        $exams = $_POST['exams'];
        switch ($exams) {
            case 1:
                $school_region = trim(filter_input(INPUT_POST, 'school_region', FILTER_SANITIZE_STRING));
                $school_name = trim(filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING));
                $field_of_study = trim(filter_input(INPUT_POST, 'field_of_study', FILTER_SANITIZE_STRING));
                $cert = trim(filter_input(INPUT_POST, 'cert', FILTER_SANITIZE_STRING));
                $mathematics = trim(filter_input(INPUT_POST, 'mathematics', FILTER_SANITIZE_STRING));
                $english_language = trim(filter_input(INPUT_POST, 'english_language', FILTER_SANITIZE_STRING));
                $social_studies = trim(filter_input(INPUT_POST, 'social_studies', FILTER_SANITIZE_STRING));
                $science = trim(filter_input(INPUT_POST, 'science', FILTER_SANITIZE_STRING));
                $first_elective = trim(filter_input(INPUT_POST, 'first_elective', FILTER_SANITIZE_STRING));
                $grade = trim(filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING));
                $second_elective = trim(filter_input(INPUT_POST, 'second_elective', FILTER_SANITIZE_STRING));
                $grades = trim(filter_input(INPUT_POST, 'grades', FILTER_SANITIZE_STRING));
                $third_elective = trim(filter_input(INPUT_POST, 'third_elective', FILTER_SANITIZE_STRING));
                $gradess = trim(filter_input(INPUT_POST, 'gradess', FILTER_SANITIZE_STRING));
                $fourth_elective = trim(filter_input(INPUT_POST, 'fourth_elective', FILTER_SANITIZE_STRING));
                $gradesss = trim(filter_input(INPUT_POST, 'gradesss', FILTER_SANITIZE_STRING));

                $sql = "INSERT INTO academic_info(user_id,school_region,school_name,field_of_study,cert,mathematics,english_language,social_studies,science,first_elective,grade,second_elective,grades,third_elective,gradess,fourth_elective,gradesss)
            VALUES(:user_id,:school_region,:school_name,:field_of_study,:cert,:mathematics,:english_language,:social_studies,:science,:first_elective,:grade,:second_elective,:grades,:third_elective,:gradess,:fourth_elective,:gradesss)
            ";
   
                    
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':user_id', $_GET['id']);
                $stmt->bindParam(':school_region', $school_region);
                $stmt->bindParam(':school_name', $school_name);
                $stmt->bindParam(':field_of_study', $field_of_study);
                $stmt->bindParam(':cert', $cert);
                $stmt->bindParam(':mathematics', $mathematics);
                $stmt->bindParam(':english_language', $english_language);
                $stmt->bindParam(':social_studies', $social_studies);
                $stmt->bindParam(':science', $science);
                $stmt->bindParam(':first_elective', $first_elective);
                $stmt->bindParam(':grade', $grade);
                $stmt->bindParam(':second_elective', $second_elective);
                $stmt->bindParam(':grades', $grades);
                $stmt->bindParam(':third_elective', $third_elective);
                $stmt->bindParam(':gradess', $gradess);
                $stmt->bindParam(':fourth_elective', $fourth_elective);
                $stmt->bindParam(':gradesss', $gradesss);
               
                if ($stmt->execute($data)) {
                    header("Location: upload.php?id=$id");
                    exit;
                }
                break;

            case 2:
                $school_region = trim(filter_input(INPUT_POST, 'school_region', FILTER_SANITIZE_STRING));
                $school_name = trim(filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING));
                $field_of_study = trim(filter_input(INPUT_POST, 'field_of_study', FILTER_SANITIZE_STRING));
                $cert = trim(filter_input(INPUT_POST, 'cert', FILTER_SANITIZE_STRING));
                $mathematics = trim(filter_input(INPUT_POST, 'mathematics', FILTER_SANITIZE_STRING));
                $english_language = trim(filter_input(INPUT_POST, 'english_language', FILTER_SANITIZE_STRING));
                $social_studies = trim(filter_input(INPUT_POST, 'social_studies', FILTER_SANITIZE_STRING));
                $science = trim(filter_input(INPUT_POST, 'science', FILTER_SANITIZE_STRING));
                $first_elective = trim(filter_input(INPUT_POST, 'first_elective', FILTER_SANITIZE_STRING));
                $grade = trim(filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING));
                $second_elective = trim(filter_input(INPUT_POST, 'second_elective', FILTER_SANITIZE_STRING));
                $grades = trim(filter_input(INPUT_POST, 'grades', FILTER_SANITIZE_STRING));
                $third_elective = trim(filter_input(INPUT_POST, 'third_elective', FILTER_SANITIZE_STRING));
                $gradess = trim(filter_input(INPUT_POST, 'gradess', FILTER_SANITIZE_STRING));
                $fourth_elective = trim(filter_input(INPUT_POST, 'fourth_elective', FILTER_SANITIZE_STRING));
                $gradesss = trim(filter_input(INPUT_POST, 'gradesss', FILTER_SANITIZE_STRING));

               
                $sql = "INSERT INTO academic_info(user_id,school_region,school_name,field_of_study,cert,mathematics,english_language,social_studies,science,first_elective,grade,second_elective,grades,third_elective,gradess,fourth_elective,gradesss)
            VALUES(:user_id,:school_region,:school_name,:field_of_study,:cert,:mathematics,:english_language,:social_studies,:science,:first_elective,:grade,:second_elective,:grades,:third_elective,:gradess,:fourth_elective,:gradesss)
            ";


                $stmt = $db->prepare($sql);
                $stmt->bindParam(':user_id', $_GET['id']);
                $stmt->bindParam(':school_region', $school_region);
                $stmt->bindParam(':school_name', $school_name);
                $stmt->bindParam(':field_of_study', $field_of_study);
                $stmt->bindParam(':cert', $cert);
                $stmt->bindParam(':mathematics', $mathematics);
                $stmt->bindParam(':english_language', $english_language);
                $stmt->bindParam(':social_studies', $social_studies);
                $stmt->bindParam(':science', $science);
                $stmt->bindParam(':first_elective', $first_elective);
                $stmt->bindParam(':grade', $grade);
                $stmt->bindParam(':second_elective', $second_elective);
                $stmt->bindParam(':grades', $grades);
                $stmt->bindParam(':third_elective', $third_elective);
                $stmt->bindParam(':gradess', $gradess);
                $stmt->bindParam(':fourth_elective', $fourth_elective);
                $stmt->bindParam(':gradesss', $gradesss);
                
                if ($stmt->execute($data)) {
                    header("Location: upload.php?id=$id");
                    exit;
                }

                $sql = "INSERT INTO novdec(user_id,region,school_name,field_study,qualication,maths,english,social_studies,science,subject1,grade1,subject2,grade2,subject3,grade3,subject4,grade4)
            VALUES(:user_id,:school_region,:school_name,:field_of_study,:cert,:maths,:english,:social_studies,:science,:subject1,:grade1,:subject2,:grade2,:subject3,:grade3,:subject4,:grade4)
            ";

                    
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':user_id', $_GET['id']);
                $stmt->bindParam(':school_region', $school_region);
                $stmt->bindParam(':school_name', $school_name);
                $stmt->bindParam(':field_of_study', $field_of_study);
                $stmt->bindParam(':cert', $cert);
                $stmt->bindParam(':maths', $mathematics);
                $stmt->bindParam(':english', $english_language);
                $stmt->bindParam(':social_studies', $social_studies);
                $stmt->bindParam(':science', $science);
                $stmt->bindParam(':subject1', $first_elective);
                $stmt->bindParam(':grade1', $grade);
                $stmt->bindParam(':subject2', $second_elective);
                $stmt->bindParam(':grade2', $grades);
                $stmt->bindParam(':subject3', $third_elective);
                $stmt->bindParam(':grade3', $gradess);
                $stmt->bindParam(':subject4', $fourth_elective);
                $stmt->bindParam(':grade4', $gradesss);
                
                if ($stmt->execute()) {
                    header("Location: upload.php?id=$id");
                    exit;
                }
                break;

            case 'hnd':
                $images = $_FILES['transcript']['name'];
                $tmp_dir = $_FILES['transcript']['tmp_name'];
                $imageSize = $_FILES['transcript']['size'];

                $upload_dir = 'images/transcript/';
                $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
                $valid_extensions = ['jpeg', 'jpg', 'png', 'pdf'];
                $transcript = rand(1000, 1000000). "." . $imgExt;
                move_uploaded_file($tmp_dir, $upload_dir.$transcript);

                $images = $_FILES['certificate']['name'];
                $tmp_dir = $_FILES['certificate']['tmp_name'];
                $imageSize = $_FILES['certificate']['size'];

                $upload_dir = 'images/certs/';
                $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
                $valid_extensions = ['jpeg', 'jpg', 'png', 'pdf'];
                $certs = rand(1000, 1000000). "." . $imgExt;
                move_uploaded_file($tmp_dir, $upload_dir.$certs);
                $id = $_GET['id'];
                
                $sql = "INSERT INTO hnd(user_id,hnd_transcript,hnd_certificate)
            VALUES(:user_id,:hnd_transcript,:hnd_certificate)";

                    
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':user_id', $_GET['id']);
                $stmt->bindParam(':hnd_transcript', $transcript);
                $stmt->bindParam(':hnd_certificate', $certs);
                if ($stmt->execute()) {
                    header("Location: upload.php?id=$id");
                    exit;
                }
                break;
        }
    }
}

?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Academic History</h3>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-graduation-cap"></i> Academic Info <small><?php echo formatDate(date('Y')); ?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="panel-body ">
            <div class="container">
                <form role="form" action="" method="POST" enctype="multipart/form-data" data-parsley-validate id="user_form">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label text-danger">Click to select exams type and input the required results to proceed.</label>
                                <select name="exams" id="exams" class="form-control" data-parsley-validate required="">
                                    <option value="0">-- Select exams type --</option>
                                    <!-- <option value="1">1</option> -->
                                    <option value="1">WASSCE</option>
                                    <option value="2">WASSCE AND NOVEDEC</option>
                                    <option value="hnd">HND,O/A LEVEL,BACC AND OTHER CERT UPLOADS</option>
                                </select>
                            </div>
                            
                            <?php include 'academics.php'; ?>
                            <a href="personal_info.php?id=<?php echo $_GET['id']; ?>"  class="btn btn-default">Previous</a>
                            <input type="submit" class="btn btn-primary pull-right" name="submit" value="Save and Continue">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'inc/footer.php';?>
<script type="text/javascript">

        $("#exams").on("change", function(){
            let emaxNum = $(this).val();
            if(emaxNum == 1)
                {
                    
                    $("#firstInput").css("display","block");
                    $("#secondInput").css("display","none");
                    $('#hnd').css('display', 'none');
                }
                else if(emaxNum == 2)
                {
                    $("#firstInput").css("display","block");
                    $("#secondInput").css("display","block");
                    $('#hnd').css('display', 'none');
                }
                else if(emaxNum == 'hnd')
                {
                    $('#hnd').css('display', 'block');

                    $("#firstInput").css("display","none");
                    $("#secondInput").css("display","none");
                    
                }
                else if(emaxNum == 0)
                {
                    $("#firstInput").css("display","none");
                    $("#secondInput").css("display","none");
                    $('#hnd').css('display', 'none');
                    $('#main').css('display', 'none');
                }
    });
      
</script>
