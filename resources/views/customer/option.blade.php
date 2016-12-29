{!! Form::open(['url' => 'customer/' . $query->cust_id, 'class' => 'form-'.$query->cust_id, 'style' => 'margin:0;padding:0;']) !!}
  @permission(('customer_show'))
    <a class="ion-ios-information" href="{{ URL('customer/' . $query->cust_id) }}" title="view detail"></a>
  @endpermission
  @permission(('customer_edit'))
    <a class="ion-edit" href="{{ URL('customer/' . $query->cust_id . '/edit') }}" title="edit data"></a>
  @endpermission
  @permission(('customer_destroy'))
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::button( '<i class="ion-trash-b"></i>', ['type' => 'submit', 'class' => 'delete text-danger deletecustomer','id' => 'btnDeletecustomer', 'data-id' => $query->cust_id, 'style' => 'border:none; background-color:transparent; padding:0;', 'title' => 'delete '.$query->customer_code, 'data-toggle' => 'modal', 'data-target' => '#confirm-delete'] ) !!}
  @endpermission
{!! Form::close() !!}