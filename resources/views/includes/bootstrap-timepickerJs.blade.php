@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/timepicker/bootstrap-timepicker.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js') }}
@endif