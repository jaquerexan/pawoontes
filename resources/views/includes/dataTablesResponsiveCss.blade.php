@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css') }}
@endif
