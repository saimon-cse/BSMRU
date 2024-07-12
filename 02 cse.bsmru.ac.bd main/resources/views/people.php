<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
		include('assets/Partials/headerfile.php');
	?>
    <link rel="stylesheet" href="assets/css/people.css?version=2">
    
</head>

<body>



    <!-- Header -->

    <?php 
		$navdesign = 1;
		include('assets/Partials/home-menu.php'); 
	?>
    <!-- /Header -->


    <div class="container-fluid" style="height: 100px; border: solid white;">   
    </div>

    <!--Dept name-->
    <div class="container-fluid dept-name box-shadow">
        <h2>Department of <?php echo "$dept_full_name"?></h2>
    </div>
    <!--End Dept-->

    <!--Faculty List-->
    <div id="faculty-list"> 
        <div class="container" style="margin-top: 30px;">
            <!-- row -->
            <div class="row">
                <div class="section-header">
                    <h2 class="people-heading">Faculty Members</h2>
                </div>
            </div>
            <!-- /row -->

            <?php
                    $len = sizeof($faculty_names);
                    $html = "";
                    for($i=0; $i<$len; $i++){
                        $fac_display_name = $faculty_names[$i];
                        if(  !($faculty_special_duites[$i]=="")  ){
                            $fac_display_name = "".$faculty_names[$i]. $special_duty_style_prefix_people . $faculty_special_duites[$i] . $special_duty_style_suffix_people;
                        }

                        $card = "<div class=\"card mb-3 m-2\" style=\"max-width: 540px;\">
                                    <div class=\"row g-0\">
                                        <div class=\"col-md-4\">
                                            <a href=\"#\"> <img src=\"$faculty_img_links[$i]\". class=\"img-fluid rounded-start\" alt=\"...\"></a>
                                         </div>
        
                                        <div class=\"col-md-8\">
                                             <div class=\"card-body\">
                                                <h4 class=\"card-title\"><a href=\"facultyprofile?id=".$i."\">$fac_display_name</a></h4>
                                                <p class=\"card-title\">$faculty_designations[$i]</p>
                                                <p class=\"card-title\">Phone: $faculty_phones[$i]</p>
                                                <p class=\"card-title\">Email: $faculty_emails[$i]</p>
                                                <p class=\"card-text\"><small class=\"text-body-secondary\"><a href=\"facultyprofile?id=".$i."\">See details...</a></small></p>
                                            </div>
                                        </div>
        
                                     </div>
                                </div>
                            ";
                        if($i%2==0){
                            $html = $html."<div class=\"row\">".$card;
                        }
                        else{
                            $html = $html.$card."</div>";        
                        }
                    }
                    echo $html;    
                ?>

        </div>
    </div>


    <div style="height: 30px;"></div>


    <!--Footer-->
	<?php include('assets/Partials/footer.php')?>
	<!--Footer ends-->



    <!--Include footer files-->
	<?php include('assets/Partials/footerfile.php')?>
    
</body>

</html>