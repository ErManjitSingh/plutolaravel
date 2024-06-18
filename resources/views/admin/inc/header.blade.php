  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/profile-img.png')}}" height="50"  >
        <!-- <span class="d-none d-lg-block"> {{ __("You're logged in") }}</span> -->
      </a>

      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        <input type="search" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="{{asset('/assets/img/profile-img.jpg')}}"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"> PTW Holidays Private Limited </span>

            <!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>{{ Auth::user()->name }}</h6>
                <!-- <span>Web Designer</span> -->
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('profile.edit')}}">
                  <i class="bi bi-person"></i>
                  <span> {{ __('Profile') }}</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> -->
              <li>
                <hr class="dropdown-divider">
              </li>

              <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
              <li>
                <hr class="dropdown-divider">
              </li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span> {{ __('Log Out') }}</span>
                  </a>
                </li>
              </form>
            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->