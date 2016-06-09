@if($salary)
	<div><label>Tên phòng ban</label>: {{ CommonSalary::getNameDep($salary->dep_id) }}</div>
	<div><label>Tên chức vụ</label>: {{ CommonSalary::getNameRegency($salary->regency_id) }}</div>
	<div><label>Lương hiện tại</label> {{ $salary->salary }}</div>
@else
	<div>Lỗi</div>
@endif