	<!--Bootstrap JS-->

    <!--
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="assets/Bootstrap/bootstrap.min.js"></script>
	<!-- jQuery Plugins -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/933522e130.js" crossorigin="anonymous"></script>

    <?php 
    if($navdesign==0){
        echo 
        "
            <script>
            var nav = document.querySelector('header');
            window.addEventListener('scroll', function () {
                if (window.pageYOffset > 110) {
                    nav.classList.remove('transparent-nav');
                    nav.classList.add('scrolled-nav', 'shadow');
                }
                else {
                    nav.classList.remove('scrolled-nav');
                    nav.classList.add('transparent-nav');
                }
            });
            </script>
        ";
    }
	
    ?>
<!-- pagination -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const table = document.querySelector('.pagination-table tbody');
    const rows = Array.from(table.querySelectorAll('tr'));
    const rowsPerPage = 10;
    const pageCount = Math.ceil(rows.length / rowsPerPage);
    const pagination = document.querySelector('.pagination');

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function createPaginationButton(page) {
        const li = document.createElement('li');
        li.classList.add('page-item');
        li.innerHTML = `<a class="page-link" href="#">${page}</a>`;
        li.addEventListener('click', (e) => {
            e.preventDefault();
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            displayRows(start, end);

            document.querySelectorAll('.pagination .page-item').forEach(button => button.classList.remove('active'));
            li.classList.add('active');
            updatePrevNextButtons();
        });

        return li;
    }

    function createPaginationButtons() {
        // Previous button
        const prev = document.createElement('li');
        prev.classList.add('page-item', 'disabled');
        prev.innerHTML = `<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
        pagination.appendChild(prev);

        for (let i = 1; i <= pageCount; i++) {
            const li = createPaginationButton(i);
            if (i === 1) li.classList.add('active');
            pagination.appendChild(li);
        }

        // Next button
        const next = document.createElement('li');
        next.classList.add('page-item');
        next.innerHTML = `<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
        pagination.appendChild(next);

        // Event listeners for prev and next buttons
        prev.addEventListener('click', (e) => {
            e.preventDefault();
            const currentPage = parseInt(pagination.querySelector('.page-item.active a').textContent);
            if (currentPage > 1) {
                const newPage = currentPage - 1;
                pagination.querySelector(`.page-item:nth-child(${newPage + 1}) a`).click();
            }
        });

        next.addEventListener('click', (e) => {
            e.preventDefault();
            const currentPage = parseInt(pagination.querySelector('.page-item.active a').textContent);
            if (currentPage < pageCount) {
                const newPage = currentPage + 1;
                pagination.querySelector(`.page-item:nth-child(${newPage + 1}) a`).click();
            }
        });
    }

    function updatePrevNextButtons() {
        const prev = pagination.querySelector('.page-item:first-child');
        const next = pagination.querySelector('.page-item:last-child');
        const currentPage = parseInt(pagination.querySelector('.page-item.active a').textContent);

        prev.classList.toggle('disabled', currentPage === 1);
        next.classList.toggle('disabled', currentPage === pageCount);
    }

    createPaginationButtons();
    displayRows(0, rowsPerPage);
    updatePrevNextButtons();
});
</script>



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