  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ '\uploads\profile_img\\' . Auth::user()->prof_pic }}" style="width:30px; height:30px;" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('profile') }}" class="d-block">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Admin Sidebar Menu -->
           @if (Auth::user()->role == 'Admin')
              <li class="nav-item">
              <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') ? active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') ? active @endif">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Admin
                  </p>
                </a>
              </li>

              <li class="nav-item @if(Request::segment(2) == 'managementStaff' OR Request::segment(2) == 'lecturers' OR Request::segment(2) == 'students') ? menu-open @endif">
                <a href="" class="nav-link @if(Request::segment(2) == 'managementStaff' OR Request::segment(2) == 'lecturers' OR Request::segment(2) == 'students') ? active @endif">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">


                  <li class="nav-item">
                    <a href="{{ url('admin/managementStaff/list') }}" class="nav-link @if(Request::segment(2) == 'managementStaff') ? active @endif">
                      <i class="nav-icon fas"></i>
                      <i class="nav-icon fas fa-user-tie"></i>
                      <p>
                        Management Staff
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/lecturers/list') }}" class="nav-link @if(Request::segment(2) == 'lecturers') ? active @endif">
                      <i class="nav-icon fas"></i>
                      <i class="nav-icon fas fa-user-tie"></i>
                      <p>
                        Lecturers
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/students/list') }}" class="nav-link @if(Request::segment(2) == 'students') ? active @endif">
                      <i class="nav-icon fas"></i>
                      <i class="nav-icon fas fa-graduation-cap"></i>
                      <p>
                        Students
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ url('profile') }}" class="nav-link @if(Request::segment(1) == 'profile') ? active @endif">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    Profile
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-down"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
          
          <!-- Staff Sidebar Menu -->
          @elseif (Auth::user()->role == 'Staff')
          <li class="nav-item">
              <a href="{{ url('managementStaff/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') ? active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item @if(Request::segment(2) == 'managementStaff' OR Request::segment(2) == 'lecturers' OR Request::segment(2) == 'students') ? menu-open @endif">
                <a href="" class="nav-link @if(Request::segment(2) == 'managementStaff' OR Request::segment(2) == 'lecturers' OR Request::segment(2) == 'students') ? active @endif">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{ url('managementStaff/lecturers/list') }}" class="nav-link @if(Request::segment(2) == 'lecturers') ? active @endif">
                      <i class="nav-icon fas"></i>
                      <i class="nav-icon fas fa-user-tie"></i>
                      <p>
                        Lecturers
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('managementStaff/students/list') }}" class="nav-link @if(Request::segment(2) == 'students') ? active @endif">
                      <i class="nav-icon fas"></i>
                      <i class="nav-icon fas fa-graduation-cap"></i>
                      <p>
                        Students
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ url('profile') }}" class="nav-link @if(Request::segment(1) == 'profile') ? active @endif">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    Profile
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-down"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>

          @endif
          

          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>