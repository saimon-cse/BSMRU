<?php
    function allQuestion($conn, $degree_id){
        $years = array('First Year', 'Second Year', 'Third Year', 'Fourth Year');
        $semesters = array('Semester-I', 'Semester-II');

        echo ' <div id = "table-container" class="container mt-5">';

        $row_tracker = 0;
        for($i=0; $i<count($years); $i++){
            for($j=0; $j<count($semesters); $j++){
                $num = 1;
                $row_tracker++;
                
                $title = '<h3 class = "year-semester" style="text-align: center; margin-top: 15px;">'.$years[$i].' '.$semesters[$j].'</h3>';
                if($row_tracker%2==0){
                    $title = '<h3 class = "year-semester" style="text-align: center; margin-top: 80px; ">'.$years[$i].' '.$semesters[$j].'</h3>';
                }

                echo '
                    <div class = "course-card">'.
                        $title . '
                        <table id="course_table" class="table table-striped table-custom pagination-table" 
                        style=" 
                        ">
                            <thead>
                                <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Session</th>
                                <th scope="col">Exam Year</th>
                                <th scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                        ';
                            $sql = "SELECT id, title, type, session, exam_year, file FROM question_banks WHERE year = '" . $years[$i] . "' AND semester = '" . $semesters[$j] . "' AND degree_id = " . $degree_id . " ORDER BY type, rank";
                            
                            $res = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($res)==0){
                                echo "<tr>";
                                echo "<td colspan='6' style='color: blue'><strong>No Data Found</strong></td>";
                                echo "</tr>";
                            }
                            else{
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<tr>";
                                    echo "<td class='clickable' data-href='n?questionno=".$row['id']."'>". $num."</td>";
                                    echo "<td class='clickable' data-href='question?questionno=".$row['id']."'>". $row['title']."</td>";
                                    echo "<td class='clickable' data-href='question?questionno=".$row['id']."'>".$row['type']."</td>";
                                    echo "<td class='clickable' data-href='question?questionno=".$row['id']."'>".$row['session']."</td>";
                                    echo "<td class='clickable' data-href='question?questionno=".$row['id']."'>".$row['exam_year']."</td>";
                                    echo "<td><a href = 'assets/Files/questions/".$row['file']."' target='_blank'><i class='fas fa-download download-icon'></i></a></td>";
                                    echo "</tr>";
                                    $num++;
                                }
                            }
                            
                        echo '</tbody>
                        </table>
                    </div>
                ';
            }
            
        }

        echo '</div>';
    }

?>


<script>
    function makeRowsClickable() {
        const rows = document.querySelectorAll("td.clickable");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                const href = row.getAttribute("data-href");
                if (href) {
                    window.location.href = href;
                }
            });
        });
    }
    document.addEventListener("DOMContentLoaded", makeRowsClickable);
</script>