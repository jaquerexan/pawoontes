@if(App::environment('test','local'))
	{{ Html::script('js/jquery.bootstrap-duallistbox.min.js') }}
@endif
@if(App::environment('live','staging','production'))
	{{ Html::script('js/jquery.bootstrap-duallistbox.min.js') }}
@endif
