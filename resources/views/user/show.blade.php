@extends('app')
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>Detail</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered detail-view">
        	<tbody>
        		<tr>
        			<th>User</th>
        			<td>{{ $user->name }}</td>
        		</tr>
        		<tr>
        			<th>Email</th>
        			<td>{{ $user->email }}</td>
        		</tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop