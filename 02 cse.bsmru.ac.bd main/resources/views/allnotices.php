<!DOCTYPE html>
<html lang="en">
  
<head>

<?php	
    $customized_title_state = -1;
		include('assets/Partials/headerfile.php');
?>
    
    <!-- custom CSS -->
    <link rel="stylesheet" href="assets/css/allnotices.css">
   
    
</head>


<body>
    
    <!-- Header -->

    <?php 
		$navdesign = 1;
		include('assets/Partials/home-menu.php'); 
    
	  ?>
	  </header>   
  
  



    <div class="container-fluid dept-name box-shadow" style="margin-top: 100px;">
        <h2>Department of <?php echo "$dept_full_name"?></h2>
    </div>

<!-- ALL NOTICES starts -->

<div class="container body-content">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning" style="border: none;">
                <div class="panel-heading" style="font-size: larger; font-style: inherit; background: none; border: none;">
                    <strong style="color:#000;">All Notices</strong>
                </div>
                <div class="panel-body">
                    <div id="Content_Panel_ListView" style="overflow-x:auto;">
	
                            
                      <table id="jar" class="table table-hover table-sm table-striped table-bordered">
                            <tbody>
                            <tr>
                              <th scope="col" style="width: 5%;background-color: #e8c749">Serial</th>

                              <th scope="col" style="width: 10%; background-color: #e8c749">Date</th>

                              <th scope="col" style="background-color: #e8c749" class="info">Description</th>

                              <th scope="col" style="width: 10%; background-color: #e8c749">Link</th>
	

                            </tr>

                            <?php
                              $len = sizeof($notice_titles);
                              $ser = 1;
                              $s = "";
                              for($i=$len-1; $i>=0; $i--){
                                  $s = $s . "<tr class=\"content\">";
                                  $s = $s . "<td>$ser</td>";
                                  $s = $s . "<td style=\"vertical-align: middle\"><span class=\"NoticeDate\">$notice_dates[$i]</span></td>";
                                  $s = $s . "<td><p><span class=\"noticeDetails\">$notice_titles[$i]</span></p></td>";
                                  $s = $s . "<td><a href=\"$notice_file_links[$i]\">[Download]</a></td>";
                                  $s = $s . "</tr>";
                                  $ser++;
                              }
                              
                              echo $s;
                            ?>
                                
                            </tbody>
                 </table>
          <!-- Pagination -->
                           
          <nav>
              <ul class="pagination justify-content-center pagination-sm">
              </ul>
          </nav>
          <!-- pagination ends -->
                                          
                   </div>
                </div>
            </div>
         </div> 
    </div>
    </div>

    <!-- all notices ends -->




    <!--Footer-->
	<!-- <div class="container-fluid my-5"> -->
    <!-- Footer -->
    <footer class="text-center  text-lg-start text-white" style="background-color: #002147">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-lg-7 mx-auto mt-3">
              <h4 class=" mb-4 font-weight-bold" style="font-family: montserrat, sans-serif; color:gold; line-height:1.4">
                <b>Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj</b>
              </h4>
              <hr>

		<div class="contact" style="line-height:30px;">
			
PHONE : 
<a href="callto:01734331313" style="text-decoration: none; color: white;font-family: montserrat, sans-serif; font-weight:200;">+88 017 3433 1313</a><br>

EMAIL : 
<a href="mailto:info@bsmru.ac.bd" style="text-decoration: none; color: white;font-family: montserrat, sans-serif; font-weight:200;">info@bsmru.ac.bd</a><br>
<b style="font-family: montserrat, sans-serif; font-weight:200;">
Kishoreganj, 
Bangladesh
            
</b>  </div>

            </div>
            <div class="col-lg-5" style="padding-top:10px; padding-bottom-10px;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3632.2513787487514!2d90.77185287449417!3d24.442062361873592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375693bff2e9b0c5%3A0x948309aeb6bfb1d5!2sBangabandhu%20Sheikh%20Mujibur%20Rahman%20University%2C%20Kishoreganj!5e0!3m2!1sen!2sbd!4v1697165322548!5m2!1sen!2sbd" width="100%" height="200px;" style="border:0;padding:15px 20px 0px 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!--Grid row-->
        </div></section>
        <!-- Section: Links -->

        <hr class="my-3">

        <!-- Section: Copyright -->
        <section class="p-3 pt-0">
          <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col text-center text-md-start">
              <!-- Copyright -->
              <div class="p-3" style="text-align:center;">
                © Developed by:
                <a class="text-dept" href="https://cse.bsmru.ac.bd/" style="text-decoration: none; font-family: open sans,sans-serif;color: gold;">Department of Computer Science and Engineering</a>
              </div>
              <!-- Copyright -->
            </div>
            <!-- Grid column -->

           
          </div>
        </section>
        <!-- Section: Copyright -->
      </div>
      <!-- Grid container -->
    </footer>
    <!-- Footer -->
  <!-- </div> -->
	
    <!--Include footer files-->
		
    <?php	
		include('assets/Partials/footerfile.php');
?>
    

    

</body></html>