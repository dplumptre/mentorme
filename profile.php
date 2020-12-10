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

$result = $code->updateUserProfile($_POST,"submit");
$profle = $code->getUserProfile($USER->id);
$interests = $code->getAllInterest();
$insertInterest = $code->insertUserInterest($_POST,'submit_interest',$USER->id);

$user_interests = $code->getUserInterest($USER->id);



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
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Profile</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->


	<!-- Page Content -->
    <div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Sidebar -->
							<div class="profile-sidebar">
								<div class="user-widget">
									<div class="pro-avatar">JD</div>
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
									</div>
									<div class="user-info-cont">
										<h4 class="usr-name">Jonathan Doe</h4>
										<p class="mentor-type">English Literature (M.A)</p>
									</div>
								</div>
								<div class="progress-bar-custom">
									<h6>Complete your profiles ></h6>
									<div class="pro-progress">
										<div class="tooltip-toggle" tabindex="0"></div>
										<div class="tooltip">80%</div>
									</div>
								</div>
								<div class="custom-sidebar-nav">
									<ul>
										<li><a href="dashboard.html" class="active"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="bookings.html"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="schedule-timings.html"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="chat.html"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="invoices.html"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="reviews.html"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="blog.html"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="profile.html"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="login.html"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">


									
									<!-- Profile Settings Form -->
									<form action="" method="post">
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="assets/img/user/user.jpg" alt="User Image">
														</div>
												
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Grade</label>
													<input type="text" style="background:#E9ECEF" class="form-control " name="grade" value=<?php echo   strlen($profle->grade)>1? $profle->grade : "";  ?> readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Department</label>
													<input type="text"style="background:#E9ECEF"  class="form-control" name="department" value=<?php echo   strlen($profle->department)>1? $profle->department : "";  ?> readonly>
												</div>
											</div>
                                            <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text"style="background:#E9ECEF"  class="form-control" name="country" value=<?php echo   strlen($profle->country)>1? $profle->country: "";  ?> readonly>
												</div>
											</div>
                                            <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Directory</label>
													<input type="text"style="background:#E9ECEF"  class="form-control" name="directory" value=<?php echo   strlen($profle->directory)>1? $profle->directory : "";  ?> readonly>
												</div>
											</div>

                                            <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Job Title</label>
													<input type="text"  style="background:#E9ECEF"  class="form-control"  name="job_title" value=<?php echo   strlen($profle->job_title)>1? $profle->job_title: "";  ?> readonly>
												</div>
											</div>
                                            <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Work Force</label>
													<input type="text" style="background:#E9ECEF"  class="form-control"  name="workforce" value=<?php echo   strlen($profle->workforce)>1? $profle->workforce : "";  ?> readonly>
												</div>
											</div>


											<div class="col-12 ">
												<div class="form-group">
													<label>Subsidiary</label>
													<input type="email" class="form-control" value="subsidiary" name="subsidiary" value=<?php echo   strlen($profle->subsidiary)>1? $profle->subsidiary : "";  ?> readonly>
												</div>
											</div>
											


                                            <div class="form-group col-12"> <hr> </div>

                                            <?php if($result) :?>
                                            <div class="alert alert-primary" role="alert">
                                            <?php echo $result; ?>
                                            </div>
                                            <?php endif ;?>


                                            <div class="col-12">
												<div class="form-group">
													<label>Language</label>
                                                    <input  name="profile_id" value="<?php echo $profle->id ;?>" type="hidden" />
													<input type="text" name="language"   class="form-control" value="<?php echo   strlen($profle->language)>1? $profle->language : "";  ?>" >
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>About Me</label>
                                                <textarea class="form-control" name="about"><?php echo   strlen($profle->about)>1? $profle->about : "";  ?></textarea>
												</div>
											</div>											
                                            <div class="col-12">
												<div class="form-group">
												<label>Career Aspirations</label>
                                                <textarea class="form-control" name="career_aspirations"><?php echo   strlen($profle->career_aspirations)>1? $profle->career_aspirations : "";  ?></textarea>
												</div>
											</div>
			
										</div>
										<div class="submit-section">
											<button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->









                                    <!-- interest -->



                                    <div class="form-group col-12"> <hr> </div>
                                    <h3>Interest</h3>


                                    <?php
                                    

                                    
                                    ?>

                                    <form action="" method="post">

                                   


                                        <?php for($i=1; $i<count($interests)+1 ; $i++): ?>

                                        <div class="form-check">
                                        <input <?php echo $code->checkInArray($interests[$i]->id, $user_interests) ?  "checked" : null ;?> class="form-check-input" type="checkbox" name="name[]" value="<?php echo $interests[$i]->id ?>" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        <?php echo $interests[$i]->interest; ?> 
                                        </label>
                                        </div>

                                        <?php endfor; ?>












                                    <div class="submit-section mt-3">
											<button type="submit" name="submit_interest" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
                                    </form>


                                  <!-- interest -->







									
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
