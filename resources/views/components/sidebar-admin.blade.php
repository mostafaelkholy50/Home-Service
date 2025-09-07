<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Users -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.user.index') }}">
            <i class="bi bi-circle"></i><span>All Users</span>
          </a>
        </li>
      </ul>
    </li><!-- End Users Nav -->

    <!-- Providers -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#providers-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-badge"></i><span>Providers</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="providers-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.provider.index') }}">
            <i class="bi bi-circle"></i><span>All Providers</span>
          </a>
        </li>
      </ul>
    </li><!-- End Providers Nav -->

    <!-- Services -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="services-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.service.index') }}">
            <i class="bi bi-circle"></i><span>All Services</span>
          </a>
        </li>
      </ul>
    </li><!-- End Services Nav -->

  </ul>

</aside><!-- End Sidebar-->
