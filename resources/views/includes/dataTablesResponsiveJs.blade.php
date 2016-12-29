@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js') }}
@endif
