<?php

    function viewAllEvents($conn){


        $sql = "SELECT * FROM events ORDER BY rank";
        $res = mysqli_query($conn, $sql);
        $string = "";
        $row_tracker = 0;
        while($row = mysqli_fetch_assoc($res)){
            $row_tracker++;
            $card_class = "event-card right-margin";
            if($row_tracker%2==0){
                $card_class = "event-card left-margin";
            }
            $date = new DateTime($row['date']);
            $formattedDate = " " .$date->format('d M Y');
            $string = $string . '

            <div class="'.$card_class.'">
                <div class="img-container">
                    <img src="assets/img/Events/'.$row['file'].'" alt="Event Image">
                    <div class="overlay">
                        <div class="overlay-content">
                            <h5><a href="event?event='.$row['id'].'">'.$row['title'].'"</a></h5>
                        </div>
                    </div>
                </div>
                <div class="event-info">
                    <h5 class="event-title" ><a href="event?event='.$row['id'].'">'.$row['title'].'</a></h5>
                    <p class="event-date"><i class="far fa-calendar-alt"></i>'.$formattedDate.'</p>
                    <a class="view-event-link" href="event?event='.$row['id'].'">View Event</a>
                </div>
            </div>
            
            ';
        }


        


        echo '
            <div class="container">
                <div class="events-container" id="events-container">
                    
                    '.$string.'

                </div>
            </div>


        ';
    }
?>