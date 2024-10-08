<?php
    function allsyllabus($conn, $id){
        echo '
        <div id = "table-container" class="container mt-5">
            <table class="table table-striped table-custom pagination-table" 
            style=" 
            ">
                <thead>
                    <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Published Year</th>
                    <th scope="col">Download</th>
                    </tr>
                </thead>
                <tbody>
                ';
                    $sql = "SELECT * FROM syllabus WHERE degree_id = ".$id." ORDER BY id DESC";
                    $res = mysqli_query($conn, $sql);
                    $ser = 1;
                    $html = "";
                    
                    while($row = mysqli_fetch_assoc($res)){
                        echo "<tr>";
                        echo 
                        "<td class='clickable' data-href='syllabus?syllabus=".$row['id']."' style='cursor: pointer'>". $ser."</td>
                        <td class='clickable' data-href='syllabus?syllabus=".$row['id']."' style='cursor: pointer;'>". $row['title']."</td>
                        <td class='clickable' data-href='syllabus?syllabus=".$row['id']."' style='cursor: pointer'>". $row['year']."</td>
                        <td><a href = 'assets/Files/Syllabus/".$row['file']."' target='_blank'><i class='fas fa-download download-icon'></i></a></td>";
                        echo "</tr>";
                        $ser++;
                    }
                    if($ser==1){
                        echo "<tr>";
                        echo "<td colspan='4' style='color: blue'><strong>No Data Found</strong></td>";
                        echo "</tr>";
                    }
                echo '</tbody>
            </table>
        </div>
        
        ';
    }


    function dummyInsert($conn){
        $types = array('NOC', 'Academic');
        $rank = 12;
        
        for($i=1; $i<=50; $i++){
            $sql = "INSERT INTO notices(not_title, rank, not_type) VALUES ('Rank $rank', $rank, '" .$types[$i%2]."')";
            $conn->query($sql);
            $rank++;
        }
    }


?>


