
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Expiry items in a month</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <!--button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button-->
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin" id="table1" style="font-size: 14px;">
        <thead>
          <tr>
            <th>SKU</th>
            <th>Item Name</th>
            <th>Qty</th>
            <th>Expiry Date</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  </div><!-- /.box-body -->
</div><!-- /.box -->

<script>
  var oTable = $("#table1").DataTable({
    dom: "Brtp",   
    responsive: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    ajax: {
      url: '{{ URL('inventoryexpirydashboard/data') }}',
    },
    columns: [
      { data: 'sku' },
      { data: 'item_name' },
      { data: 'qty' },
      { data: 'date' },
    ],
  });
</script>
<style>
  .dataTable input{width: 100%;}
</style>
