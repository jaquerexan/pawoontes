<meta charset="utf-8">
@stack('css-top-bootstrap')
@include('includes.bootstrap-Css')
@stack('css-bottom-bootstrap')

@stack('css-top-font-awesome')
@include('includes.fontAwasome-Css')
@stack('css-bottom-font-awesome')

@stack('css-top-ionicons')
@include('includes.ionicon-Css')
@stack('css-bottom-ionicons')

@stack('css-top-adminLTE')
@include('includes.adminlte-Css')
@stack('css-bottom-adminLTE')

@stack('css-top-all-skin')
@include('includes.adminlte-allskinsCss')
@stack('css-bottom-all-skin')

@stack('css-top-adminLTE-custom')
<link href="{{ URL::asset('assets/adminlte/2.3.0/dist/css/AdminLTE-custom.css') }}" rel="stylesheet" type="text/css" />
@stack('css-bottom-adminLTE-custom')

@stack('css-head-level-1')
@stack('css-head-level-2')
@stack('css-head-level-3')

@stack('js-top-jquery')
@include('includes.jqueryjs')
@stack('js-bottom-jquery')

@stack('js-head-level-1')
@stack('js-head-level-2')
@stack('js-head-level-3')