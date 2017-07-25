@extends('layouts.main')
@section('stylesheets')
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Edit a  User</h1>
    <hr>
    {!! Form::model( $user, ['route' => ['manage.update', $user->id], 'method' => 'PUT']) !!}
      {{ Form::label('name', 'Name:')}}
      {{ Form::text('name', null, array('class' => 'form-control')) }}

      {{ Form::label('email', 'Email:')}}
      {{ Form::text('email', null, array('class' => 'form-control')) }}

      {{ Form::label('password', 'Password:')}}
      {{ Form::text('password', null, array('class' => 'form-control')) }}

      {{Form::submit(' Edit', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>
@endsection
