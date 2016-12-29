@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/input-mask/3.3.4/inputmask.min.js') }}
{{ Html::script('assets/adminlte/2.3.0/plugins/input-mask/3.3.4/jquery.inputmask.min.js') }}
{{ Html::script('assets/adminlte/2.3.0/plugins/input-mask/3.3.4/jquery.inputmask.bundle.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js') }}
@endif