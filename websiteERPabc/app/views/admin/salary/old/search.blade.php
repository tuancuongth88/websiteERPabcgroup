<div class="margin-bottom">
    {{ Form::open(array('action' => 'SalaryUserController@searchOld', 'method' => 'GET')) }}
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Mức lương bắt đầu</label>
            <input type="text" name="salary_start" class="form-control" />
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Mức lương cuối</label>
            <input type="text" name="salary_end" class="form-control" />
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Tên nhân viên</label>
            <input type="text" name="username" class="form-control" placeholder="Tên nhân viên" />
        </div>
        <div class="input-group" style="display: inline-block; vertical-align: bottom;">
            <input type="submit" value="Search" class="btn btn-primary" />
        </div>
    {{ Form::close() }}
</div>