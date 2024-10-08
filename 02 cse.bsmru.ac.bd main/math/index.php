<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
		include('assets/Partials/db.php');
		include('assets/Partials/headerfile.php');
		include('assets/Views/indexview.php');
	?>
    <link rel="stylesheet" href="assets/css/indexnew.css">
    

	



</head>
<body>

	<!-- Header -->
	<?php 
		$navdesign = 0;
        include('assets/Partials/home-menu.php'); 
        navbar_section($conn, $navdesign);
	?>
	<!-- /Header -->


	<!--Hero/Home Area-->
	<section id="home" style="scroll-margin-top: 100px; margin-bottom: 0.5px;">
		<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-interval="5000">
			<div class="carousel-inner">
				
				<?php
					carouselSection($conn, $dept_full_name, $special_event);
				?>

				

			</div>
			<a href="javascript:void(0)" class="carousel-control-prev" type="button" data-target="#carouselExample" data-slide="prev">
				<img src="assets/img/icons/previous1.svg" style="height: 40px; width: 40px; object-fit: fill; margin-left: -10px; opacity: 0.8;" alt="Previous">
			</a>
			<a href="javascript:void(0)" class="carousel-control-next" type="button" data-target="#carouselExample" data-slide="next">
				<img src="assets/img/icons/next1.svg" style="height: 40px; width: 40px; object-fit: fill; margin-right: -10px; " alt="Previous">
			</a>
		</div>

		

	</section>

	<?php
		departmentName($dept_full_name);
	?>
	<!--Hero/Home Area-->






	<!-- About and Notice Starts-->
	<div id="about" class="section" style="scroll-margin-top: 50px; padding-bottom: 40px; padding-top: 20px;">

		<!-- container -->
		<div class="container-fluid" id="about-2">

			<!-- row -->
			<div class="row" style="    font-family: 'Montserrat', sans-serif;important">

				<!--About Section starts-->
				<?php aboutSection($conn); ?>
				
				<!--About Section ends-->

				<!--Inner gap between about section and notice-->
				<!--<div class="col-1"></div>-->
				<!--End of Inner gap between about section and notice-->

				<!--Start of Notice-->
				<div class="col-md-5">
					<div class="section-header" >
						<div class="container-fluid">
							<div class="row media-margin">
								<div class="col-md-6" style="display: flex; align-items: flex-end;"><h4 class="notice-header " style="margin-bottom: 0px;">Notices</h4></div>
								
							</div>
						</div>
						
					</div>
					

					<!--Notice starts-->
					<div class = "table-button-container">
					<?php noticeSection($conn, 4);?>
					<!--Notice ends-->

						<div class="row">
							<div class="col-md-12 " style="width: 100%"><h4 class="notice-header" style="width: 100%"><a class = "btn btn-primary" style="width: 100%" href="allnotices" style="margin-bottom: -18px;">View All...</a></div>
						</div>
					</div> <!--Table Button Container Ends-->
				</div>
				

			</div>
			<!-- row -->

			

		</div>
		<!-- container -->
	</div>
	<!-- /About and Notice Ends -->







	<!-- Events -->
	<div id="news-events" class="section" style="scroll-margin-top: 50px; padding-top: 50px;">

		<!-- container -->
		<div class="container-fluid event-section-padding" style="margin-top: 0px;">

			<!-- row -->
			<div class="row">
				<div class="section-header" style="padding-left: 20px; padding-right: 20px;">
					<h2 class = "pacifico-font" style="margin-bottom: 0px; border-bottom: 1px solid rgb(231, 187, 12); box-shadow: -5px 0px rgb(231, 187, 12); padding-left: 10px; padding-bottom: 10px; padding-top: 5px;">News and Events</h2>
				</div>
			</div>
			<!-- /row -->

			<!-- Events -->
			<div id="courses-wrapper" style="padding-left: 5px; padding-right:5px;">

				<!-- row -->
				<div class="row">
				
				<!--Event Starts-->
				<?php
						eventSection($conn);
				?>
				<!--Event Ends-->

				</div>
				<!-- /row -->

			</div>
			<!-- /courses -->

			<div class="row">
				<div class="center-btn">
					<a class="main-button icon-button" href="allevents">View More</a>
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
		include('assets/Views/footer.php');
		footerSection($conn, $phone, $email, $address);
	?>
	<!--Footer Starts-->




	<!--Include footer files-->

	<?php include('assets/Partials/footerfile.php');?>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		var divA = document.getElementById('about-div');
		var divB = document.getElementById('div-B');
		var textA = document.getElementById('about-description');
		var readMoreBtn = document.getElementById('read-more-btn');

		// Adjust height of div-A to match div-B
		divA.style.height = divB.clientHeight + 'px';

		// Show read more button if text overflows
		if (textA.scrollHeight > divA.clientHeight) {
		readMoreBtn.style.display = 'block';
		}

		readMoreBtn.addEventListener('click', function() {
		textA.style.display = '-webkit-box';
		textA.style.webkitLineClamp = 'initial';
		readMoreBtn.style.display = 'none';
		});
	});
</script>


<script>
	document.querySelector('.marquee span').addEventListener('click', function() {
		this.style.animationPlayState = 'paused';
	});

	document.querySelector('.marquee span').addEventListener('mouseover', function() {
		this.style.animationPlayState = 'running';
	});
</script>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>