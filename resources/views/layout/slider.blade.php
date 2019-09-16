  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset(config('dashboard.logo'))}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('dashboard.nameApp')}}</span>
    </a>

<!-- Sidebar -->
    <div class="sidebar">
      <div>
      @component('components.info')@endcomponent
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="#" class="nav-link {{ Request::is(Route::currentRouteName() == 'dashboard') ? 'active' : '' }}">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                 الاحصائيات
                </p>
              </a>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>