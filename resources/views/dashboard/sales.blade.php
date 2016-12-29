<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Line Chart</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="stats-container" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function() {
    // Create a Bar Chart with Morris
    var chart = Morris.Bar({
      // ID of the element in which to draw the chart.
      element: 'stats-container',
      data: [0, 0], // Set initial data (ideally you would provide an array of default data)
      xkey: 'date', // Set the key for X-axis
      ykeys: ['price'], // Set the key for Y-axis
      labels: ['Item Sales'], // Set the label when bar is rolled over
      hideHover: 'auto',
    });

    // Fire off an AJAX request to load the data
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: '{{ URL('itemsaledashboard/data') }}', // This is the URL to the API
        //data: { periode: 'last_week' } // Passing a parameter to the API to specify number of days
      })
      .done(function( data ) {
        // When the response to the AJAX request comes back render the chart with new data
        chart.setData(data);
      })
      .fail(function() {
        // If there is no communication between the server, show an error
        alert( "error occured" );
      });
  });
</script>