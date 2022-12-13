<a href="" class="brand-link">
      <span class="brand-text font-weight-light"> Registrasi Klinik Hewan</span>
    </a>
    

<!-- Sidebar -->

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Laras Setyawidi</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('owner-list')}}" class="nav-link">
            <i class="nav-icon fas fa-hospital-user"></i> Owner</a>
          </li>

          <li class="nav-item">
            <a href="{{route('clinic-list')}}" class="nav-link">
            <i class="nav-icon fas fa-hospital-alt"></i> Clinic</a>
          </li>

          <li class="nav-item">
            <a href="{{route('visit')}}" class="nav-link">
            <i class="nav-icon fas fa-notes-medical"></i> Visit</a>
          </li>

          <li class="nav-item">
            <a href="{{route('signout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->