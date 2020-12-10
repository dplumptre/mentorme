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



$grades = $code->getAllGrades();
$mentors = $code->getAllMentorsOrMentee('mentor');


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
                <h2 class="breadcrumb-title">Mentor List</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->


	<!-- Page Content -->
	<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
						<!-- Search Filter -->
                        <div class="card search-filter">

								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">

                                <form class="search-form custom-search-form" method="GET" action="">
								
								<div class="filter-widget">
									<h4>Gender</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type" value="M">
											<span class="checkmark"></span> Male
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type" value="F">
											<span class="checkmark"></span> Female
										</label>
									</div>
								</div>
								<div class="filter-widget">
								<h4>Grade</h4> 
								<?php for($i=1; $i<count($grades)+1 ; $i++): ?>
								<div>
									<label class="custom_check">
									<input   type="checkbox" name="grade[]" value="<?php echo $grades[$i]->id ?>">
									<span class="checkmark"></span> <?php echo $grades[$i]->grade; ?> 
									</label>
								</div>
								<?php endfor; ?>

								</div>
									<div class="btn-search">
										<button type="submit" class="btn btn-block">Search</button>
									</div>	
                                </form>
								</div>
							</div>
							<!-- /Search Filter -->

						</div>
						
                        <div class="col-md-7 col-lg-8 col-xl-9">

						<?php // print_r($code->searchForMentor());?>


                        <form class="search-form custom-search-form"  method="GET" action="">
								<div class="input-group">
									<input type="text"  name ="search_mentor" placeholder="Enter Mentor's name..." class="form-control">
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary mentee_search"><i class="fa fa-search"></i></button>
									</div>
								</div>
						</form>
						
                        <div class="row row-grid">
                        


									<?php foreach($code->searchForMentor() as $mentor): ?>


										<div class="col-md-6 col-lg-4 col-xl-4">
										<div class="card widget-profile user-widget-profile">
											<div class="card-body">
												<div >
													<div class="profile-info-widget">
														<a href="profile-mentee.html" class="booking-user-img">
														<img src="assets/img/user/user.jpg" alt="User Image">                
														</a>';
													<div class="profile-det-info">        
													<h3><a href="profile-mentee.html"> <?php echo $mentor->firstname;?> <?php echo $mentor->lastname;?>  </a></h3>                  
													<div class="mentee-details">
														<h5><?php echo $mentor->job_title;?>   </h5>
														<h5 class="mb-0"><?php echo $code->getGradeById($mentor->grade_id)->grade;?> </h5>
													    <a href="<?php echo "mentor_success.php?mentor_id=".$mentor->user_id  ;?>" class="btn btn-danger">Connect</a>
													</div>
												</div>             
												</div>       
												</div>
											</div>
										</div>
									</div>

									<?php endforeach; ?>


                        </div>



                        <div class="blog-pagination mt-4">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
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
