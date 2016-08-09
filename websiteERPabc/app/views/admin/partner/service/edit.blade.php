@extends('admin.layout.default')
@section('title')
{{ $title='Sửa thông tin đối tác' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('PartnerController@indexService') }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => array('PartnerController@updateService', $data->id), 'method' => 'post')) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên nhà cung cấp</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="fullname" value="{{ $data->name }}" name="name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Tên</label>
              <div class="row">
              	<div class="col-sm-6">
                	<input type="text" class="form-control" id="fullname" value="{{ $data->fullname }}" name="fullname">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Email</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="fullname" value="{{ $data->email }}" name="email">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Địa chỉ</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="name" value="{{ $data->address }}" name="address">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="linkFile">Số điện thoại</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="description" value="{{ $data->phone }}" name="phone">
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Lưu lại" />
            <input type="reset" class="btn btn-default" value="Nhập lại" />
          </div>
        {{ Form::close() }}
      </div>
      <!-- /.box -->
	</div>
</div>

@stop
