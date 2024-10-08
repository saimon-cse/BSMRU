<?php
    function departmentName($dept_full_name){
        echo '
        <div class="center-div">
            <img src="assets/img/bsmru_logo.png" alt="Image"> <!-- Replace with your image -->
            <p class="pacifico-font">Department of '. $dept_full_name.'</p>
        </div>
        ';
    }

    function carouselSection($conn, $dept_full_name, $special_event){
        $sql = "SELECT image FROM carousels ORDER BY rank";
        $result = $conn->query($sql);
        $images = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $images[] = "assets/img/".$row["image"];
            }
        }
        $active = "active";
        foreach ($images as $image) {
            echo '<div class="carousel-item ' . $active . ' c-item">';
            echo '<img src="' . $image . '" class="d-block w-100 c-img" alt="...">';
            echo '</div>';
            $active = "";
        }

        $msg = $special_event;
        if($msg == ""){
            $msg = 'Welcome to the department of '.$dept_full_name;
        }
        echo '
            <div class="marquee">
                <span>'.$msg.'</span>
            </div>
        ';
    }

    function aboutSection($conn){

        try{
            $sql = "SELECT * FROM dept_attributes";
            $res = mysqli_query($conn, $sql);

            $dept_full_name =  "";
            $about = "";

            while($rows = mysqli_fetch_assoc($res)){
                $dept_full_name = $rows['dept_name'];
                $about = $rows['about'];
            }

            $about = processText($about);

            echo "
            <div class=\"col-md-7 swap-border-shadow inner-gap \" id=\"about-div\" style=\"position: relative;\">
                <div class = 'header-content'>    
                    <div class=\"section-header underline\" style='margin-bottom: -30px;'>
                        <h2 class ='about-title'>About Department of " . $dept_full_name . "</h2>
                    </div>
                    <hr>
                    <div id = 'paragragh-button' class = 'watermark-div'>
                        <img src='assets/img/bsmru_logo.png' alt='Watermark Logo' class='watermark'>
                        <p id=\"about-description\">" . $about . "</p>
                    
                        <div class='right-align'><a href='about' class='btn btn-primary read-more'>Read More...</a></div>
                    </div>
                </div>
            </div>
            ";    
        }catch(Exception $e){
            echo "Loading...";
        }
    }



    function noticeSection($conn, $notice_count){
        echo '
            <table id="jar" class="table table-custom" 
            style=" 
            ">
                <thead>
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col" style = "text-align: left; padding-left: 10px;">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                ';
                    $sql = "SELECT id, not_date, not_title, not_type, not_file FROM notices ORDER BY rank";
                    $count = $notice_count;
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res) < $count){
                        $count = mysqli_num_rows($res);
                    }
                    $ser = 1;
                    while($row = mysqli_fetch_assoc($res)){
                        $date = new DateTime($row['not_date']);
                        $formattedDate = $date->format('d M Y');
                        echo "<tr>";
                        echo "<td class='table-hover-class clickable' data-href='notice?notice=".$row['id']."'>". $formattedDate."</td>";
                        echo "<td class='table-hover-class clickable' data-href='notice?notice=".$row['id']."'>".$row['not_title']."</td>";
                        echo "<td class='table-hover-class clickable' data-href='notice?notice=".$row['id']."'>".$row['not_type']."</td>";
                        echo "<td><a href = 'assets/Files/".$row['not_file']."' target='_blank'><i class='fas fa-download download-icon'></i></a></td>";
                        echo "</tr>";
                        if($ser==$count){
                            break;
                        }
                        $ser++;
                    }
                echo '</tbody>
            </table>
        ';
    }



    function eventSection($conn){
        $count = 4;
        $num_of_rows = 0;
        $sql = "SELECT id, date, title, file FROM events ORDER BY rank";

        $res = mysqli_query($conn, $sql);
        if($res == true){
            $num_of_rows = mysqli_num_rows($res);
            if($num_of_rows < $count){
                $count = $num_of_rows;
            }

            $i = 0;
            while($row = mysqli_fetch_assoc($res)){
                if($i == $count){
                    break;
                }
                $i = $i + 1;
                $event_date = $row['date'];
                $event_title = $row['title'];
                $event_img_link = "assets/img/Events/" . $row['file'];

                $date = new DateTime($event_date);
                $formattedDate = $date->format('d M Y');
                echo 
                "
                <div class=\"col-md-3 col-sm-6 col-xs-6\">
                    <div class=\"course\">
                        <a href=\"".$event_img_link."\" target=\"_blank\" class=\"course-img\">
                            <img src=\"". $event_img_link ."\" alt=\"\">
                            <i class=\"course-link-icon fa fa-link\"></i>
                        </a>
                        <div class=\"course-details\" style='display: flex;'>
                            <i class='fas fa-calendar icon-date'></i>
                            <span class=\"course-category\">". $formattedDate ."</span>
                        </div>
                        <div style='display: flex;'>
                             <i class='fas fa-bookmark icon-title'></i><a class=\"course-title\"' href='event?event=".$row['id']."' style = 'display: inline-block;'>". $event_title ."</a>
                        </div>
                    </div>
                </div>
                
                ";

            }
            
        }
    }
?>