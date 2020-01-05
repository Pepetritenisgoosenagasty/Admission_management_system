<?php
$pageTitle = 'Home';

include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $images = $_FILES['profile']['name'];
    $tmp_dir = $_FILES['profile']['tmp_name'];
    $imageSize = $_FILES['profile']['size'];
    $upload_dir = 'images/profile/';
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = ['jpeg', 'jpg', 'png'];
    $picProfile = rand(1000, 1000000). "." . $imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $surname = trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
    $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
    $middle_name = trim(filter_input(INPUT_POST, 'middle_name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $gender = trim(filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING));
    $dob = trim(filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING));
    $place_of_birth = trim(filter_input(INPUT_POST, 'place_of_birth', FILTER_SANITIZE_STRING));
    $nationality = trim(filter_input(INPUT_POST, 'nationality', FILTER_SANITIZE_STRING));
    $marital_status = trim(filter_input(INPUT_POST, 'marital_status', FILTER_SANITIZE_STRING));
    $contact = trim(filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING));
    $postalAddress = trim(filter_input(INPUT_POST, 'postalAddress', FILTER_SANITIZE_STRING));
    $religion = trim(filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING));
    $denomination = trim(filter_input(INPUT_POST, 'denomination', FILTER_SANITIZE_STRING));
    $otherSpecify = trim(filter_input(INPUT_POST, 'otherSpecify', FILTER_SANITIZE_STRING));
    $sponsor_t = trim(filter_input(INPUT_POST, 'sponsor_t', FILTER_SANITIZE_STRING));
    $sponsor_fullname = trim(filter_input(INPUT_POST, 'sponsor_fullname', FILTER_SANITIZE_STRING));
    $sponsor_relation = trim(filter_input(INPUT_POST, 'sponsor_relation', FILTER_SANITIZE_STRING));
    $sponsor_oc = trim(filter_input(INPUT_POST, 'sponsor_oc', FILTER_SANITIZE_STRING));
    $sponsor_mail = trim(filter_input(INPUT_POST, 'sponsor_mail', FILTER_SANITIZE_STRING));
    $sponsor_contact = trim(filter_input(INPUT_POST, 'sponsor_contact', FILTER_SANITIZE_STRING));
    $sponsor_address = trim(filter_input(INPUT_POST, 'sponsor_address', FILTER_SANITIZE_STRING));
    $sql = "INSERT INTO users(picProfile,title,surname,first_name,middle_name,email,gender,dob,place_of_birth,nationality,marital_status,contact,postalAddress,religion,denomination,otherSpecify,sponsor_t,sponsor_fullname,sponsor_relation,sponsor_oc,sponsor_mail,sponsor_contact,sponsor_address,disability,yes)
VALUES(:picProfile,:title,:surname,:first_name,:middle_name,:email,:gender,:dob,:place_of_birth,:nationality,:marital_status,:contact,:postalAddress,:religion,:denomination,:otherSpecify,:sponsor_t,:sponsor_fullname,:sponsor_relation,:sponsor_oc,:sponsor_mail,:sponsor_contact,:sponsor_address,:disability,:yes)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':picProfile', $picProfile);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':middle_name', $middle_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':place_of_birth', $place_of_birth);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':marital_status', $marital_status);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':postalAddress', $postalAddress);
    $stmt->bindParam(':religion', $religion);
    $stmt->bindParam(':denomination', $denomination);
    $stmt->bindParam(':otherSpecify', $otherSpecify);
    $stmt->bindParam(':sponsor_t', $sponsor_t);
    $stmt->bindParam(':sponsor_fullname', $sponsor_fullname);
    $stmt->bindParam(':sponsor_relation', $sponsor_relation);
    $stmt->bindParam(':sponsor_oc', $sponsor_oc);
    $stmt->bindParam(':sponsor_mail', $sponsor_mail);
    $stmt->bindParam(':sponsor_contact', $sponsor_contact);
    $stmt->bindParam(':sponsor_address', $sponsor_address);
    $stmt->bindParam(':disability', $_POST['disability']);
    $stmt->bindParam(':yes', $_POST['yes']);

    if ($stmt->execute()) {
        $last_id = $db->lastInsertId();
        header(
            "Location: form_number.php?id=$last_id"
        );
        exit;
    }
}
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
document.getElementById('blah').src =  e.target.result;
}
reader.readAsDataURL(input.files[0]);
}
}
</script>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Begin Admission Process</h3>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-edit"></i> Admission Form <small><?php echo date('D/M/Y'); ?></small></h2>
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
                <form role="form" action="" method="POST" data-parsley-validate enctype="multipart/form-data">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Personal Information</h3>
                                </div><div class="col-xs-6 col-md-4">
                                <p>Please upload a passport size </p>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="profile"  id="imgInp" onchange="readURL(this);"  >
                                </div>
                                
                                <img id="blah" src="<?php echo BASE_URI; ?>/images/avatars/user.png" class="img-thumbnail" alt="">
                                
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <select name="title" size="1" class="form-control" >
                                        <option value="">-- Select Title --</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Miss">Miss.</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="surname" class="control-label">Surname</label>
                                    <input   type="text" name="surname" id="surname"  class="form-control" placeholder="Enter Surname" data-parsley-required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input  type="text" name="first_name" id="first_name"  class="form-control" data-parsley-required placeholder="Enter first name" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Middle Name (Optional)</label>
                                    <input type="text" class="form-control" name="middle_name" id="mname" placeholder="Enter middle name" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <input type="email" class="form-control" name="email" id="emal" value=""  placeholder="Enter email" data-parsley-required="true" data-parsley-type="email" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label class="control-label ">Gender</label><br>
                                    <div id="gender" class="btn-group" data-toggle="buttons" >
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Male"> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Female"> Female
                                        </label>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label for="date">Date Of Birth</label>
                                    <input type="date" name="dob" value="" id="date" class="form-control" data-parsley-required="true" >
                                </div>
                                <div class="form-group">
                                    <label for="text" class="control-label">Place Of Birth</label>
                                    <input type="text" name="place_of_birth" value="" class="form-control" placeholder="Enter your place of birth" id="place" data-parsley-required="true" >
                                </div>
                                <div class="form-group">
                                    <label for="nation">Nationality</label>
                                    <select name="nationality" size="1" class="form-control" data-parsley-required="true" >
                                        <option value="">-- Select --</option>
                                        <?php include 'inc/docs/countries.html'; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="maritalStatus">Marital Status</label>
                                    <select name="marital_status" class="form-control" data-parsley-required="true" >
                                        <option value="">-- Select --</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widow">Widow</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> Contact Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="contact">Contact: <i class="fa fa-phone"></i></label>
                                    <input type="text" name="contact" class="form-control" id="contact" data-parsley-required="true"  data-parsley-type="digits" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="postal">Postal Address: <i class="fa fa-tag"></i></label>
                                    <textarea name="postalAddress" class="form-control" rows="5" id="address"  data-parsley-required="true" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Religious Affiliation</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="religion">Religion:</label>
                                    <select name="religion" size="1" class="form-control" data-parsley-required="true" >
                                        <option value="">-- Select --</option>
                                        <option value="christian">Christian</option>
                                        <option value="muslim">Muslim</option>
                                        <option value="tranditionalist">Traditionalist</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="religion">Denomination:</label>
                                    <select name="denomination" size="1" class="form-control" data-parsley-required="true" >
                                        <option value="">-- Select --</option>
                                        <option value="presbyterian">Presbyterian</option>
                                        <option value="catholic">Catholic</option>
                                        <option value="adventise">Adventise</option>
                                        <option value="penticostal">Penticostal</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="other" class="control-label">Other Specify:</label>
                                    <input type="text" name="otherSpecify" id="other" class="form-control" value="" placeholder=""  >
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">SPONSOR/ PARENT/ GUARDIAN/ EMERGENCY CONTACT</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="sponsor_t">Title</label>
                                    <select name="sponsor_t" size="1" class="form-control" data-parsley-required="true" >
                                        <option value="">-- Select --</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Miss">Miss.</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">FullName</label>
                                    <input name="sponsor_fullname"  maxlength="100" type="text"  class="form-control" placeholder="Enter FullName"  data-parsley-required="true" id="fullName"  data-parsley-trigger="keyup"/>
                                </div>
                                <div class="form-group">
                                    <label for="sponser_relation">Relationship:</label>
                                    <select name="sponsor_relation" size="1" class="form-control" data-parsley-required="true">
                                        <option value="">-- Select --</option>
                                        <option value="father">Father</option>
                                        <option value="mother">Mother</option>
                                        <option value="aunt">Aunt</option>
                                        <option value="uncle">Uncle</option>
                                        <option value="guardian">Guardian</option>
                                        <option value="wife">Wife</option>
                                        <option value="husband">Husband</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Occupation:</label>
                                    <input  maxlength="100" type="text"  class="form-control" placeholder="Enter occupation" name="sponsor_oc" data-parsley-required="true" id="occupation"  data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email (optional):</label>
                                    <input type="email" class="form-control" name="sponsor_mail" value="" placeholder="Enter email" id="email" >
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact: <i class="fa fa-phone"></i></label>
                                    <input type="text" class="form-control" name="sponsor_contact" id="contact" data-parsley-type="number" data-parsley-required="true" >
                                </div>
                                <div class="item form-group">
                                    <label for="postal">Postal Address: <i class="fa fa-tag"></i></label>
                                    <textarea name="sponsor_address" class="form-control" rows="5" data-parsley-required="true"  ></textarea>
                                </div>
                                
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title"> Any Form of Disability </h3>
                            </div>
                            <div class="panel-body">
                                <p>Do you have any special needs or require support as a consequence of any disability or medical condition?</p>
                                <div class="form-group">
                                    <input type="radio" name="disability" id="" value="yes" checked="true"> Yes
                                    <input type="radio" name="disability" id="" value="no"> No
                                </div>
                                <div class="form-group">
                                    <span><strong>If you have answered "YES" to the above question, please discribe the disability or medical condition.</strong></span>
                                    <textarea name="yes" class="form-control" rows="5" cols="30"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Save and Continue">
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
<!-- <script type="text/javascript">

$(document).ready(function(){
$("#surname, #fname, #mname, #email, #fullName, #other, #occupation, #place, #other").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}
});
});
$(document).ready(function(){
$("#date, #contact").keydown((e)=>{
if(e.which > 65 && e.which < 90)
{
e.preventDefault();
}
});
});
$(document).ready(function(){
$("#exams").on("change", function(){
var emaxNum = $(this).val();
if(emaxNum == 1)
{
$("#firstInput").css("display","block");
$("#secondInput").css("display","none");
$("#thirdInput").css("display","none");
}
else if(emaxNum == 2)
{
$("#firstInput").css("display","block");
$("#secondInput").css("display","block");
$("#thirdInput").css("display","none");
}
else if(emaxNum == 3)
{
$("#firstInput").css("display","block");
$("#secondInput").css("display","block");
$("#thirdInput").css("display","block");
}
else if(emaxNum == 0)
{
$("#firstInput").css("display","none");
$("#secondInput").css("display","none");
$("#thirdInput").css("display","none");
}
});
});

</script>> -->