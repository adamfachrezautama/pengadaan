<aside class="shadow app-sidebar bg-body-secondary" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('AdminLTE/dist/assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="shadow opacity-75 brand-image"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >

             <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('departments.index')}}" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Department</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Category</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{ route('items.index')}}" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Item</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="./generate/theme.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Submission</p>
                </a>
              </li>


            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
