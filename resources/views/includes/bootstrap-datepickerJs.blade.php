@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/datepicker/bootstrap-datepicker.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js') }}
@endif