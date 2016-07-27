@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới hợp đồng' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('ContractController@index') }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => 'ContractController@store', 'files'=> true)) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên </label>
              <div class="row">
              	<div class="col-sm-6">
                	<input type="text" class="form-control" id="name" placeholder="Tên" name="name">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Số hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="code" placeholder="số hợp đồng" name="code">
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Kiểu hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                         {{ Form::select('type', CommonOption::getTypeContract(), null, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
              <label>Nội dung tóm tắt</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="description" placeholder="Nội dung tóm tắt" name="description">
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Đối tác</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('partner_id', CommonContract::getNamePartner(), null, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Kiểu gia hạn</label>
               <div class="row">
                    <div class="col-sm-6">

                        {{ Form::select('type_extend', CommonOption::getTypeExtendContract(), null, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày ký hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_sign" class="form-control datepicker" placeholder="Ngày ký" />
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày hiệu lực</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_active" class="form-control datepicker"  placeholder="Ngày hiệu lực" />
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày hết hạn</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_expired_new" class="form-control datepicker"  placeholder="Ngày hết hạn" />
                    </div>
               </div>
            </div>
            <div class="form-group">
            <label>File đính kèm</label>
            <div class="row">
              <div class="col-sm-6">
                {{ Form::file('file') }}
              </div>
            </div>
          </div>
            <div class="form-group">
               <label for="linkFile">Trạng thái</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('status', CommonOption::getStatusContract(), null, array('class' => 'form-control')) }}
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
