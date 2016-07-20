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
        {{ Form::open(array('action' => array('ContractController@update', $data->id), 'method' => 'PUT')) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên </label>
              <div class="row">
              	<div class="col-sm-6">
                	<input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Số hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="code" value="{{ $data->code }}" name="code">
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Kiểu hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                         {{ Form::select('type', ['0'=> 'Lựa chọn']+CommonOption::getTypeContract(), $data->type, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
              <label>Nội dung tóm tắt</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="description" value="{{ $data->description}}" name="description">
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Đối tác</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('partner_id', ['0'=> 'Lựa chọn']+CommonContract::getNamePartner(), $data->partner_id, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Kiểu gia hạn</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('type_extend', ['0'=> 'Lựa chọn']+CommonOption::getTypeExtendContract(), $data->type_extend, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày nhận</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_receive" class="form-control datepicker" value="{{ $data->date_receive }}" />
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày gửi</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_send" class="form-control datepicker"  value="{{ $data->date_send }}" />
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày ban hành</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_promulgate" class="form-control datepicker"  value="{{ $data->date_promulgate }}" />
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày hiệu lực</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_active" class="form-control datepicker"  value="{{ $data->date_active }}" />
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Trạng thái</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('status', CommonOption::getStatusContract(), $data->status, array('class' => 'form-control')) }}
                    </div>
               </div>
            </div>
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Lưu lại" />
          </div>
        {{ Form::close() }}
      </div>
      <!-- /.box -->
	</div>
</div>
@stop
