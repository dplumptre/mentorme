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

$code->connectToMentor($_GET['mentor_id']);




// $profle = $code->getUserProfile($USER->id);
// $gradeslug = $profle->grade;
// $code->makeMentorOrMentee($_GET['id'],$_GET['role']);


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
            <div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Request Sent  Successfully!</h3>
										<p>Kindly wait for approval from  <strong> <?php echo $code->getUser($_GET['mentor_id'])->firstname ;?> </strong></strong></p>
										<a href="mentor_list.php" class="btn btn-primary view-inv-btn">Back to Mentor List</a>
									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
						</div>
					</div>
					
				</div>
			</div>	
			<!-- /Page Content -->



<?php
// Display page footer.
echo $OUTPUT->footer();
