<header class="main-header">
  <!-- Logo -->
  <a href="/admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b class="vnenglish">vn</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b class="vnenglish">vn</b> ENGLISH</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(Auth::user()->avatar)
              <img src="/upload/avatar/{{ Auth::user()->avatar }}" class="user-image" alt="">
            @else
              <img src="/assets/dist/img/avatar5.png" class="user-image" alt="User Image">
            @endif
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @if(Auth::user()->avatar)
                <img src="/upload/avatar/{{ Auth::user()->avatar }}" class="img-circle" alt="">
              @else
                <img src="/assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
              @endif
              <p>
                {{ Auth::user()->name }}
                <small>{{ Auth::user()->email }}</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/home" class="btn btn-default btn-flat">Home</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('auth.logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>