@extends('admin.layout.default')
@section('title')
{{ $title='View file in browser' }}
@stop

@section('content')
<iframe src="http://docs.google.com/gview?url={{ $data }}&embedded=true" 
style="width:100%; height:600px;" frameborder="0"></iframe>

@stop
