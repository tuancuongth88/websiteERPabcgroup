@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới đối tác' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('PartnerClueController@indexClue', $id) }}" class="btn btn-success">Danh sách</a>
  </div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => array('PartnerClueController@storeClue', $id), 'method' => 'POST')) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Parent</label>
              <div class="row">
              	<div class="col-sm-6">
                    {{ Form::select('parent_id', Partner::where('id', $data->id)->lists('name', 'id'), null, array('class' => 'form-control')) }}
                
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Tên</label>
              <div class="row">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="fullname" placeholder="Tên" name="fullname">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="linkFile">Phòng ban</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="department" placeholder="Phòng ban" name="department">
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="linkFile">Chức vụ</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="regency" placeholder="Chức vụ" name="regency">
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="linkFile">Số điện thoại</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="description" placeholder="Số điện thoại" name="phone">
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
