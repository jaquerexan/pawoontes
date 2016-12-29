@extends('app')
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>View Detail</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered detail-view">
        	<tbody>
            <tr>
              <th>UUID</th>
              <td>{{ $company->cmp_name }}</td>
            </tr>
        		<tr>
        			<th>Nama</th>
        			<td>{{ $company->cmp_description }}</td>
        		</tr>
            <tr>
              <th>Alamat</th>
              <td>{{ $company->country->country_name }}</td>
            </tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop