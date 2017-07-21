@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">
      @foreach ( $content as $cont )
      <h1>{{ $cont->title }}</h1>
      <p class="lead"> {!! $cont->body !!} </p>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('contents.edit', 'Edit', array($cont->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['contents.destroy', $cont->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
