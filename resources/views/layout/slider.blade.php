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

            <!-- dashboard Route-->                 
            <li class="nav-item ">
              <a href="/dashboard" class="nav-link {{ Request::is(Route::currentRouteName() == 'dashboard') ? 'active' : '' }}">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                 الاحصائيات
                </p>
              </a>

            </li>
            
             <!-- employees Route-->  
            <li class="nav-item ">
              <a href="/employees" class="nav-link {{ Request::is(Route::currentRouteName() == 'employees') ? 'active' : '' }}">
                <i class="nav-icon  fa fa-users" aria-hidden="true"></i>
                <p>
                 الموظفين
                </p>
              </a>
            </li>
            
             <!-- companies Route-->  
             <li class="nav-item ">
              <a href="/companies" class="nav-link {{ Request::is(Route::currentRouteName() == 'companies') ? 'active' : '' }}">
                <i class="nav-icon  fa fa-users" aria-hidden="true"></i>
                <p>
                 الشركات
                </p>
              </a>
            </li>   

             <!-- countries Route-->  
             <li class="nav-item ">
              <a href="/countries" class="nav-link {{ Request::is(Route::currentRouteName() == 'countries') ? 'active' : '' }}">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 الدول
                </p>
              </a>
            </li>   
             <!-- religions Route-->  
             <li class="nav-item ">
          
              <a href="/religions" class="nav-link {{ Request::is(Route::currentRouteName() == 'religions') ? 'active' : '' }}">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                  الديانة
                </p>
              </a>
            </li> 

             <!-- nationality Route-->  
             <li class="nav-item ">
          
                <a href="/nationalitys" class="nav-link {{ Request::is(Route::currentRouteName() == 'nationalitys') ? 'active' : '' }}">
                  <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                  <p>
                    الجنسية
                  </p>
                </a>
              </li>     
              
              
             <!-- contact Route-->  
             <li class="nav-item ">
          
                <a href="/contact" class="nav-link {{ Request::is(Route::currentRouteName() == 'contact') ? 'active' : '' }}">
                  <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                  <p>
                    الشكاوي والاقتراحات
                  </p>
                </a>
              </li>    
              
              
             <!-- setting Route-->  
             <li class="nav-item ">
          
                <a href="/setting" class="nav-link {{ Request::is(Route::currentRouteName() == 'setting') ? 'active' : '' }}">
                  <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                  <p>
                    اعدادات التطبيق
                  </p>
                </a>
              </li>                  
              
          <!-- admin Route-->  
          <li class="nav-item ">
          
          <a href="/admins" class="nav-link {{ Request::is(Route::currentRouteName() == 'admins') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            ادارة المسئولين
            </p>
          </a>
        </li> 

                  <!-- admin Route-->  
                  <li class="nav-item ">
          
                      <a href="/ads" class="nav-link {{ Request::is(Route::currentRouteName() == 'ads') ? 'active' : '' }}">
                        <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                        <p>
                        ادارة الاعلانات
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