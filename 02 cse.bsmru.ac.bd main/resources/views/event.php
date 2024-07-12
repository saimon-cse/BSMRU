
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $customized_title_state = -1;
      include('assets/Partials/headerfile.php');
    ?>

</head>

<body>



    <!-- Header -->

    <?php
      $navdesign = 1;
      include('assets/Partials/home-menu.php');
    ?>
    <!-- /Header -->

    <div class="container-fluid" style="height: 100px; border: solid;">

        <!--Dept name-->
    </div>
    <div class="container-fluid dept-name box-shadow">
        <h2>Department of <?php echo "$dept_full_name"?></h2>
    </div>
    <!--End Dept-->

    <div class="container">
        <br>
        <br>
        <br>
    <?php
						$len = sizeof($event_titles);
						$count = 1000;
						for($i=$len-1; $i>=0; $i--){

							echo 
							"
							<div class=\"col-md-3 col-sm-6 col-xs-6\">
								<div class=\"course\">
									<a href=\"events\" class=\"course-img\">
										<img src=\"$event_img_links[$i]\" alt=\"\">
										<i class=\"course-link-icon fa fa-link\"></i>
									</a>
								<div class=\"course-details\">
									<span class=\"course-category\">$event_dates[$i]</span>
								</div>
									<a class=\"course-title\" href=\"events\">$event_titles[$i]</a>
								</div>
							</div>
							
							";
							$count--;
							if($count==0){
								break;
							}
						}
					?>
    </div>
                       
    

    <div style="height: 30px;"></div>
    



    <!--Footer-->
    <?php
      include('assets/Partials/footer.php');
    ?>







    <!-- JS Files-->

    <?php
      include('assets/Partials/footerfile.php');
    ?>

    
</body>

</html>