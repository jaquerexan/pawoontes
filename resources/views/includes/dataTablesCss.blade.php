@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/datatables/dataTables.bootstrap.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.css') }}
@endif
