@if(App::environment('test','local'))
{{ Html::style('assets/font-awesome/4.6.1/css/font-awesome.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}
@endif
