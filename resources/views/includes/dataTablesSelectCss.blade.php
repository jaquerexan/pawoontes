@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/datatables/extensions/Select/css/select.dataTables.min.css') }}
{{ Html::style('assets/adminlte/2.3.0/plugins/datatables/extensions/Select/css/select.bootstrap.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css') }}
@endif
