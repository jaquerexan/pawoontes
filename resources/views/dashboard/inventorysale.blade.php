<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Inventory sale (Today)</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin" id="tableSale" style="font-size: 14px;">
        <thead>
          <tr>
            <th>SKU</th>
            <th>Item Name</th>
            <th>Place</th>
            <th>Qty</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  </div><!-- /.box-body -->
</div><!-- /.box -->

<script>
  var oTable = $("#tableSale").DataTable({
    dom: "Brtp",   
    responsive: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    ajax: {
      url: '{{ URL('inventorysaledashboard/data') }}',
    },
    columns: [
      { data: 'sku' },
      { data: 'name' },
      { data: 'place' },
      { data: 'qty' },
    ],
  });
</script>
<style>
  .dataTable input{width: 100%;}
</style>
