@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/timepicker/bootstrap-timepicker.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css') }}
@endif
