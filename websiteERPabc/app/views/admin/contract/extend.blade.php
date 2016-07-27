@extends('admin.layout.default')
@section('title')
{{ $title='Gia hạn hợp đồng' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('DashboardController@index') }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => array('ContractController@updateAdjourn', $data->id), 'method' => 'post', 'files' => true)) }}
        
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên </label>
              <div class="row">
              	<div class="col-sm-6">
                	<input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name" readonly="true">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Số hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="code" value="{{ $data->code }}" name="code" readonly="true">
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Kiểu hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                         {{ Form::select('type', ['0'=> 'Lựa chọn']+CommonOption::getTypeContract(), $data->type, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()', 'readonly' => 'true')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
              <label>Nội dung tóm tắt</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="description" value="{{ $data->description}}" name="description" readonly="true">
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Đối tác</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('partner_id', ['0'=> 'Lựa chọn']+CommonContract::getNamePartner(), $data->partner_id, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()', 'readonly' => 'true')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Kiểu gia hạn</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('type_extend', ['0'=> 'Lựa chọn']+CommonOption::getTypeExtendContract(), $data->type_extend, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()', 'readonly' => 'true')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày ký hợp đồng</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_sign" class="form-control datepicker" value="{{ $data->date_sign }}" readonly="true"/>
                    </div>
               </div>
            </div>
            
            <div class="form-group">
               <label for="linkFile">Ngày hiệu lực</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_active" class="form-control datepicker"  value="{{ $data->date_active }}" readonly="true"/>
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày hết hạn</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_expired_old" class="form-control datepicker"  value="{{ $data->date_expired_new }}" readonly="true"/>
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Gia hạn đến ngày</label>
               <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="date_expired_new" class="form-control datepicker" />
                    </div>
               </div>
            </div>
            <!-- <div class="form-group">
                <label>File đính kèm</label>
                <div class="row">
                  <div class="col-sm-6">
                    {{ Form::file('file') }}
                  </div>
                </div>
            </div>
            @if($data->file)
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ url(CONTRACT_FILE_UPLOAD . '/' . $data->id . '/' .$data->file)}}">Xem file đính kèm</a>
                        </div>
                    </div>
                </div>
            @endif -->
            <div class="form-group">
               <label for="linkFile">Trạng thái</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('status', CommonOption::getStatusContract(), $data->status, array('class' => 'form-control', 'readonly' => 'true')) }}
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
