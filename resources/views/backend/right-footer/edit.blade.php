@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    {!! Form::model( $right, ['route' => ['rightfooter.update', $right->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Tilte:')}}
        {{ Form::text('title', null, array('class' => 'form-control')) }}

        {{ Form::label('email', 'Email:')}}
        {{ Form::text('email', null, array('class' => 'form-control')) }}

        {{ Form::label('phone', 'phone number:')}}
        {{ Form::number('phone', null, array('class' => 'form-control')) }}

    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('rightfooter.index', 'Cancel', array($right->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit('Save', array('class' => 'btn btn-success btn-block' ))}}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
