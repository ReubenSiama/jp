<div class="sidebar" data-color="green" data-background-color="white" data-image="/img/sidebar-1.jpg">
      <div class="logo"><a href="/" class="simple-text logo-normal">
          JP Career Point
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('students') ? 'active' : '' }}">
            <a class="nav-link" href="/students">
              <i class="material-icons">people</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('faculties') ? 'active' : '' }}">
            <a class="nav-link" href="/faculties">
              <i class="material-icons">content_paste</i>
              <p>Faculties</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('study-materials') ? 'active' : '' }}">
            <a class="nav-link" href="/study-materials">
              <i class="material-icons">library_books</i>
              <p>Study Materials</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Host Live Class</p>
            </a>
          </li> -->
          <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
            <a class="nav-link" href="/courses">
              <i class="material-icons">location_ons</i>
              <p>Courses</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/settings" class="nav-link">
              <i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>