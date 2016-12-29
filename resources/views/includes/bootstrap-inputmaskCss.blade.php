@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/input-mask/css/inputmask.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css') }}
@endif
