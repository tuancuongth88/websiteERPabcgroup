@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới chức vụ' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('ResouceController@index') }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => 'ResouceController@store', 'files'=> true)) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên title</label>
              <div class="row">
              	<div class="col-sm-6">
                	<input type="text" class="form-control" id="name" placeholder="Tên title" name="name">
                </div>
              </div>
            </div>
            <div class="form-group">
             <label for="linkFile">Tên linkFile</label>
              <div class="row">
                <div class="col-sm-6">
                  {{ Form::file('linkFile[]') }}
                </div>
              </div>
            </div>
            <div class="form-group">
             <label for="link">Tên link</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="link" placeholder="Tên link" name="link">
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
