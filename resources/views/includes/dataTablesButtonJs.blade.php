@if(App::environment('test','local'))
{{ Html::script('assets/adminlte/2.3.0/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}
@endif
@if(App::environment('live','staging','production'))
{{ Html::style('https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}
@endif
