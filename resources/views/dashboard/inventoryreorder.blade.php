
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Inventory need reorder</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <!--button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button-->
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin" id="tableInOrder" style="font-size: 14px;">
        <thead>
          <tr>
            <th>SKU</th>
            <th>Item Name</th>
            <th>Qty</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  <!--div class="box-footer clearfix">
    <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
  </div><!-- /.box-footer -->
  </div><!-- /.box-body -->
</div><!-- /.box -->

<script>
  var oTable = $("#tableInOrder").DataTable({
    dom: "Brtp",   
    responsive: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    ajax: {
      url: '{{ URL('inventoryreorderdashboard/data') }}',
    },
    columns: [
      { data: 'sku' },
      { data: 'name' },
      { data: 'stock_in_hand' },
    ],
  });
</script>
<style>
  .dataTable input{width: 100%;}
</style>
