@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/datatables/extensions/Select/js/dataTables.select.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js') }}
@endif
