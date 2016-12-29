{!! Form::open(['url' => 'permission/' . $query->id, 'class' => 'form-'.$query->id, 'style' => 'margin:0;padding:0;']) !!}
  @permission(('permission_show'))
    <a class="ion-ios-information" href="{{ URL('permission/' . $query->id) }}" title="view detail"></a>
  @endpermission
  @permission(('permission_edit'))
    <a class="ion-edit" href="{{ URL('permission/' . $query->id . '/edit') }}" title="edit data"></a>
  @endpermission
  @permission(('permission_destroy'))
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::button( '<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'delete text-danger deletepermission','id' => 'btnDeletepermission', 'data-id' => $query->id, 'style' => 'border:none; background-color:transparent; padding:0;', 'title' => 'delete '.$query->code, 'data-toggle' => 'modal', 'data-target' => '#confirm-delete'] ) !!}
  @endpermission
{!! Form::close() !!}