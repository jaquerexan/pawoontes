{!! Form::open(['url' => 'user/' . $query->id, 'class' => 'form-'.$query->id, 'style' => 'margin:0;padding:0;']) !!}
  @permission(('user_show'))
    <a class="ion-ios-information" href="{{ URL('user/' . $query->id) }}" title="view detail"></a>
  @endpermission
  @permission(('user_edit'))
    <a class="ion-edit" href="{{ URL('user/' . $query->id . '/edit') }}" title="edit data"></a>
  @endpermission
  @permission(('user_editpass'))
    <a class="ion-lock-combination" href="{{ URL('user/' . $query->id . '/editpass') }}" title="change password"></a>
  @endpermission
  @permission(('user_destroy'))
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::button( '<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'delete text-danger deleteuser','id' => 'btnDeleteuser', 'data-id' => $query->id, 'style' => 'border:none; background-color:transparent; padding:0;', 'title' => 'delete '.$query->code, 'data-toggle' => 'modal', 'data-target' => '#confirm-delete'] ) !!}
  @endpermission
{!! Form::close() !!}