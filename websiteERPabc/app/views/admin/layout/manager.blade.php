@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý User' }}
@stop

@section('content')
<!-- inclue Search form 

-->
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách User</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tài khoản</th>
			</tr>
			<tr>
			  <td></td>
			  <td></td>
			  <td>
			 
			  </td>
			  </td>
			</tr>
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		</ul>
	</div>
</div>

@stop

