<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/db.php');
        include('assets/Partials/headerfile.php');
        include('assets/Views/alleventsview.php');
        
    ?>
    <link rel="stylesheet" href="assets/css/allevents.css">
    
</head>

<body>

    <!-- Header -->
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

    

    
    
    <div class="section-header">
        <h2 class="people-heading">News and Events</h2>
    </div>


    


    <?php
        viewAllEvents($conn);
    ?>

    





    <div class="pagination-container">
        <ul class="pagination" id="pagination">
            <!-- Pagination links will be added dynamically from JavaScript -->
        </ul>
    </div>

    



    


    


    <div style="height: 30px;"></div>


    <!--Footer Starts-->
	<?php 
		include('assets/Views/footer.php');
		footerSection($conn, $phone, $email, $address);
	?>
	<!--Footer Starts-->


    

    <!--Include footer files-->
	<?php include('assets/Partials/footerfile.php')?>
    <!-- Custom JS for pagination -->
    


    <script>
       function initializeEvents() {
        const eventsContainer = document.getElementById('events-container');
        const paginationContainer = document.getElementById('pagination');
        const eventsPerPage = 4; // Adjusted to paginate after every 2 events
        let currentPage = 1;

        const eventCards = document.querySelectorAll('.event-card');

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
            prevA.textContent = 'Previous';
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
            nextA.textContent = 'Next';
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
