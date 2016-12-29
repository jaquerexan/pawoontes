@extends('app')
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>Role Detail</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered detail-view">
        	<tbody>
        		<tr>
        			<th>Name</th>
        			<td>{{ $role->name }}</td>
        		</tr>
        		<tr>
        			<th>Display Name</th>
        			<td>{{ $role->display_name }}</td>
        		</tr>
            <tr>
              <th>Description</th>
              <td>{{ $role->description }}</td>
            </tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop