@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/input-mask/jquery.inputmask.extensions.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.extensions.min.js') }}
@endif