<div class="margin-bottom">
    {{ Form::open(array('action' => 'SalaryUserController@searchabc', 'method' => 'GET')) }}
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Mức lương</label>
            <input type="text" name="salary" class="form-control" placeholder="Mức lương" />
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