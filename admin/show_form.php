<?php
   session_start();
   $pageTitle = 'Admin | Show Form';
   include 'inc/header.php';
   require_once '../config/config.php';
   require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
}
   $db = new Database;

   
try {
    $sql = 'SELECT * FROM users WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $users = $stmt->fetch();
} catch (Exception $e) {
    echo 'Something Happened';
    exit;
}

try {
    $sql = 'SELECT * FROM academic_info WHERE user_id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $waec = $stmt->fetchAll();
} catch (Exception $e) {
    echo 'Something Happened';
    exit;
}

  


try {
    $sql = 'SELECT * FROM hnd WHERE user_id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $hnd = $stmt->fetch();
} catch (Exception $e) {
    echo 'Something Happened';
    exit;
}

try {
    $sql = 'SELECT * FROM  course_offered WHERE user_id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $courses = $stmt->fetch();
} catch (Exception $e) {
    echo 'Something Happened';
    exit;
}

try {
    $sql = 'SELECT * FROM  files WHERE user_id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $file = $stmt->fetch();
} catch (Exception $e) {
    echo 'Something Happened';
    exit;
}

$user_name = $users->surname . " " . $users->first_name . " " . $users->middle_name ;
$email = $users->email;
$title = $users->title;
$gender = $users->gender;
$address = $users->postalAddress;
$phone_number = $users->contact;
$program = $courses->program;
$course = $courses->first_choice;
$section = $courses->section;





?>
            <br />

<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Applications <small>  <?php echo date("Y-m-d"); ?></small></h3>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Applicant Form <small><?php echo  date("Y") . "/" . date("Y", strtotime("+1 year"))  ;  ?> Batch</small></h2>
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
                      <div class="col-md-12 ">
                         <h3 class="text-center">Personal Infomation</h3>
                         <hr>
                         <div class="col-md-3">
                           <img  src="<?php echo BASE_URI ?>images/profile/<?php echo $users->picProfile ?>" class="thumbnail" alt="" style="width: 200px;">
                           
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                             <label for="">Title:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->title ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Surname:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->surname ?>">
                           </div>
                           <div class="form-group">
                             <label for="">First Name:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->first_name ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Last Name:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->middle_name ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Gender:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->gender ?>">
                           </div>
                           
                  
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                             <label for="">Email:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->email ?> ">
                           </div>
                           <div class="form-group">
                             <label for="">Birth Date:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->dob ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Place of Birth: </label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->place_of_birth ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Nationality: </label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->nationality ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Marital Status: </label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->marital_status ?>">
                           </div>   
                        </div>

                        <div class="col-md-3">
                              <div class="form-group">
                             <label for="">Contact: </label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->contact ?>">
                           </div>
                           <div class="form-group">
                             <label for=""> Postal Address: </label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->postalAddress ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Religion: :</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->religion ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Denomination: </label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->denomination ?>">
                           </div>
                           <div class="form-group">
                             <label for="">Disability:</label>
                             <input type="text" class="form-control" disabled="true" value="<?= $users->disability ?> ">
                           </div>
                          
                           </div>
                        
                        
                        <hr>   

                        <div class="col-md-12">
                        <h3 class="text-center" style="margin-top: 50px;">Guardian/Sponsor Infomation</h3>
                        <hr>
                          <div class="col-md-3">
                          <label>Tile:</label>
                          <input type="text" class="form-control" disabled="true" value="<?= $users->sponsor_t ?>">
                             <br>
                           <label>Fullname: </label>
                           <input type="text" name="" value="<?= $users->sponsor_fullname ?>" class="form-control" disabled="true">
                        
                        </div>

                        <div class="col-md-3">
                           <label>Relationship: </label>
                           <input type="text" name="" value="<?= $users->sponsor_relation?>" class="form-control" disabled="true">
                           <br>
                           <label>Occupation: </label>
                          <input type="text" class="form-control" disabled="true" value="<?= $users->sponsor_oc ?>">
                        </div>
                        <div class="col-md-3">
                          <label>Email: </label>
                          <input type="text" class="form-control" disabled="true" value="<?= $users->sponsor_mail?>">
                          <br>
                           <label>Contact: </label>
                           <input type="text" class="form-control" value="<?= $users->sponsor_contact ?>" disabled="true">
                        </div> 
                        <div class="col-md-3">
                           <label>Address: </label>
                           <input type="text" class="form-control" value="<?= $users->sponsor_address ?>" disabled="true">
                        </div>
                      </div>
                      <div class="col-md-12 text-center">
                        <h3 class="text-center" style="margin-top: 50px;">Results</h3>
                        <hr><br>
                        <?php if (!$waec) : ?>
                          <a href="../images/transcript/<?php echo $hnd->hnd_transcript; ?>"  class="btn btn-primary"><i class="fa fa-eye-slash"></i> View Transcript</a>
                          <a href="../images/certs/<?php echo $hnd->hnd_certificate; ?>"  class="btn btn-info"><i class="fa fa-eye-slash"></i> View Transcript</a><hr><br><br>
                          <div class="container text-center">
                           <h3  style="margin-top: 50px;">Course Choices</h3>
                           <hr>
                           <p>Section: <br> <?= $courses->section ?></p>
                           <label style="margin-top: 10px;">Program: <br><strong class="text-success"><?= $courses->program ?></strong></label>
                            <div class="row ">
                              
                                      <div class="col-md-12" style="margin-top: 10px;">
                                         <label>First Choice: </label>
                                         <input type="text" name="" value="<?= $courses->first_choice ?>" class="form-control text-center" disabled="true">
                                      </div>
                                      <div class="col-md-12" style="margin-top: 10px;">
                                        <label>Second Choice: </label>
                                        <input type="text" class="form-control text-center" disabled="true" value="<?= $courses->second_choice ?>" >
                                      </div> 
                                      <div class="col-md-12" style="margin-top: 10px;">
                                         <label>Third Choice: </label>
                                         <input type="text" class="form-control text-center" value="<?= $courses->third_choice ?>" disabled="true">
                                         <hr><br><br>
                                      </div>
                                    
                            </div>
                         </div>

                         <div class="row">
                           <h3 class="text-center">Course Offered</h3>
                           <div class="form-group">
                             <span class="text-danger ">Select course</span>
                                <select name="btech" size="1" class="form-control">
                            <option value="">-- Select Section --</option>
                                  <option value="<?= $courses->id ?>"><?= $courses->first_choice ?></option>
                                  <option value="<?= $courses->id ?>"><?= $courses->second_choice ?></option>
                                  <option value="<?= $courses->id ?>"><?= $courses->third_choice ?></option>
                          </select> 
                           </div>
                         </div>
                         <div class="row">
                            <?php
                            if (isset($_POST['reject'])) {
                                $sql = 'DELETE FROM users WHERE id = :id';
                                $stmt = $db->prepare($sql);
                                $reject = $stmt->execute([
                                'id' => $_GET['id'],
                                ]);

                                if (isset($reject)) {
                                    echo '<script>
                                            var url = "http://localhost/AdmissionProcessing/admin/applications.php";
                                            window.location.assign(url);
                                            

                                          </script>';
                                }
                            } elseif (isset($_POST['admit'])) {
                                $sql = 'INSERT INTO admitted (title,fullname,gender,email,address,phone_number,program,course,section)
                                        VALUES(:title,:fullname,:gender,:email,:address,:phone_number,:program,:course,:section)';
                             
                                 $stmt = $db->prepare($sql);
                                 $admit = $stmt->execute([
                                  'title' => $title,
                                  'fullname' => $user_name,
                                  'email' => $email,
                                  'gender' => $gender,
                                  'address' => $address,
                                  'phone_number' => $phone_number,
                                  'program' => $program,
                                  'course' => $course,
                                  'section' => $section,
                                  
                                 ]);
                                if (isset($admit)) {
                                    $sql = 'DELETE FROM users WHERE id = :id';
                                    $stmt = $db->prepare($sql);
                                    $delete = $stmt->execute([
                                    'id' => $_GET['id'],
                                    ]);

                                    if (isset($delete)) {
                                        echo '<script>
                                             alert("Admitted Successfully")
                                             const url = "http://localhost/AdmissionProcessing/admin/letter.php?email=$email";
                                             window.location.assign(url);
                                            </script>';
                                    }
                                }
                            }
                            ?>
                           <div class="col-md-12" align="center">
                            <form action="" method="post">
                                
                                <button type="submit" class="btn btn-danger" name="reject"><i class="fa fa-trash"></i> Reject</button>
                             
                                 <button type="submit" class="btn btn-primary" name="admit"><i class="fa fa-graduation-cap"></i> Admit</button> 
                               

                            </form>
                           </div>                
                        <?php else : ?>
                            <?php foreach ($waec as $result) : ?>
                                <?php $grades = [$result->mathematics,$result->english_language, $result->science,$result->social_studies,$result->grade, $result->gradess,$result->gradesss,$result->grades]; ?>
                              <div class="row">
                                  <div class="col-md-12">
                                        <div class="col-md-3">
                                        <label>School Region:</label>
                                        <input type="text" class="form-control" disabled="true" value=" <?= $result->school_region ?>">
                                      </div>
                                      <div class="col-md-3">
                                         <label>School Name: </label>
                                         <input type="text" name="" value="<?= $result->school_name ?>" class="form-control" disabled="true">
                                      </div>
                                      <div class="col-md-3">
                                        <label>Field of Sudy: </label>
                                        <input type="text" class="form-control" disabled="true" value="<?= $result->field_of_study ?>">
                                      </div> 
                                      <div class="col-md-3">
                                         <label>School Region: </label>
                                         <input type="text" class="form-control" value="<?= $result->cert ?>" disabled="true">
                                      </div>
                                    </div>
                              </div>
                              <hr>
                              <div class="row">
                                <table class="table table-striped table-bordered ">
                            <thead class="">
                                 <th class="text-center">Subjects</th>
                                 <th class="text-center">Grades</th>
                                 <th class="text-center">Remarks</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Mathematics</td>
                                <td><?= $result->mathematics ?></td>
                                <td>
                                  <?php if ($result->mathematics == 'A1') : ?>
                                        <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                    <?php elseif ($result->mathematics == 'B2') : ?>
                                        <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                  <?php elseif ($result->mathematics == 'B3') : ?>
                                            <?= '<div class="text-success">GOOD</div>' ?>
                                    <?php elseif ($result->mathematics == 'C4') : ?>
                                            <?= '<div class="text-primary">CREDIT</div>' ?>
                                            <?php elseif ($result->mathematics == 'C5') : ?>
                                                <?= '<div class="text-primary">CREDIT</div>' ?>
                                            <?php elseif ($result->mathematics == 'C6') : ?>
                                                <?= '<div class="text-primary">CREDIT</div>' ?>
                                  <?php elseif ($result->mathematics == 'D7') : ?>
                                                    <?= '<div class="text-warning">PASS</div>' ?>
                                    <?php elseif ($result->mathematics == 'E8') : ?>
                                                    <?= '<div class="text-warning">PASS</div>' ?>
                                                    <?php elseif ($result->mathematics == 'F9') : ?>
                                                        <?= '<div class="text-danger">FAIL</div>' ?>                
                                                    <?php endif ?>
                                      
                                    </td>
                              </tr>
                              <tr>
                                <td>English Language</td>
                                <td><?= $result->english_language ?></td>
                                <td>
                                     <?php if ($result->english_language == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                        <?php elseif ($result->english_language == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                     <?php elseif ($result->english_language == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                        <?php elseif ($result->english_language == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->english_language == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->english_language == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                     <?php elseif ($result->english_language == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                        <?php elseif ($result->english_language == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                                                <?php elseif ($result->english_language == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                                                <?php endif ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Intergrated Science</td>
                                <td><?= $result->science ?></td>
                                <td>
                                     <?php if ($result->science == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                     <?php elseif ($result->science == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                        <?php elseif ($result->science == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                                <?php elseif ($result->science == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                                 <?php elseif ($result->science == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                     <?php elseif ($result->science == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                        <?php elseif ($result->science == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                                            <?php elseif ($result->science == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                                             <?php elseif ($result->science == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                     <?php endif ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Social Studies</td>
                                <td><?= $result->social_studies ?></td>
                                <td>
                                     <?php if ($result->social_studies == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                        <?php elseif ($result->social_studies == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                            <?php elseif ($result->social_studies == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                              <?php elseif ($result->social_studies == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                     <?php elseif ($result->social_studies == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                        <?php elseif ($result->social_studies == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                        <?php elseif ($result->social_studies == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                                          <?php elseif ($result->social_studies == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                     <?php elseif ($result->social_studies == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                        <?php endif ?>
                                </td>
                              </tr>
                              <tr>
                                <td><?= $result->first_elective ?></td>
                                <td><?= $result->grade ?></td>
                                <td>
                                     <?php if ($result->grade == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                     <?php elseif ($result->grade == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                           <?php elseif ($result->grade == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                     <?php elseif ($result->grade == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                        <?php elseif ($result->grade == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->grade == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                       <?php elseif ($result->grade == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                     <?php elseif ($result->grade == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                        <?php elseif ($result->grade == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                                                <?php endif ?>
                                </td>
                              </tr>
                              <tr>
                                <td><?= $result->second_elective ?></td>
                                <td><?= $result->grades ?></td>
                                <td>
                                     <?php if ($result->grades == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                        <?php elseif ($result->grades == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                     <?php elseif ($result->grades == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                        <?php elseif ($result->grades == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->grades == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->grades == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                     <?php elseif ($result->grades == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                        <?php elseif ($result->grades == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                                                <?php elseif ($result->grades == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                                                <?php endif ?>
                                </td>
                              </tr>
                              <tr>
                                <td><?= $result->third_elective ?></td>
                                <td><?= $result->gradess ?></td>
                                <td>
                                     <?php if ($result->gradess == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                        <?php elseif ($result->gradess == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                     <?php elseif ($result->gradess == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                        <?php elseif ($result->gradess == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->gradess == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->gradess == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                     <?php elseif ($result->gradess == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                        <?php elseif ($result->gradess == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                                                <?php elseif ($result->gradess == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                                                <?php endif ?>
                                </td>
                              </tr>
                              <tr>
                                <td><?= $result->fourth_elective ?></td>
                                <td><?= $result->gradesss ?></td>
                                <td>
                                     <?php if ($result->gradesss == 'A1') : ?>
                                            <?= '<div class="text-success"><strong>EXCELLENT</strong></div>' ?>
                                        <?php elseif ($result->gradesss == 'B2') : ?>
                                            <?= '<div class="text-success">VERY GOOD</div>' ?>  
                                     <?php elseif ($result->gradesss == 'B3') : ?>
                                                <?= '<div class="text-success">GOOD</div>' ?>
                                        <?php elseif ($result->gradesss == 'C4') : ?>
                                                    <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->gradesss == 'C5') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                                    <?php elseif ($result->gradesss == 'C6') : ?>
                                                        <?= '<div class="text-primary">CREDIT</div>' ?>
                                     <?php elseif ($result->gradesss == 'D7') : ?>
                                                            <?= '<div class="text-warning">PASS</div>' ?>
                                        <?php elseif ($result->gradesss == 'E8') : ?>
                                                                <?= '<div class="text-warning">PASS</div>' ?>
                                                                <?php elseif ($result->gradesss == 'F9') : ?>
                                                                    <?= '<div class="text-danger">FAIL</div>' ?>                
                                                                <?php endif ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <hr>
                              </div>
                            <?php endforeach ?>

                            <h3>Click To View WAEC Certificate</h3>
                            <a href="../images/multifiles/<?php echo $file->wassce_cert; ?>" download="true" class="btn btn-info"><i class="fa fa-eye-slash"></i> View WASSCE Certificate</a> <a href="../images/multifiles/<?php echo $file->birth_cert; ?>" download="true" class="btn btn-info"><i class="fa fa-eye-slash"></i> View Birth Certificate</a><hr> <br> <br>

                            <div class="container text-center">
                           <h3  style="margin-top: 50px;">Course Choices</h3>
                           <hr>
                           <p>Section: <br> <?= $courses->section ?></p>
                           <label style="margin-top: 10px;">Program: <br><strong class="text-success"><?= $courses->program ?></strong></label>
                            <div class="row ">
                              
                                      <div class="col-md-12" style="margin-top: 10px;">
                                         <label>First Choice: </label>
                                         <input type="text" name="" value="<?= $courses->first_choice ?>" class="form-control text-center" disabled="true">
                                      </div>
                                      <div class="col-md-12" style="margin-top: 10px;">
                                        <label>Second Choice: </label>
                                        <input type="text" class="form-control text-center" disabled="true" value="<?= $courses->second_choice ?>" >
                                      </div> 
                                      <div class="col-md-12" style="margin-top: 10px;">
                                         <label>Third Choice: </label>
                                         <input type="text" class="form-control text-center" value="<?= $courses->third_choice ?>" disabled="true">
                                         <hr><br><br>
                                      </div>
                                    
                            </div>
                         </div>

                         <div class="row">
                           <h3 class="text-center">Course Offered</h3>
                           <div class="form-group">
                             <span class="text-danger ">Based on your result, You are hereby offered the course below.</span>
                                <?php if (in_array("F9", $grades)) : ?>
                                  <input type="text" value="" placeholder="No Course Avaliable for this applicant" class="form-control" disabled><hr> <br> <br>
                                <?php elseif (in_array("A1", $grades)) : ?>
                                    <input type="text" value="<?php echo($courses->first_choice); ?>" id="" class="form-control" disabled><hr> <br> <br>
                                <?php elseif (in_array("B2", $grades)) : ?>
                                      <input type="text" value="<?php echo($courses->second_choice); ?>" id="" class="form-control" disabled><hr> <br> <br>  
                                <?php elseif (in_array("C4", $grades)) : ?>
                                     <input type="text" value="<?php echo($courses->fourth_choice); ?>" id="" class="form-control" disabled><hr> <br> <br>
                                <?php endif ?>  
                           </div>
                         </div>
                         <div class="row">
                            <?php
                            if (isset($_POST['reject'])) {
                                $sql = 'DELETE FROM users WHERE id = :id';
                                $stmt = $db->prepare($sql);
                                $reject = $stmt->execute([
                                'id' => $_GET['id'],
                                ]);

                                if (isset($reject)) {
                                    echo '<script>
                                            var url = "http://localhost/AdmissionProcessing/admin/applications.php";
                                            window.location.assign(url);
                                            confirm("Are you sure ?");

                                          </script>';
                                }
                            } elseif (isset($_POST['admit'])) {
                                $sql = 'INSERT INTO admitted (title,fullname,gender,email,address,phone_number,program,course,section)
                                        VALUES(:title,:fullname,:gender,:email,:address,:phone_number,:program,:course,:section)';
                                 
                                 $stmt = $db->prepare($sql);
                                 $admit = $stmt->execute([
                                  'title' => $title,
                                  'fullname' => $user_name,
                                  'email' => $email,
                                  'gender' => $gender,
                                  'address' => $address,
                                  'phone_number' => $phone_number,
                                  'program' => $program,
                                  'course' => $course,
                                  'section' => $section,
                                  
                                 ]);
                                if (isset($admit)) {
                                    $sql = 'DELETE FROM users WHERE id = :id';
                                    $stmt = $db->prepare($sql);
                                    $delete = $stmt->execute([
                                    'id' => $_GET['id'],
                                    ]);

                                    if (isset($delete)) {
                                        echo '<script>
                                             alert("Admitted Successfully")
                                             const url = "http://localhost/AdmissionProcessing/admin/letter.php?email=$email";
                                             window.location.assign(url);
                                            </script>';
                                    }
                                }
                            }
                            ?>
                           <div class="col-md-12" align="center">
                            <form action="" method="post">
                                <?php if (in_array('F9', $grades)) : ?>
                                <button type="submit" class="btn btn-danger" name="reject"><i class="fa fa-trash"></i> Reject</button>
                                <?php else : ?>
                                 <button type="submit" class="btn btn-primary" name="admit"><i class="fa fa-graduation-cap"></i> Admit</button> 
                                <?php endif ?>

                            </form>
                           </div>                
                        <?php endif ?>
                      </div>

                         
                               
                         </div>
                      </div>
                  </div>
                </div>
              </div>

        </div>
        <!-- /page content -->

    
<?php include 'inc/footer.php';?>
