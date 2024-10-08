<?php
    include('assets/Partials/db.php');
    $id = $_GET['deg'];

    if(!is_numeric($id)){
        header("Location: courses?deg=1"); 
        exit;
    }
    
    if($id<1 OR $id>3){
        header("Location: courses?deg=1"); 
        exit;
    }

    $sql = "SELECT * FROM course_semesters WHERE degree_id = " . $id;
    $res = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($res);

    $program = "Bachelor";

    if($id == 2){
        $program = "Masters";
    }

    if($id == 3){
        $program = "Doctoral";
    }
?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
        include('assets/Views/courseview.php');
    ?>
    <link rel="stylesheet" href="assets/css/courses.css">
</head>

<body>

    <?php 
        $navdesign = 1;
        include('assets/Partials/home-menu.php'); 
        navbar_section($conn, $navdesign);
    ?>
    <!-- /Header -->


    <div class="container-fluid" style="height: 100px; border: solid white;"></div>

    <!--Watermark-->
    
    <!--Watermark ends-->

    <!--Dept name-->
    <?php
        deptName($dept_full_name);
    ?>
    <!--End Dept-->


    <?php
        if($num_rows < 1){
            echo '<h2 style="text-align: center; margin-top: 40px;">No Course Information Found For '.$program.' Program</h2>';
        }
        else{
            echo '
                <!-- Title Starts-->
                <div class="container section-header" id="title-container">
                    <div class = "row">
                    <div class = "col-md-12" style = "text-align: center">
                        <h2 >Courses of '.$program.' Program</h2>
                    </div>
                    </div>
                </div>
                <!-- Title Ends -->
            ';

            echo '
                <div class="pagination-container">
                    <ul class="pagination" id="pagination">
                        <!-- Pagination links will be added dynamically from JavaScript -->
                    </ul>
                </div>
            ';
            allCourse($conn, $id);
        }
    ?>


    <div style="height: 30px;"></div>


    <!--Footer Starts-->
	<?php 
		include('assets/Views/footer.php');
		footerSection($conn, $phone, $email, $address);
	?>
	<!--Footer Starts-->



    <!--Include footer files-->
	<?php include('assets/Partials/footerfile.php')?>





    <script>
       function initializeEvents() {
        const eventsContainer = document.getElementById('table-container');
        const paginationContainer = document.getElementById('pagination');
        const eventsPerPage = 2; // Adjusted to paginate after every 2 events
        let currentPage = 1;

        const eventCards = document.querySelectorAll('.course-card');

        // Display pagination links
        function displayPagination() {
            paginationContainer.innerHTML = '';
            const totalPages = Math.ceil(eventCards.length / eventsPerPage);

            // Previous button
            const prevLi = document.createElement('li');
            prevLi.classList.add('page-item');
            const prevA = document.createElement('a');
            prevA.classList.add('page-link');
            prevA.href = '#';
            prevA.textContent = '<<';
            prevA.addEventListener('click', () => {
                if (currentPage > 1) {
                    displayEvents(currentPage - 1);
                }
            });
            prevLi.appendChild(prevA);
            paginationContainer.appendChild(prevLi);

            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                if (i === currentPage) {
                    li.classList.add('active');
                }
                const a = document.createElement('a');
                a.classList.add('page-link');
                a.href = '#';
                a.textContent = i;
                a.addEventListener('click', () => {
                    displayEvents(i);
                });
                li.appendChild(a);
                paginationContainer.appendChild(li);
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.classList.add('page-item');
            const nextA = document.createElement('a');
            nextA.classList.add('page-link');
            nextA.href = '#';
            nextA.textContent = '>>';
            nextA.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    displayEvents(currentPage + 1);
                }
            });
            nextLi.appendChild(nextA);
            paginationContainer.appendChild(nextLi);
        }

        // Display events for the given page number
        function displayEvents(pageNumber) {
            currentPage = pageNumber;
            const startIndex = (currentPage - 1) * eventsPerPage;
            const endIndex = startIndex + eventsPerPage;

            eventCards.forEach((card, index) => {
                if (index >= startIndex && index < endIndex) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            // Center single event if it's the only one on the page
            if (endIndex - startIndex === 1) {
                eventsContainer.style.justifyContent = 'center';
            } else {
                eventsContainer.style.justifyContent = 'normal';
            }

            // Update pagination links
            displayPagination();
        }

        // Initialize pagination and event display
        displayPagination();
        displayEvents(1);
    }

    // Call initializeEvents when the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', initializeEvents);
    </script>
    
</body>

</html>