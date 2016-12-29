@extends('app')
@section('content')

@push('css-head-level-1')
  @include('includes.dataTablesCss')
  @include('includes.dataTablesResponsiveCss')
@endpush
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>Role</h3>
      </div>
      @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
      @endif
      @permission(('role_create'))
      <div class="box-body">
        <a class="btn btn-box btn-success"  style="margin-bottom:10px" href="{{ URL('role/create') }}">create</a>
      </div>
      @endpermission
      <div class="box-body">
        <table id="table1" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Display Name</th>
              <th>Description</th>
              @permission((['role_edit','role_show','role_destory']))
              <th width="90px">Option</th>
              @endpermission
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Display Name</th>
              <th>Description</th>
              @permission((['role_edit','role_show','role_destory']))
              <th width="90px">Option</th>
              @endpermission
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@push('js-foot-level-1')
  @include('includes.dataTablesJs')
  @include('includes.dataTablesResponsiveJs')
  <script>
    $(function () {
      $("#table1").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: '{{ URL('role/indexdata') }}',
        columns: [
          { data: 'name' },
          { data: 'display_name' },
          { data: 'description' },
          @permission((['role_edit','role_show','role_destory']))
          { data: 'action', name: 'action', orderable: false, searchable: false},
          @endpermission
        ]
      });
    });
  </script>
@endpush
@stop