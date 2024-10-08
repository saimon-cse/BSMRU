<?php
    


    function allNotice($conn){
        echo '
        <div id = "table-container" class="container mt-5">
            <table id="jar" class="table table-striped table-custom pagination-table" 
            style=" 
            ">
                <thead>
                    <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Date</th>
                    <th scope="col" style = "text-align: left; padding-left: 10px;">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Download</th>
                    </tr>
                </thead>
                <tbody>
                ';
                    $sql = "SELECT id, not_date, not_title, not_des, not_file, not_type FROM notices ORDER BY rank";
                    $res = mysqli_query($conn, $sql);
                    $ser = 1;
                    while($row = mysqli_fetch_assoc($res)){
                        $date = new DateTime($row['not_date']);
                        $formattedDate = $date->format('d M Y');
                        echo "<tr>";
                        echo "<td class='clickable' data-href='notice?notice=".$row['id']."' style='cursor: pointer'>". $ser."</td>";
                        echo "<td class='clickable' data-href='notice?notice=".$row['id']."' style='cursor: pointer'>". $formattedDate."</td>";
                        echo "<td class='clickable' data-href='notice?notice=".$row['id']."' style='cursor: pointer; text-align: left;'>".$row['not_title']."</td>";
                        echo "<td class='clickable' data-href='notice?notice=".$row['id']."' style='cursor: pointer'>".$row['not_type']."</td>";
                        echo "<td><a href = 'assets/Files/".$row['not_file']."' target='_blank'><i class='fas fa-download download-icon'></i></a></td>";
                        echo "</tr>";
                        $ser++;
                    }
                echo '</tbody>
            </table>
        </div>
        
        <div id = "navbar-container" class = "container" style="width: 100%; justify-content-center">
            <nav aria-label="Page navigation" class = "navbar">
                <ul class="pagination justify-content-center"></ul>
            </nav>
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


