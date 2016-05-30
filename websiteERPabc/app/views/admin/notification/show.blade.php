@extends('admin.layout.default')
@section('title')
{{ $title='Xem thông báo' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NotificationController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group">
					<label>Tên thông báo</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $notification->name }}
						</div>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Nội dung</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $notification->description }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>File đính kèm</label>
					<div class="row">
						<div class="col-sm-10">
							<a href="{{ url(NOTIFICATION_FILE.'/'.$notification->link_url)}}">Xem file đính kèm</a>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<a href="{{ action('NotificationController@index') }}" class="btn btn-primary">Quay lại</a>
			</div>

		</div>
	</div>
</div>
@include('admin.task.script')
@stop
