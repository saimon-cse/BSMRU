<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
    ?>
   <link rel="stylesheet" href="sazidqbank.css">
</head>

<body>
    <!-- Header -->
    <?php
        $navdesign = 1;
        include('assets/Partials/home-menu.php');
    ?>
    <!-- /Header -->

    <div class="container-fluid" style="height: 100px; border: solid;">
        <!-- Dept name -->
    </div>

    <div class="container-fluid dept-name box-shadow">
        <h2 class="text-center">Department of <?php echo "$dept_full_name"?></h2>
    </div>

    <!-- About -->
   

    <div class="container">
    <h1>Question Bank</h1><div style="background-color:black;height:1px;width:100%;"></div>

    <div class="filter-container"style="padding-top:10px;">
    <label for="session" ><b>Select Session:</b></label>
    <select id="session" style="width: 130px;">
        <option value="All" selected>All Sessions</option>
        <option value="21-22">2021-22</option>
        <option value="22-23">2022-23</option>
        <!-- Add more session options as needed -->
    </select>

    <label for="semester" >Select Semester:</label>
    <select id="semester">
        <option value="All" selected>All Semesters</option>
        <option value="1">Semester 1</option>
        <option value="2">Semester 2</option>
        <option value="3">Semester 3</option>
        <option value="4">Semester 4</option>
        <option value="5">Semester 5</option>
        <option value="6">Semester 6</option>
        <option value="7">Semester 7</option>
        <option value="8">Semester 8</option>
        <!-- Add more semester options as needed -->
    </select>
</div>
<div style="background-color:black;height:1px;width:100%;"></div>


<div class="table-wrapper">

<table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Question Name</th>
                          <th scope="col"style="background-color:gray;">Question Link</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_41);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_41[$i]</td>
                                    <td>$course_titles_41[$i]</td>
                                    
                                  </tr>
                                ";
                              }
                            ?>
                        
                      </tbody>
                  
                </table>




</div>

    </div>

    <!--Footer Starts-->
    <div class="foot" style="padding-top: 50px"></div>
    <?php 
        include('assets/Partials/footer.php');
    ?>
    <!--Footer Starts-->

    <!--Include footer files-->
    <?php include('assets/Partials/footerfile.php');?>

    <!-- Bootstrap JS -->
    <script>
    // Sample question data (replace with your actual data)
    const questions = [
        { name: "Computer Fundamental", link: "http://example.com/1", session: "21-22", semester: 1 },
        { name: "Discrete Mathematics", link: "http://example.com/2", session: "21-22", semester: 1 },
        { name: "Computer Fundamental", link: "http://example.com/1", session: "22-23", semester: 1 },
        { name: "Discrete Mathematics", link: "http://example.com/2", session: "22-23", semester: 1 },
        { name: "Physics", link: "http://example.com/3", session: "21-22", semester: 1 },
        { name: "Physics", link: "http://example.com/3", session: "22-23", semester: 1 },
        { name: "Computer Fundamental Lab", link: "http://example.com/4", session: "21-22", semester: 1 },
        { name: "Structure programming", link: "http://example.com/1", session: "21-22", semester: 2 },
        { name: "Digital Logic Design", link: "http://example.com/2", session: "21-22", semester: 2 },
        { name: "Electrical Circuit", link: "http://example.com/1", session: "21-22", semester: 2 },
        { name: "Linear Algebra", link: "http://example.com/2", session: "21-22", semester: 2 },
        { name: "object Oriented Programming", link: "http://example.com/3", session: "21-22", semester: 3 },
        { name: "Data Structure & Algorithms", link: "http://example.com/3", session: "21-22", semester: 3 },
        { name: "Computer Arcitecture", link: "http://example.com/4", session: "21-22", semester: 3 },
        // Add more question objects as needed
    ];

    // Function to populate the table with filtered questions
    function populateTable(session, semester) {
        const filteredQuestions = questions.filter(question => (session === "All" || question.session === session) && (semester === "All" || question.semester == semester));

        const tableBody = document.getElementById('questionData');
        tableBody.innerHTML = '';

        filteredQuestions.forEach(question => {
            const row = tableBody.insertRow();
            const nameCell = row.insertCell(0);
            const linkCell = row.insertCell(1);
            nameCell.textContent = question.name;
            linkCell.innerHTML = `<a href="${question.link}" target="_blank">Link</a>`;
        });
    }

    // Event listener for session select element
    document.getElementById('session').addEventListener('change', function() {
        const session = this.value;
        const semester = document.getElementById('semester').value;
        populateTable(session, semester);
    });

    // Event listener for semester select element
    document.getElementById('semester').addEventListener('change', function() {
        const semester = this.value;
        const session = document.getElementById('session').value;
        populateTable(session, semester);
    });

    // Initial population of the table with all questions
    populateTable("All", "All");
</script>
    </body>
    </html>
