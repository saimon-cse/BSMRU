<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @if ($profileData->controller_role != 'Teacher')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Notice</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.addnotice') }}">
                            <i class="bi bi-circle"></i><span>Add Notice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.updatenotice') }}">
                            <i class="bi bi-circle"></i><span>Update Notice</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Notice Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-calendar-date"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.addevent') }}">
                            <i class="bi bi-circle"></i><span>Add Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.allEvents') }}">
                            <i class="bi bi-circle"></i><span>Update Events</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Events Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Academic</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>


                {{-- <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>Update Courses</span>
                            </a>
                            </li>
                            <li>
                                <a href="tables-data.html">
                                    <i class="bi bi-circle"></i><span>Add Syllebus</span>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="tables-data.html">
                                            <i class="bi bi-circle"></i><span>Update Syllebus</span>
                                            </a>
                                            </li> --}}
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                    <li>
                        <a href="{{ route('admin.questionBank.show') }}">
                            <i class="bi bi-circle"></i><span>Add Question Papers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.allQuestion') }}">
                            <i class="bi bi-circle"></i><span>Update Question Papers</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Academic Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav-carousel" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-image"></i><span>Carousel Images</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav-carousel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.carousel-img.add') }}">
                            <i class="bi bi-circle"></i><span>Add Carousel Image</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.carousel-img') }}">
                            <i class="bi bi-circle"></i><span>Update Carousel Images</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Notice Nav -->


            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('images.form') }}">
                    <i class="bi bi-card-image"></i>
                    <span>Carousel Images</span>
                </a>
            </li> --}}
        @endif
        <br>
        <!-- End Charts Nav -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li>-->
        <!-- End Icons Nav -->
        @if ($profileData->controller_role != 'Staff' || $profileData->controller_role == 'Tearcher')
            <li class="nav-heading">Profile Settings</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
                    <i class="ri-account-circle-line"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('side.publication') }}">
                    <i class="ri-file-list-3-line"></i>
                    <span>Publications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('ShowAllEducation') }}">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Education</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('ShowAllExperience') }}">
                    <i class="bi bi-briefcase"></i>
                    <span>Experience</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Others</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    {{-- <li>
                        <a href="{{ route('ShowAllExperience') }}">
                            <i class="bi bi-circle"></i><span>Experiences</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('ShowAllAward') }}">
                            <i class="bi bi-circle"></i><span>Awards</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('AllResearchProfile') }}">
                            <i class="bi bi-circle"></i><span>Research Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.researchInt') }}">
                            <i class="bi bi-circle"></i><span>Research Interest</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if ($profileData->controller_role == 'Admin')
            <br>
            <li class="nav-heading">Administration</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.ControlAllUser') }}">
                    <i class="ri-admin-line"></i>
                    <span>Administration</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('DeptInfo') }}">
                    <i class="ri-coin-line"></i>
                    <span>Dept Attributes</span>
                </a>
            </li>
        @endif


        {{--      <li class="nav-item">
        <a href="{{ route('user.logs') }}" class="btn btn-primary" target="_blank">View User Logs</a>

            <i class="bi bi-card-image"></i>
          <span>Carousel Images</span>
        </a>
      </li> --}}

        <!-- End Profile Page Nav -->
        <!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li> -->
        <!-- End F.A.Q Page Nav -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> -->
        <!-- End Contact Page Nav -->
        <!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li> -->
        <!-- End Register Page Nav -->
        <!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li> -->
        <!-- End Login Page Nav -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> -->
        <!-- End Error 404 Page Nav -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li> -->
        <!-- End Blank Page Nav -->

    </ul>

</aside>
