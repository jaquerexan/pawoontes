@push('css-head-level-1')
  @include('includes.duallistboxCss')
@endpush
  <div class="form-group">
    {!! Form::label('rolepermission', 'Permission', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    @if(isset($assignedPermissions))
      {!! Form::select('permissions[]', $availPermissions, $assignedPermissions, array('multiple'=>'multiple', "size"=>10, "style"=>"display:none")) !!}
    @else
      {!! Form::select('permissions[]', $availPermissions, null, array('multiple'=>'multiple', "size"=>10, "style"=>"display:none")) !!}
    @endif
      {{ $errors->first('permissions[]', '<p class="text-danger">:message</p>') }}
    </div>
  </div>

@push('js-foot-level-1')
  @include('includes.duallistboxJs')
  <script>
    $(function () {
      var demo1 = $('select[name="permissions[]"]').bootstrapDualListbox({
          nonSelectedListLabel: 'Available permissions',
          selectedListLabel: 'Selected permissions',
          preserveSelectionOnMove: 'moved',
          moveOnSelect: true,
      });
    });
  </script>
@endpush