<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Component</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.component.entry.page')}}">
              <i class="bi bi-circle"></i><span>Entry Component</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.component.all')}}">
              <i class="bi bi-circle"></i><span>Update Component </span>
            </a>
          </li>

        </ul>
      </li><!-- End Notice Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Issue Component</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('issue.component.form')}}">
              <i class="bi bi-circle"></i><span>Issue Component</span>
            </a>
          </li>
          <li>
            <a href="{{route('issued.items.all')}}">
              <i class="bi bi-circle"></i><span>Issued Items</span>
            </a>
          </li>

        </ul>
      </li><!-- End Events Nav -->


<b><br><br><br><br></b>
     <b> <li>
        {{-- <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"> --}}


                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

        {{-- </a> --}}
    </li>
</b>
      {{-- <li class="nav-heading">Profile Settings</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> --}}







    </ul>

  </aside>
