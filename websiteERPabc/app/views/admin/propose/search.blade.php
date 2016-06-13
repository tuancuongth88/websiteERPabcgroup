<div class="margin-bottom">
    {{ Form::open(array('action' => 'SalaryUserController@searchabc', 'method' => 'GET')) }}
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Phòng ban</label>
            {{ Form::select('type_dep_regency', CommonSalary::getAllNameDep(), null, array('class' => 'form-control')) }}
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Chức vụ</label>
            {{ Form::select('type_dep_regency', CommonSalary::getAllNameRegency(), null, array('class' => 'form-control')) }}
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Tăng/giảm lương</label>
            {{ Form::select('type_dep_regency', CommonSalary::getTypeUpDow(), null, array('class' => 'form-control')) }}
        </div>
        <div class="input-group" style="display: inline-block; vertical-align: bottom;">
            <input type="submit" value="Search" class="btn btn-primary" />
        </div>
    {{ Form::close() }}
</div>