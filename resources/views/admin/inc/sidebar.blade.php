  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Locations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('countries.index')}}">
              <i class="bi bi-circle"></i><span>Add Countries</span>
            </a>
          </li>
          <li>
            <a href="{{route('countries.create')}}">
              <i class="bi bi-circle"></i><span>Countries List</span>
            </a>
          </li>
          <li>
            <a href="{{route('states.index')}}">
              <i class="bi bi-circle"></i><span>Add States</span>
            </a>
          </li>
          <li>
            <a href="{{route('districts.index')}}">
              <i class="bi bi-circle"></i><span>Add Districts</span>
            </a>
          </li>
          <li>
            <a href="{{route('cities.index')}}">
              <i class="bi bi-circle"></i><span>Add cities</span>
            </a>
          </li>
          <li>
            <a href="{{route('locationsites.index')}}">
              <i class="bi bi-circle"></i><span>Add Location Sites</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('categories.index')}}">
              <i class="bi bi-circle"></i><span>Add Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('categories.create')}}">
              <i class="bi bi-circle"></i><span>Category List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->





      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Activities & Location</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('add-product')}}">
              <i class="bi bi-circle"></i><span>Activities</span>
            </a>
          </li>
          <li>
            <a href="{{route('products.create')}}">
              <i class="bi bi-circle"></i><span>Activities List</span>
            </a>
          </li>
          <li>
            <a href="{{route('activity_prices.create')}}">
              <i class="bi bi-circle"></i><span>Activities Price List</span>
            </a>
          </li>
          <!-- <li>
            <a href="{{route('images')}}">
              <i class="bi bi-circle"></i><span>Activities Images List</span>
            </a>
          </li> -->
        </ul>
        <!-- Batches -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Batches</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('batches.index')}}">
              <i class="bi bi-circle"></i><span>Add Batch</span>
            </a>
          </li>
          <li>
            <a href="{{route('batches.create')}}">
              <i class="bi bi-circle"></i><span>Batch List</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Batches -->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>calendar</span>
        </a>
      </li> -->
      <!-- End Tables Nav -->

      <!-- End Charts Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Testimonials</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Add Testimonial</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Testimonial List</span>
            </a>
          </li>
       
        </ul>
      </li> -->
      <!-- End Icons Nav -->
    </ul>

  </aside><!-- End Sidebar-->