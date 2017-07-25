@extends('layouts.main')  
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">
      <h1>{{ $left->title }}</h1>
      <p class="lead"> {!! $left->description !!} </p>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('leftfooter.edit', 'Edit', array($left->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['leftfooter.destroy', $left->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
