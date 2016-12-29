<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!--img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"-->
    <span class="hidden-xs">{{ Auth::user()->name }}</span>
  </a>
	@include('includes.nav-bar-user-dropdown')
</li>
