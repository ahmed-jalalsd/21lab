@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Create a content</h1>
    <hr>
    {!! Form::open(['route' => 'contents.store']) !!}
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, array('class' => 'form-control')) }}

      {{ Form::label('body', 'Body:')}}
      {{ Form::textarea('body', null, array('class' => 'form-control')) }}

      {{Form::submit('Create Content', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>
@endsection
