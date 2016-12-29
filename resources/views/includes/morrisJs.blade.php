@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/raphael/raphael.min.js') }}
{{ Html::script('assets/adminlte/2.3.0/plugins/morris/morris.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js') }}
@endif