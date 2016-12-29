@push('css-head-level-1')
  @include('includes.dataTablesCss')
  @include('includes.dataTablesResponsiveCss')
@endpush
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-body">
        <table id="table1" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
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
        ajax: '{{ URL('role/roleUserData') }}',
        columns: [
          { data: 'name' },
          { data: 'email' },
        ]
      });
    });
  </script>
@endpush
