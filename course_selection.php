<?php

$pageTitle = 'Course Selection';
include 'inc/header.php';
require_once 'core/init.php';
// if (!isset($_SESSION['serial_number'])) {
//     header('Location:login.php');
// }

// Program
$sql = "SELECT * FROM programmes";
        $stmt = $db->prepare($sql);
       
        $stmt->execute();
        $rows = $stmt->fetchAll();

// Courses
$sql = "SELECT * FROM courses";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $courses = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];

    $section = trim(filter_input(INPUT_POST, 'section', FILTER_SANITIZE_STRING));
    $programmes = trim(filter_input(INPUT_POST, 'programmes', FILTER_SANITIZE_STRING));
    $firstChoice = trim(filter_input(INPUT_POST, 'firstChoice', FILTER_SANITIZE_STRING));
    $secondChoice = trim(filter_input(INPUT_POST, 'secondChoice', FILTER_SANITIZE_STRING));
    $thirdChoice = trim(filter_input(INPUT_POST, 'thirdChoice', FILTER_SANITIZE_STRING));
    try {
        $sql = "INSERT INTO course_offered(user_id,section,program,first_choice,second_choice,third_choice) VALUES(:user_id,:section,:program,:first_choice,:second_choice,:third_choice)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':section', $section);
        $stmt->bindParam(':program', $programmes);
        $stmt->bindParam(':first_choice', $firstChoice);
        $stmt->bindParam(':second_choice', $secondChoice);
        $stmt->bindParam(':third_choice', $thirdChoice);
        if ($stmt->execute()) {
            header("Location: confirm.php?id=$id");
            exit();
        }
    } catch (\PDOException $e) {
        echo 'something went wrong'.$e->getMessage();
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
                <h3>Course Selection <small></small></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-book"></i> Select the courses to offer </h2>
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
                    <br>
                    <form id="form_data" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section">Section <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="section" id="section" size="1" class="form-control">
                              <option value="">-- Select Section --</option>
                              <option value="Full-Time">Full Time</option>
                              <option value="Part-Time">Part Time</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section">Programmes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="programmes" id="programmes" size="1" class="form-control">
                            <option value="">-- Select Section --</option>
                            <?php foreach ($rows as $row) : ?>
                              <option value="<?php echo $row->course; ?>"><?php echo $row->course; ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                       <div class="row">
                           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section">1 <sup>st</sup> Choice <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="firstChoice" id="firstChoice" size="1" class="form-control">
                              <option value="">-- Select Program --</option>
                                <?php foreach ($courses as $course) : ?>
                              <option value="<?php echo $course->course_name; ?>"><?php echo $course->course_name; ?></option>
                                <?php endforeach ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section">2 <sup>nd</sup> Choice<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="secondChoice" id="secondChoice" size="1" class="form-control">
                              <option value="">-- Select Program --</option>
              
                            <?php foreach ($courses as $course) : ?>
                              <option value="<?php echo $course->course_name; ?>"><?php echo $course->course_name; ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section">3 <sup>rd</sup> Choice<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="thirdChoice" id="thirdChoice" size="1" class="form-control">
                              <option value="">-- Select Program --</option>
                                <?php foreach ($courses as $course) : ?>
                              <option value="<?php echo $course->course_name; ?>"><?php echo $course->course_name; ?></option>
                                <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                       </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success pull-right" name="course_submit" >Submit</button>
                          <a href="academic_info.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default pull-right">Previous</a>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'inc/footer.php';?>


