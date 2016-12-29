<ul class="dropdown-menu">
  <!-- User image -->
  <li class="user-header">
    <!--img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"-->
    <p>
      <small>Join since</small>
    </p>
  </li>
  <!-- Menu Body -->
  <!--li class="user-body">
    <div class="col-xs-4 text-center">
      <a href="#">Followers</a>
    </div>
    <div class="col-xs-4 text-center">
      <a href="#">Sales</a>
    </div>
    <div class="col-xs-4 text-center">
      <a href="#">Friends</a>
    </div>
  </li-->
  <!-- Menu Footer-->
  <li class="user-footer">
    <div class="pull-left">
      <a href="{{ URL('user/'.Auth::user()->id.'/edit') }}"" class="btn btn-default btn-flat">Profile</a>
    </div>
    <div class="pull-right">
      <a href="{{ URL('auth/logout') }}" class="btn btn-default btn-flat">Logout</a>
    </div>
  </li>
</ul>
