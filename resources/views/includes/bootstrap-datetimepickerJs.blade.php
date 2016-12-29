@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/datetimepicker/moment.min.js') }}
{{ Html::script('assets/adminlte/2.3.0/plugins/datetimepicker/moment-with-locales.min.js') }}
{{ Html::script('assets/adminlte/2.3.0/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment-with-locales.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js') }}
@endif