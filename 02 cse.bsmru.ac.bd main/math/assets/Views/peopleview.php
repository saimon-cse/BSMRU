<?php
    function peopleSection($conn, $type){
        $sql = "SELECT id, name, designation, special_desig, phone, display_email, photo FROM users WHERE role = 'admin' and status = 'active' and type='". $type . "' ORDER BY rank";
        $res = mysqli_query($conn, $sql);

        $html = "";
        $special_duty_style_prefix_people = "<p style=\"color: rgba(128,0,0,1); margin-top: 3px; margin-bottom: -3px; font-size: 1em;\" class=\"card-title special-designation\"><strong>";
        $special_duty_style_suffix_people = "</strong></p>";
        $i = 0;

        while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
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

            $card = 
            "<div class=\"card mb-3 m-2 faculty-card\" style=\"max-width: 540px;\">
                <div class=\"row g-0\">
                    <div class=\"col-md-4\">
                        <a href=\"$img_link\" target=\"_blank\"> <img src=\"$img_link\". class=\"img-fluid rounded-start faculty-img\" alt=\"...\"></a>
                    </div>

                    <div class=\"col-md-8\">
                        <div class=\"card-body\">
                            <h4 class=\"card-title\" style=\"color: #0d1370\"><a href=\"profile?people=".$id."\">$name</a></h4>". $special_duty ."
                            <p class=\"card-title\" style=\"color: #34495e\"><strong>$designation</strong></p>
                            <p class=\"card-title\">Phone: $phone</p>
                            <p class=\"card-title\" style=\" margin-bottom: 3px;\">Email: $email</p>
                            <p class=\"card-text\"><small class=\"text-body-secondary\"><a href=\"profile?people=".$id."\">View Profile...</a></small></p>
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

            $i = $i + 1;
        }
        echo $html;      
    }
?>