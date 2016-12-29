@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}
@endif
