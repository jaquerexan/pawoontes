@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/datatables/jquery.dataTables.min.js') }}
{{ Html::script('assets/adminlte/2.3.0/plugins/datatables/dataTables.bootstrap.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js') }}
@endif