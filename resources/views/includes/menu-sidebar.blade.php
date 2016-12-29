<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>

  @if(!Auth::check())
    <li>
      <a href="{{ URL('login') }}"><i class="fa fa-circle-o"></i><span>Login</span></a>
    </li>
  @endif
  @if(Auth::check())
    <li>
      <a href="{{ URL('logout') }}"><i class="fa fa-circle-o"></i><span>Logout</span></a>
    </li>
  @endif
  @if(Auth::check())
    <li class="treeview">
      <a href="#"><i class="fa fa-circle-o"></i><span>Account</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li>
          <a href="{{ URL('user') }}"><i class="fa fa-circle-o"></i><span>User</span></a>
        </li>
        <li>
          <a href="{{ URL('role') }}"><i class="fa fa-circle-o"></i><span>Role</span></a>
        </li>
        <li>
          <a href="{{ URL('permission') }}"><i class="fa fa-circle-o"></i><span>Permission</span></a>
        </li>
      </ul>
    </li>
    <li class="treeview">
      <a href="{{ URL('customer') }}"><i class="fa fa-circle-o"></i><span>Customer</span></a>
    </li>

  @endif
</ul>
