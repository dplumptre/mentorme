<?php

require('../../config.php');
require_once($CFG->dirroot .'/local/mentorme/lib.php');
require_once($CFG->dirroot .'/local/mentorme/classes/Mentorme.php');
global $DB;
global $USER;
global $CFG;
$pre = $CFG->prefix;


$PAGE->set_context($context);
$PAGE->set_pagelayout('mydashboard');
$PAGE->set_title('Iwelabi Learning Platform : Iwelabi Sign Up');
$PAGE->set_heading('Iwelabi Learning Platform : Iwelabi Sign Up');
$PAGE->requires->css('/local/mentorme/assets/plugins/fontawesome/css/fontawesome.min.css');
$PAGE->requires->css('/local/mentorme/assets/plugins/fontawesome/css/all.min.css');
$PAGE->requires->css('/local/mentorme/assets/css/style.css');
$PAGE->requires->css('/local/mentorme/assets/css/custom.css');








$code = new Mentorme();
$profle = $code->getUserProfile($USER->id);
$gradeslug = $profle->grade;
$code->makeMentorOrMentee($_GET['id'],$_GET['role']);


// Display page header.
echo $OUTPUT->header();

?>

	<!-- Breadcrumb -->
	<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blank Page</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blank Page</h2>

						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<?php
							
							// $result =  $code->getAllGradeSlugs();
							// print_r($result);
                           
							// if($code->checkGradeFromSelectedGrade($gradeslug)){
							// 	echo "yes!";
							// }else{
							// 	echo"noooo";
							// }

							//print_r($code->getRole('mentor'));
							//print_r($code->getAllSelectedGradeSlugs());
							
							?>





<div class="content success-page-cont" style="min-height: 419px;">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Mentor</h3>
										<?php 	if($code->checkGradeFromSelectedGrade($gradeslug)) :?>


											   <?php 	if($code->checkUserRole($USER->id,'mentor')) :?>
													<a href="profile.php" class="btn btn-danger view-inv-btn">View Dashboard</a>
												<?php   else           :?>
													<?php echo "<a href=\"landing.php?id=".$USER->id."&role=mentor \" class=\"btn btn-danger view-inv-btn\">Set Up Mentor</a>"?>
												<?php   endif           ;?>



										<?php   else :?>
											<p class="text-danger"> Grade too low be a Mentor !</p>
									    <?php   endif ;?>
											
									
											
											
									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
						</div>



						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Mentee</h3>

									         	<?php 	if($code->checkUserRole($USER->id,'mentee')) :?>
													<a href="profile.php" class="btn btn-danger view-inv-btn">View Dashboard</a>
												<?php   else           :?>
													<?php echo "<a href=\"landing.php?id=".$USER->id."&role=mentee \" class=\"btn btn-danger view-inv-btn\">Set Up Mentee</a>"?>
												<?php   endif           ;?>


									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
						</div>







					</div>
					
				</div>
			</div>

















						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->



<?php
// Display page footer.
echo $OUTPUT->footer();
