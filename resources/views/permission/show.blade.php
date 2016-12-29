@extends('app')
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>Permisssion Detail</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered detail-view">
        	<tbody>
        		<tr>
        			<th>Name</th>
        			<td>{{ $permission->name }}</td>
        		</tr>
        		<tr>
        			<th>Display Name</th>
        			<td>{{ $permission->display_name }}</td>
        		</tr>
            <tr>
              <th>Description</th>
              <td>{{ $permission->description }}</td>
            </tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop