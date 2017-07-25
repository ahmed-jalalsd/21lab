@extends('layouts.main')
@section('stylesheets')
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Create a right footer</h1>
    <hr>
    {!! Form::open(['route' => 'rightfooter.store']) !!}
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, array('class' => 'form-control')) }}

      {{ Form::label('email', 'Email:')}}
      {{ Form::text('email', null, array('class' => 'form-control')) }}

      {{ Form::label('phone', 'Phone Number:')}}
      {{ Form::number('phone', null, array('class' => 'form-control')) }}

      {{Form::submit('Create right Footer', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>
@endsection


