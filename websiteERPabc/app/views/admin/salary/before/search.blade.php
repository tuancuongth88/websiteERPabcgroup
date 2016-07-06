<div class="margin-bottom">
    {{ Form::open(array('action' => 'SalaryBeforeController@search', 'method' => 'GET')) }}
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Từ ngày</label>
            <input type="text" name="start" class="form-control" id="datepickerStartdate" placeholder="Từ ngày"/>
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Đến ngày</label>
            <input type="text" name="end" class="form-control" id="datepickerEnddate" placeholder="Đến ngày" />
        </div>
        <div class="input-group" style="display: inline-block; vertical-align: bottom;">
            <input type="submit" value="Search" class="btn btn-primary" />
        </div>
    {{ Form::close() }}
</div>