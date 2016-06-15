<div class="margin-bottom">
    {{ Form::open(array('action' => 'ProposeSalaryListController@search', 'method' => 'GET')) }}
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Phòng ban</label>
            {{ Form::select('type_dep', ['' => 'Tất cả']+CommonSalary::getAllNameDep(), null, array('class' => 'form-control')) }}
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Chức vụ</label>
            {{ Form::select('type_regency', ['' => 'Tất cả']+CommonSalary::getAllNameRegency(), null, array('class' => 'form-control')) }}
        </div>
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Tăng/giảm lương</label>
            {{ Form::select('type_salary', CommonSalary::getTypeUpDow(), null, array('class' => 'form-control')) }}
        </div>
        <div class="input-group" style="display: inline-block; vertical-align: bottom;">
            <input type="submit" value="Search" class="btn btn-primary" />
        </div>
    {{ Form::close() }}
</div>