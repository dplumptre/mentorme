<?php

require('../../config.php');
require_once($CFG->dirroot .'/local/mentorme/lib.php');
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
                <h2 class="breadcrumb-title">Dashboard</h2>
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

							<div class="row">
								<div class="col-md-12 col-lg-4 dash-board-list blue">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>23</h3>
											<h6>Members</h6>															
										</div>
									</div>
								</div>
								
								<div class="col-md-12 col-lg-4 dash-board-list yellow">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-calendar-check"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>33</h3>
											<h6>Appointments</h6>															
										</div>
									</div>
								</div>
								
								<div class="col-md-12 col-lg-4 dash-board-list pink">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-wallet"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>$14</h3>
											<h6>Total Earned</h6>															
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Mentee Lists</h4>
									<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0">
													<thead>
														<tr>
															<th>BASIC INFO</th>
															<th>CREATED DATE</th>
															<th class="text-center">TAGS</th>
															<th class="text-center">ACTION</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user2.jpg" alt="User Image"></a>
																	<a href="profile.html">Tyrone Roberts<span>tyroneroberts@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="pending">PENDING</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user1.jpg" alt="User Image"></a>
																	<a href="profile.html">Julie Pennington <span>julie@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="pending">PENDING</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user3.jpg" alt="User Image"></a>
																	<a href="profile.html">Allen Davis <span>allendavis@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="pending">PENDING</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user4.jpg" alt="User Image"></a>
																	<a href="profile.html">Patricia Manzi <span>patriciamanzi@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="accept">ACCEPTED</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user5.jpg" alt="User Image"></a>
																	<a href="profile.html">Olive Lawrence <span>olivelawrence@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="accept">ACCEPTED</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user6.jpg" alt="User Image"></a>
																	<a href="profile.html">Frances Foster <span>frances@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="accept">ACCEPTED</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user7.jpg" alt="User Image"></a>
																	<a href="profile.html">Deloris Briscoe <span>delorisbriscoe@adobe.com</span></a>				
																</h2>
															</td>
															<td>08 April 2020</td>
															<td class="text-center"><span class="reject">REJECTED</span></td>
															<td class="text-center"><a href="profile.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
														</tr>
													</tbody>
												</table>		
											</div>
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
