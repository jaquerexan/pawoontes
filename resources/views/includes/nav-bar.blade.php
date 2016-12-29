<ul class="nav navbar-nav">
  <!-- Messages: style can be found in dropdown.less-->
  <?php
  // @include('includes.nav-bar-message')
  ?>
  <!-- Notifications: style can be found in dropdown.less -->
  <?php
  // @include('includes.nav-bar-notification')
  ?>
  <!-- Tasks: style can be found in dropdown.less -->
  <?php
  // @include('includes.nav-bar-task')
  ?>
  <!-- User Account: style can be found in dropdown.less -->
  @if(Auth::check())
    @include('includes.nav-bar-user')
  @endif
  <!-- Control Sidebar Toggle Button -->
  <?php
  // @include('includes.nav-bar-control-sidebar')
  ?>
</ul>
