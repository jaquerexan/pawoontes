@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css') }}
@endif
