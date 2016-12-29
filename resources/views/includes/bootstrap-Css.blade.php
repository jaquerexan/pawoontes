@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/bootstrap/css/bootstrap.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
@endif
