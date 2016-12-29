@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/datepicker/datepicker3.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css') }}
@endif
