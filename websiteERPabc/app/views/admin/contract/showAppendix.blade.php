@extends('admin.layout.default')
@section('title')
{{ $title='Chi tiét phụ lục' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('ContractController@Appendix', $data->parent_id) }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên </label>
              <div class="row">
              	<div class="col-sm-6">
                	{{ $data->name }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Số phụ lục</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ $data->code }}
                    </div>
               </div>
            </div>
            
            <div class="form-group">
              <label>Nội dung tóm tắt</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{  $data->description }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Đối tác</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ Form::select('partner_id', CommonContract::getNamePartner(), $data->partner, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày ký phụ lục</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{ $data->date_sign }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày hiệu lực</label>
               <div class="row">
                    <div class="col-sm-6">
                      {{ $data->date_active }}
                    </div>
               </div>
            </div>
            <div class="form-group">
               <label for="linkFile">Ngày hết hạn</label>
               <div class="row">
                    <div class="col-sm-6">
                    {{ $data->date_expired_new }}
                    </div>
               </div>
            </div>
            <label>File đính kèm</label>
             
            @if($data->file)
                <div class="form-group">
                  <div class="row">
                  <div class="col-sm-6">
                    <a href="{{ url(CONTRACT_FILE_UPLOAD . '/' . $data->id . '/' .$data->file)}}">Xem file đính kèm</a>
                  </div>
                  </div>
                </div>
              @endif
            <div class="form-group">
               <label for="linkFile">Trạng thái</label>
               <div class="row">
                    <div class="col-sm-6">
                        {{  CommonOption::getStatusContract()[$data->status] }}
                    </div>
               </div>
            </div>
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ action('ContractController@index') }}" class="btn btn-primary">Quay lại</a>
          </div>
      </div>
      <!-- /.box -->
	</div>
</div>

@stop
