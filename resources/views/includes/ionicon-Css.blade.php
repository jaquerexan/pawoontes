@if(App::environment('test','local'))
{{ Html::style('assets/ionicons/2.0.1/css/ionicons.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionic/1.3.2/css/ionic.min.css') }}
@endif
