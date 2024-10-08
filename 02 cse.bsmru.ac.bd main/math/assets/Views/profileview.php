<?php    
    function checkId($conn, $id){
        $sql = "SELECT * FROM users WHERE id = " . $id;
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count < 1){
            header("Location: people"); 
            exit; 
        }
    }

    function peopleImageBio($conn, $id, $type){

        $dept_nick_name = "";
        $special_duty_style_prefix_people = "<p style=\"color: rgba(128,0,0,1); margin-top: -10px; margin-bottom: 7px; font-size: 1em;\" class=\"card-title special-designation\"><strong>";
        $special_duty_style_suffix_people = "</strong></p>";

        $sql1 = "SELECT photo, name, special_desig, designation, display_email, phone FROM users where id = ". $id;
        $res1 = mysqli_query($conn, $sql1);

        $sql2 = "SELECT dept_short_name FROM dept_attributes";
        $res2 = mysqli_query($conn, $sql2);

        while($row = mysqli_fetch_assoc($res2)){
            $dept_nick_name = $row['dept_short_name'];
        }

        while($row = mysqli_fetch_assoc($res1)){
            $name = $row['name'];
            $special_duty= $row['special_desig'];
            $designation = $row['designation'];
            $phone = $row['phone'];
            $email = $row['display_email'];
            $img_link = $row['photo'];

            $img_link = "assets/img/peoples/" . $img_link;

            if($phone == null){
                $phone = "N/A";
            }

            if($email == null){
                $email = "N/A";
            }

            if(  !($special_duty==null)  ){
                $special_duty = $special_duty_style_prefix_people . $special_duty . $special_duty_style_suffix_people;
            }
            else{
                $special_duty = "";
            }
        }
        echo '
        <a href = "' . $img_link. '" target="_blank"><img src="'. $img_link . '" alt="Profile Image" class="profile-image"></a>
        <div class="profile-info">
          <h3 id="faculty-name">' . $name . '</h3>' . $special_duty .
          '<p class = "designation-p" style="margin-top: -10px;"><strong>' . $designation . '</strong></p>' . 
          '<p class = "dept-p" style="margin-top: -5px;"><strong> Dept. of ' . $dept_nick_name . '</strong></p>'.
          '<p class="phone-email-p">Phone: <a href="callto:' .$phone. '">' . $phone . '</a></p>
           <p class="phone-email-p">Email: <a href="mailto:' . $email . '">'.$email. '</a></p>
          <!-- Add more information as needed -->
        </div>
        ';
    }

    function findUserId($conn, $id){
        $uid = "";
        $sql = "SELECT user_id FROM users WHERE id = " . $id;
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            $uid = $row['user_id'];
        }
        return $uid;
    }

    function rowCount($conn, $tablename, $uid, $sqlextension){
        $count = 0;
        $sql = "SELECT COUNT(*) as res FROM " . $tablename . " WHERE user = '" . $uid . "'";
        if(!($sqlextension=="")){
            $sql = $sql . ' ' . $sqlextension;
        }
        
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            $count = $row['res'];
        }
        //echo '<p>' . $sql . ' Count: ' . $count . '</p>';
        return $count;
    }

    function researchInterestCount($conn, $uid){
        $flag = 1;
        $sql = "SELECT researchint FROM users where user_id = '". $uid . "'";
        $res= mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($res)){
            $resint = $row['researchint'];
            if($resint==null){
                $flag = 0;
                break;
            }
            $resint = trim($resint);
            if($resint == ""){
                $flag = 0;
                break;
            }
        }
        //echo '<p>' . $sql . ' Count: ' . $flag . '</p>';
        return $flag;
    }

    function navigationTab($conn, $educationsize, $experiencesize,  $awardsize, $researchsize, $publicationsize){
        $active = 0;
        if($educationsize != 0){
            if($active == 0){
                echo "
                <li class=\"nav-item\"><a class=\"nav-link active\" id=\"home-tab\" href=\"#faculty-academic-experience\">Education</a></li>
                ";
                $active = 1;
            }else{
                echo "
                <li class=\"nav-item\"><a class=\"nav-link\" id=\"home-tab\" href=\"#faculty-academic-experience\">Education</a></li>
                ";
            }
        }
        if($experiencesize != 0){
            if($active == 0){
                echo "
                <li class=\"nav-item\"><a class=\"nav-link active\" id=\"profile-tab\" href=\"#faculty-experience\">Experiences</a></li>
                ";
                $active = 2;
            }else{
                echo "
                <li class=\"nav-item\"><a class=\"nav-link\" id=\"profile-tab\" href=\"#faculty-experience\">Experiences</a></li>
                ";
            }
        }

        if($awardsize != 0){
            if($active == 0){
                echo '
                    <li class="nav-item"><a class="nav-link active" id="profile-tab" href="#faculty-awards">Awards</a></li>
                ';
                $active = 3;
            }else{
                echo '
                    <li class="nav-item"><a class="nav-link" id="profile-tab" href="#faculty-awards">Awards</a></li>
                ';
            }
        }

        if($researchsize != 0){
            if($active == 0){
                echo '
                <li class="nav-item"><a class="nav-link active" id="contact-tab" href="#faculty-research-interest">Research</a></li>
                ';
                $active = 4;
            }else{
                echo '
                <li class="nav-item"><a class="nav-link" id="contact-tab" href="#faculty-research-interest">Research</a></li>
                ';
            }
        }

        if($publicationsize != 0){
            if($active == 0){
                echo '
                <li class="nav-item"><a class="nav-link active" href="#faculty-publication">Publications</a></li>
                ';
                $active = 5;
            }else{
                echo '
                <li class="nav-item"><a class="nav-link" href="#faculty-publication">Publications</a></li>
                ';
            }
        }

        return $active;
    }


    function academicExperience($conn, $uid, $educationsize){
        if($educationsize == 0){
            return;
        }
        echo "
            <div id=\"faculty-academic-experience\" class=\"faculty-attributes\" style=\"scroll-margin-top: 110px; box-shadow: none;\">
            <div style=\"border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0%; \"><h3 style=\"margin-left:8px;\">Education</h3></div>
        ";

        $sql = "SELECT * FROM educations WHERE user = " . $uid . " ORDER BY rank";
        $res = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($res))
        {
            echo "<div id = 'education-div'>";
            echo "<h4 style='padding-left: 10px; padding-top: 10px;'>".$row['degree']."</h4>";
            echo "<p style='padding-left: 10px'>".$row['institution']."</p>";
            echo "<p style='padding-left: 10px'>"."Passing year: ".$row['passYear']."</p>";
            echo "</div>";
        }
        echo "</div>";
    }

    function experience($conn, $uid, $generalexperiencesize, $professionaexperiencesize, $active){
        if($generalexperiencesize + $professionaexperiencesize == 0){
            return;
        }
        if($active == 2){
            echo "<div id=\"faculty-experience\" class=\"faculty-attributes\" style=\"margin-top: 35px; scroll-margin-top: 110px; box-shadow: none;\">";
        }

        else{
            echo "<div id=\"faculty-experience\" class=\"faculty-attributes\" style=\"margin-top: 70px; scroll-margin-top: 110px; box-shadow: none;\">";
        }

        echo "<div style=\"border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0%\"><h3 style=\"margin-left: 8px;\">Experiences</h3></div>";

        if($generalexperiencesize != 0){
              echo '
                <table class="table table-striped table-custom">
                    <thead>
                        <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Title</th>
                        <th scope="col">Organization</th>
                        <th scope="col">From Date</th>
                        <th scope="col">To Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                $sql = "SELECT * FROM experiences WHERE user = " . $uid . " ORDER BY rank";
                $res = mysqli_query($conn, $sql);
                $num = 1;
                while($row = mysqli_fetch_assoc($res))
                {
                    echo '<tr>';
                    echo '<td>'. $num .'</td>';
                    echo '<td>'. strip_tags($row['title']).'</td>';
                    echo '<td>'.strip_tags($row['organization']).'</td>';
                    echo '<td>'.strip_tags($row['from_date'])."</td>";
                    echo '<td>'.strip_tags($row['to_date'])."</td>";
                    echo '</tr>';
                    $num++;
                }
                echo '
                    </tbody>
                </table>
              ';
            
        }
        
        if($professionaexperiencesize != 0){
            echo '<div style="padding-left: 10px; padding-right: 10px; box-shadow: none!important;">';
            if($generalexperiencesize!=0){
                echo '<h2 class="section-header" style = "margin-top: 60px !important;">Other Experiences</h2>';
            }
            
            echo '<div class="publication-list">';

            $sql = "SELECT * FROM other_experiences WHERE user = " . $uid . " ORDER BY rank";
            $res = mysqli_query($conn, $sql);
            
            $num = 1;
            while($row = mysqli_fetch_assoc($res))
            {
                if($num==1){
                    echo '<div class="publication-item odd" style = "margin-top: -10px !important;">
                            <p>[' . $num. '] ' . processText2($row['experience']). '</p>
                        </div>';
                }
                else if($num%2==1){
                    echo '<div class="publication-item odd" style = "margin-top: 10px !important;">
                            <p>[' . $num. '] ' . processText2($row['experience']). '</p>
                        </div>';
                }
                else{
                    echo '<div class="publication-item even" style = "margin-top: 10px !important;">
                            <p>[' . $num. '] ' . processText2($row['experience']). '</p>
                        </div>';
                }  
                $num++;                               
            }
            echo '</div></div>';
            
            
        }
        echo "</div>";
    }

    function award($conn, $uid, $awardsize,  $active){
        if($awardsize == 0){
            return;
        }
        if($active == 3){
            echo '<div id="faculty-awards" class="faculty-attributes" style="margin-top: 35px; scroll-margin-top: 110px; box-shadow: none;">';
        }
        else{
            echo '<div id="faculty-awards" class="faculty-attributes" style="margin-top: 70px; scroll-margin-top: 110px; box-shadow: none;">';
        }
        
        echo '<div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0% "><h3 style="margin-left:8px;">Awards</h3></div>';
        
        echo '
            <table class="table table-striped table-custom">
                <thead>
                    <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Year</th>
                    <th scope="col">Country</th>
                    <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>';
                
        $sql = "SELECT * FROM awards WHERE user = " . $uid . " ORDER BY rank";
        $res = mysqli_query($conn, $sql);
        $num = 1;
        while($row = mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td>". $num."</td>";
            echo "<td>". $row['title']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td>".$row['country']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "</tr>";
            $num++;
        }
        echo ' </tbody>
        </table>                               
        </div>';
    }


    function research($conn, $uid, $researchinterestsize, $researchprofilesize, $active){
        if($researchinterestsize + $researchprofilesize == 0){
            return;
        }
        if($active == 4){
            echo '<div id="faculty-research-interest" style="margin-top: 35px; scroll-margin-top: 110px; box-shadow: none;">';
        }

        else{
            echo '<div id="faculty-research-interest" style="margin-top: 70px; scroll-margin-top: 110px; box-shadow: none;">';
        }

        echo '<div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0%; padding-left: 5px;"><h3 style="margin-left: 8px; color: #131311;">Research</h3></div>';

        if($researchinterestsize != 0){
            echo '<div class = "research-profile">';
            echo '<h2 class="research-heading" style = "margin-top: 20px !important;">Research Interests</h2>';
            $sql = 'SELECT researchInt FROM users WHERE user_id = ' . $uid;
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
                echo '<div class="research-interests">'. processText2($row['researchInt']) . '</div>';
            }
            echo '</div>';
        }

        
        if($researchprofilesize!=0){
            if($researchinterestsize!=0){
                echo '<div style="padding-left: 10px; padding-right: 10px">';
                echo '<h2 class="section-header" style = "margin-top: 35px !important;">Research Profiles</h2>';
            }
            else{
                echo '<h2 class="section-header" style = "margin-top: 20px !important;">Research Profiles</h2>';
            }
            echo '<div class="publication-list faculty-attributes" style="padding-left: 5px !important; padding-right: 5px !important">';
            $sql = "SELECT * FROM research_profiles WHERE user = " . $uid . " ORDER BY rank";
            $res = mysqli_query($conn, $sql);
            
            $num = 1;
            while($row = mysqli_fetch_assoc($res))
            {
                if($num==1){
                    echo '<div class="publication-item odd" style = "margin-top: 10px !important;">
                            <p>[' . $num. '] ' . processText2($row['title']). '</p>
                        </div>';
                }
                else if($num%2==1){
                    echo '<div class="publication-item odd" style = "margin-top: 10px !important;">
                            <p>[' . $num. '] ' . processText2($row['title']). '</p>
                        </div>';
                }
                else{
                    echo '<div class="publication-item even" style = "margin-top: 10px !important;">
                            <p>[' . $num. '] ' . processText2($row['title']). '</p>
                        </div>';
                }  
                $num++;                               
            }
            echo '</div>';
            if($researchinterestsize!=0){
                echo '</div>';
            }
        }
        echo '</div>';
    }


    function publication($conn, $uid, $publicationsize, $active){
        if($publicationsize == 0){
            return;
        }
        if($active == 5){
            echo '<div id="faculty-publication" style="margin-top: -30px; scroll-margin-top: 110px; box-shadow: none;">';
        }
        else{
            echo '<div id="faculty-publication" style="margin-top: 70px; scroll-margin-top: 110px; box-shadow: none;">';
        }
        echo '<div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0%; padding-left: 5px; padding-bottom: 0px;"><h3 style="margin-left: 8px; color: #131311;">Publications</h3></div>';
        $sql = "SELECT title FROM types WHERE category = 'publication' ORDER BY rank";
        $res = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($res)){
            publicationCommon($conn, $uid, $row['title']);
        }
        echo '</div>';
    }

    function publicationCommon($conn, $uid, $type){
        $sql = "SELECT * FROM publications WHERE user = '" . $uid . "' AND type = '" . $type . "' ORDER BY rank";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count == 0){
            return;
        }

        echo '<div style="padding-left: 0px; padding-right: 0px">';
        echo '<h2 class="section-header" style = "margin-top: 25px !important; text-align: left !important;">' . $type . '</h2>';
        echo '<div class="publication-list faculty-attributes" style="padding-left: 5px !important; padding-right: 5px !important">';
        
        echo '<div style="padding-bottom: 0px; margin-bottom: 50px;">';
        $num = 1;
        while($row = mysqli_fetch_assoc($res))
        {
            if($num==1){
                echo '<div class="publication-item odd" style = "margin-top: 12px !important; margin-left: -3px !important; ">
                        <p>[' . $num. '] ' . processText2($row['description']). '</p>
                    </div>';
            }
            else if($num%2==1){
                echo '<div class="publication-item odd" style = "margin-top: 10px !important; margin-left: -3px !important;">
                        <p>[' . $num. '] ' . processText2($row['description']). '</p>
                    </div>';
            }
            else{
                echo '<div class="publication-item even" style = "margin-top: 10px !important; margin-left: -3px !important;">
                        <p>[' . $num. '] ' . processText2($row['description']). '</p>
                    </div>';
            }  
            $num++;                               
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
        

?>