<?php
$pageTitle = 'Upload Transcript';


include __DIR__ . '/inc/header.php';
require_once __DIR__ . '/core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        header("Location: course_selection.php?id=$id");
        exit;
    }
}
?>
<?php include __DIR__ . '/inc/layout/sidebar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Certificate Upload </h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-image"></i> HND,O/A LEVEL,BACC AND OTHER CERT UPLOADS</h2>
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
        <div id="hnd" class=" HND GCEO/ALevel BACC" style="display: ;">
            <form action="" method="post" enctype="multipart/form-data" data-parsley-validate >
            <table class="table table-responsive table-bordered ">
                <tbody><tr>
                    <th class="active">Attach Transcript</th>
                    <th class="active">Attach Certificate</th>
                    
                </tr>
                <tr>
                    <td class="">
                        <div class="input-group">
                            <input type="file" class="form-control" name="transcript" required="true">
                        </div>
                        
                    </td>
                    <td class="">
                        
                        <div class="input-group">
                            <input type="file" class="form-control"  name="certificate" required="true">
                        </div>
                    </td>
                    
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <input type="submit" class="btn btn-primary pull-right" value="Submit">
        </div>
        </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php include __DIR__ . '/inc/footer.php' ?>