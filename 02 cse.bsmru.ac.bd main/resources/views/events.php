<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $customized_title_state = -1;
      include('assets/Partials/headerfile.php');
    ?>

</head>
<body>

    <?php 
		$navdesign = 1;
		include('assets/Partials/home-menu.php'); 
	?>
    
    <div class="container-fluid dept-name box-shadow" style="margin-top: 100px;">
        <h2>Department of <?php echo "$dept_full_name"?></h2>
    </div>

	<br>

   <section class="container-xl my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <img class="card-img-top" src="assets/img/Events/ev2.jpg" alt="event">
                <div class="card-body">
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
                    <i class='far fa-calendar-alt'><b> 14 Oct 22</b> </i><br><br>
                        <div style="font-family: inherit; text-align:justify  ">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor modi incidunt velit porro enim laudantium architecto repellat, nesciunt dolorem hic quidem, temporibus quia laborum. Aut fuga deleniti veritatis maiores, dolorem quisquam, veniam quis suscipit sequi eligendi vitae natus aperiam unde aliquam cumque beatae dolorum distinctio quam totam voluptate excepturi. Hic molestias dolore distinctio architecto delectus fugiat excepturi ut ducimus dolores tempora, ad laborum maxime ab. Praesentium, illo quibusdam modi autem obcaecati optio veniam amet libero earum pariatur quasi nihil, commodi quos, itaque ut in repellat excepturi suscipit? Quo deleniti eaque soluta voluptate! Dolor beatae voluptate veritatis quis excepturi recusandae accusantium.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi error iste fuga ab eligendi, enim mollitia nemo sapiente modi tempora eveniet porro illum rerum aperiam? Repellendus necessitatibus earum vero eos.
                        </div>
                       
                </div>
                     
                </div>
                
            </div>
            
               

                
				<!--Inner gap -->
				<div class="col-1"></div>
				<!--End of Inner gap-->

				<!--Start Events-->
				<div class="col-md-3">
					<div class="section-header" style="border-bottom: #eea236 1px solid;">
						<h3>Other Events</h3>
					
						
					</div>
					<hr>
					

					
					<?php
						$len = sizeof($event_titles);
						$count = 4;
						for($i=$len-1; $i>=0; $i--){
							echo 
							"
							<div class=\"feature\">
						
								<div class=\"feature-icon\"> <img src=\"$event_img_links[$i]\"  class=\"rounded-circle\" style=\"width:80px; height:80px\"> </div>
								<div class=\"feature-content\">
									<h4>$event_titles[$i]</a></h4>
									<p> <i class='far fa-calendar-alt'> $event_dates[$i]</i> </p><br>
								</div>
							</div>
							";
							$count--;
							if($count==0){
								break;
							}
						}
					?>
					

					<a href="#" target="_blank"><button type="button" class="btn btn-warning view-all">View all</button></a>
			
				</div>

                    


            </div>

        </div>

   </section>

<br><br>



    <!--Footer-->
	<?php include('assets/Partials/footer.php')?>
	<!--Footer ends-->



    <!--Include footer files-->
	<?php	
		include('assets/Partials/footerfile.php');
    ?>
    

</body>
</html>