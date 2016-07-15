@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới tài nguyên' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('ResourceManagementController@index') }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => 'ResourceManagementController@store', 'files'=> true)) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên title</label>
              <div class="row">
              	<div class="col-sm-6">
                	<input type="text" class="form-control" id="name" placeholder="Tên title" name="file_name">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Thể loại</label>
              <div class="row">
                <div class="col-sm-6">
                    {{ Form::select('type_resource_id', [0 => 'Lựa chọn'] + TypeReport::lists('name', 'id'), null, array('class' => 'form-control', 'onchange' => 'changeTypeReport()')) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="linkFile">Nội dung</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="description" placeholder="Mô tả" name="description">
                </div>
              </div>
            </div>

          <!--   <div class="form-group">
             <label for="linkFile">Tên File</label>
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
            </div> -->
            
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
