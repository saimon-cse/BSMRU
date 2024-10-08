<?php
    function allCourse($conn, $degree_id){
        $sql_1 = "SELECT * FROM course_semesters WHERE degree_id = " .$degree_id. " ORDER BY rank";
        $res_1 = mysqli_query($conn, $sql_1);

        echo ' <div id = "table-container" class="container mt-5">';

        $row_tracker = 0;
        while($row_1 = mysqli_fetch_assoc($res_1)){
            $num = 1;
            $row_tracker++;
            
            $title = '<h3 class = "year-semester" style="text-align: center; margin-top: 15px;">'.$row_1['title'].'</h3>';
            if($row_tracker%2==0){
                $title = '<h3 class = "year-semester" style="text-align: center; margin-top: 80px; ">'.$row_1['title'].'</h3>';
            }

            $total_credit = "";
            if($row_1['total_credit']!=0){
                $total_credit = '<h5 style="margin-top: 15px; text-decoration: underline; font-size: 17px;">Total Credit: <b>'.$row_1['total_credit'].'</b></h5>';
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
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Title</th>
                            <th scope="col">Course Credit</th>
                            <th scope="col">Pre Requisite</th>
                            <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';
                        $sql = "SELECT course_code, course_title, credit, pre_requisite, remarks FROM courses WHERE sem_id = " . $row_1['sem_id'];
                        $res = mysqli_query($conn, $sql);
                        $ser = 1;
                        while($row = mysqli_fetch_assoc($res)){
                            echo "<tr>";
                            echo "<td>". $num."</td>";
                            echo "<td>". $row['course_code']."</td>";
                            echo "<td>".$row['course_title']."</td>";
                            echo "<td>".$row['credit']."</td>";
                            echo "<td>".$row['pre_requisite']."</td>";
                            echo "<td>".$row['remarks']."</td>";
                            echo "</tr>";
                            $num++;
                        }
                    echo '</tbody>
                    </table>'.$total_credit.'
                </div>
            ';
            
        }

        echo '</div>';
    }

?>


