@push('css-head-level-1')
  @include('includes.duallistboxCss')
@endpush
  <div class="form-group">
    {!! Form::label('roleuser', 'User', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    @if(isset($assignedusers))
      {!! Form::select('users[]', $availusers, $assignedusers, array('multiple'=>'multiple', "size"=>10, "style"=>"display:none")) !!}
    @else
      {!! Form::select('users[]', $availusers, null, array('multiple'=>'multiple', "size"=>10, "style"=>"display:none")) !!}
    @endif
      {{ $errors->first('users[]', '<p class="text-danger">:message</p>') }}
    </div>
  </div>

@push('js-foot-level-1')
  @include('includes.duallistboxJs')
  <script>
    $(function () {
      var demo1 = $('select[name="users[]"]').bootstrapDualListbox({
          nonSelectedListLabel: 'Available users',
          selectedListLabel: 'Selected users',
          preserveSelectionOnMove: 'moved',
          moveOnSelect: true,
      });
    });
  </script>
@endpush