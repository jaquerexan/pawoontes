<meta charset="utf-8">
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('includes.head')
  </head>
  <body class="hold-transition sidebar-mini skin-green-light">
    <div class="wrapper">
      @include('includes.header')
      @include('includes.leftsidebar')
      <div class="content-wrapper">
        <section class="content-header" style="height: 35px;">
          <h1>
          </h1>
          <ol class="breadcrumb">
            @include('includes.breadcrumb')
          </ol>
        </section>
        <section class="content">
        @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <!--strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.-->
      </footer>
      <?php 
      //@include('includes.rightsidebar')
      ?>
    </div>
    @include('includes.foot')
  </body>
</html>
