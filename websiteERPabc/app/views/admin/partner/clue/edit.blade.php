@extends('admin.layout.default')
@section('title')
{{ $title='Sửa thông tin đối tác' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('PartnerClueController@indexClue', $parent_id) }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => array('PartnerClueController@update', $data->id), 'method' => 'PUT')) }}
          <div class="box-body">
            <div class="form-group">
                <label>Tên</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fullname" value="{{ $data->fullname }}" name="fullname">
                    </div>
              </div>
            </div>
            <div class="form-group">
                <label for="linkFile">Phòng ban</label>
                <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="department" value="{{ $data->department }}" name="department">
                    </div>
              </div>
            </div>
            <div class="form-group">
                <label for="linkFile">Chức vụ</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="regency" value="{{ $data->regency }}" name="regency">
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
