@extends('admin.layout.default')
@section('title')
{{ $title='View file in browser' }}
@stop

@section('content')
  <!--jQuery-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>

  <!--docviewer.js-->
  <script src="//static-v2.crocodoc.com/core/docviewer.js"></script>

  <!--sets a global variable "_doc" that is needed for initialization-->
  {{}}
  <script src="//crocodoc.com/webservice/document.js?session=ElHpaWxpCLXkKDNsCEDH4vrq1mh1FfjR0GmdrNN1EDHOLKBl0167F0BbXOMB-nrEqWMj_bBqWI0BUln5qhQcaJNGYsq-X2tugAGQ_A"></script>

  <!--div for viewer-->
  <div id="DocViewer"></div>

  <script type="text/javascript">
    //creates a document viewer using the "DocViewer" div
    var docviewer = new DocViewer({ "id": "DocViewer" });
  </script>
@stop
