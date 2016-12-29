@if(App::environment('test','local'))
{{ Html::style('assets/adminlte/2.3.0/dist/css/skins/_all-skins.min.css') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.8/css/skins/_all-skins.min.css') }}
@endif
