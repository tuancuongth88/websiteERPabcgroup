<div class="margin-bottom">
    {{ Form::open(array('action' => 'DeparmentController@search', 'method' => 'GET')) }}
        <div class="input-group" style="width: 150px; display:inline-block;">
            <label>Tên phòng ban</label>
            <input type="text" name="keyword" class="form-control" placeholder="Phòng ban" />
        </div>
        <div class="input-group" style="display: inline-block; vertical-align: bottom;">
            <input type="submit" value="Search" class="btn btn-primary" />
        </div>
    {{ Form::close() }}
</div>