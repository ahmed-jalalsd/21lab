@extends('layouts.main')  
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">
      <h1>{{ $right->title }}</h1>
      <h3class="lead"> {!! $right->email !!} </h3>
      <h4class="lead"> {!! $right->phone !!} </h4>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('rightfooter.edit', 'Edit', array($right->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['rightfooter.destroy', $right->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
