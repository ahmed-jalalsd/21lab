@extends('layouts.main')
@section('stylesheets')
  <link rel="stylesheet" href="{{URL::to('/css/select2.min.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Add a media</h1>
    <hr>
    {!! Form::open(['route' => 'downloads.store', 'files' => 'true']) !!}

      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, array('class' => 'form-control')) }}

      {{ Form::label('media', 'Upload media:')}}
      {{ Form::file('media') }}

      {{Form::submit('Upload', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>
@endsection

@section('scripts')
  <script src="{{URL::to('js/select2.min.js')}}"></script>
  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection
