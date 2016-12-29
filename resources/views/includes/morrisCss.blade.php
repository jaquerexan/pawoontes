@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/plugins/morris/morris.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css') }}
@endif
