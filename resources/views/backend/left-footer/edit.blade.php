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
    {!! Form::model( $left, ['route' => ['leftfooter.update', $left->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title',null, ["class" => 'form-control input-lg']) }}

      {{ Form::label('description', 'description:', ['class'=>'form-spacing-top'])}}
      {{ Form::textarea('description',null, ["class" => 'form-control']) }}
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('leftfooter.show', 'Cancel', array($left->id), array('class' => 'btn btn-danger btn-block')) !!}
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
