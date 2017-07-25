@extends('layouts.main')
@section('stylesheets')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
      selector:'textarea',
      plugins:"link" 
    });
  </script>
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Create a left footer</h1>
    <hr>
    {!! Form::open(['route' => 'leftfooter.store']) !!}
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, array('class' => 'form-control')) }}

      {{ Form::label('description', 'Body:')}}
      {{ Form::textarea('description', null, array('class' => 'form-control')) }}

      {{Form::submit('Create Left Footer', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>
@endsection
