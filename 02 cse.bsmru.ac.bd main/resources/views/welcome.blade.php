<!DOCTYPE html>
<html lang="en">

<head>

		{{$customized_title_state = -1;}}
		@include('Partials.headerfile')

</head>

<body>



	<!-- Header -->

		{{$navdesign = 0;}}
		///$menulinks[0] = "#hero-section";
		@include('Partials.home-menu')

	<!-- /Header -->


	<!--Hero/Home Area-->
	<section id="home" style="scroll-margin-top: 100px;">
		<div id="carouselExample" class="carousel slide image-shade" data-bs-ride="carousel">
			<div class="carousel-inner">

				<div class="carousel-item active c-item" data-bs-interval="3000">
					<img src="assets/img/c1.jpg" class="d-block w-100 c-img overlay" alt="...">
				</div>
				<div class="carousel-item c-item" data-bs-interval="3000">
					<img src="assets/img/c2.jpg" class="d-block w-100 c-img" alt="..." >
				</div>
				<div class="carousel-item c-item" data-bs-interval="3000">
					<img src="assets/img/c3.jpg" class="d-block w-100 c-img" alt="...">
				</div>

			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<div class="home-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="white-text" style="font-size: 3rem">Department of</h1>
						<?php	echo "<h1 class=\"white-text\" style=\"font-size: 5rem; font-weight: bold;\">$dept_full_name</h1>";?>
						<!--<a class="main-button icon-button" href="#">Get Started!</a>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Hero/Home Area-->






	<!-- About -->
	<div id="about" class="section" style="scroll-margin-top: 50px;">

		<!-- container -->
		<div class="container" id="about-2">

			<!-- row -->
			<div class="row">

				<div class="col-md-7 swap-border-shadow" id="about-div" style="position: relative;">
					<div class="section-header">
						<h2>About Department of <?= $dept_full_name; ?></h2>
					</div>
					<hr>

					<p id="about-description">
						<?php echo $about;?>

					<!--
						Welcome to the Computer Science and Engineering (CSE) Department at Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj! This department started its academic journey in 2022, offering bachelor's degrees. Here, the focus is on nurturing problem-solving abilities and fostering skills in competitive programming of the students.<br><br>

In a remarkable start to its competitive programming journey, the CSE Department secured the 69th spot in the BUET IUPC 2023, a national competition that draws participants from all over Bangladesh. The department boasts well-equipped computer and hardware labs, providing students with hands-on experience and cutting-edge tools.<br><br>

But that's not all. The CSE Department also encourages the exciting world of robotics, sparking the imaginations of budding engineers. Moreover, it consistently motivates students to develop practical systems that find real-world applications, bridging the gap between theory and practice.<br><br>

At Bangabandhu Sheikh Mujibur Rahman University, the CSE Department aims to create an inclusive and supportive community where students can pursue their academic dreams while contributing to the ever-evolving fields of computer science and engineering. Join this exciting journey and be a part of shaping the future!

-->
					</p>


				</div>

				<!--Inner gap between about section and notice-->
				<div class="col-1"></div>
				<!--End of Inner gap between about section and notice-->

				<!--Start of Notice-->
				<div class="col-md-4">
					<div class="section-header">
						<h2>Notices</h2>
					</div>
					<hr>


					<!--Notice starts-->
					<?php
						$len = sizeof($notice_titles);
						$count = 3;
						for($i=$len-1; $i>=0; $i--){
							echo
							"
							<div class=\"feature\">

								<div class=\"feature-icon\"><p><b>$notice_dates[$i]</b></p></div>
								<div class=\"feature-content\">
									<h4><a href=\"$notice_file_links[$i]\">$notice_titles[$i]</a></h4>
									<p>$notice_dates[$i]</p><br>
								</div>
							</div>
							";
							$count--;
							if($count==0){
								break;
							}
						}
					?>
					<!--Notice ends-->

					<a href="allnotices.php" target="_blank"><button type="button" class="btn btn-warning view-all">View all</button></a>

				</div>

			</div>
			<!-- row -->

		</div>
		<!-- container -->
	</div>
	<!-- /About -->







	<!-- Events -->
	<div id="news-events" class="section" style="scroll-margin-top: 50px;">

		<!-- container -->
		<div class="container" style="margin-top: 30px;">

			<!-- row -->
			<div class="row">
				<div class="section-header text-center">
					<h2>News and Events</h2>
				</div>
			</div>
			<!-- /row -->

			<!-- Events -->
			<div id="courses-wrapper">

				<!-- row -->
				<div class="row">

				<!--Event Starts-->
				<?php
						$len = sizeof($event_titles);
						$count = 4;
						for($i=$len-1; $i>=0; $i--){

							echo
							"
							<div class=\"col-md-3 col-sm-6 col-xs-6\">
								<div class=\"course\">
									<a href=\"events.php?id=$i\" class=\"course-img\">
										<img src=\"$event_img_links[$i]\" alt=\"\">
										<i class=\"course-link-icon fa fa-link\"></i>
									</a>
								<div class=\"course-details\">
									<span class=\"course-category\">$event_dates[$i]</span>
								</div>
									<a class=\"course-title\" href=\"events.php?id=$i\">$event_titles[$i]</a>
								</div>
							</div>

							";
							$count--;
							if($count==0){
								break;
							}
						}
					?>
					<!--Event Ends-->

				</div>
				<!-- /row -->

			</div>
			<!-- /courses -->

			<div class="row">
				<div class="center-btn">
					<a class="main-button icon-button" href="event.php">View More</a>
				</div>
			</div>

		</div>
		<!-- container -->

	</div>
	<!-- /News and Events -->



	<!-- preloader -->
	<div id='preloader'>
		<div class='preloader'></div>
	</div>
	<!-- /preloader -->












	<!--Footer Starts-->
	<?php
		include('assets/Partials/footer.php');
	?>
	<!--Footer Starts-->



	<!--Include footer files-->

	<?php include('assets/Partials/footerfile.php');?>

</body>

</html>

