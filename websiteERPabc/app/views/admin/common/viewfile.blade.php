@extends('admin.layout.default')
@section('title')
{{ $title='View file in browser' }}
@stop

@section('content')
<iframe src="http://docs.google.com/gview?url={{ $data }}&embedded=true" 
style="width:600px; height:500px;" frameborder="0"></iframe>

@stop
