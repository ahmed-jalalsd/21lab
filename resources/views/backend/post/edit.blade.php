@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    @foreach ( $posts as $post )
    {!! Form::model( $post, ['route' => ['posts.update', $post->id], 'method' => 'PUT' ,'files' => 'true']) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title',null, ["class" => 'form-control input-lg']) }}

      {{ Form::label('body', 'body:', ['class'=>'form-spacing-top'])}}
      {{ Form::textarea('body',null, ["class" => 'form-control']) }}

      {{ Form::label('media', 'Upload media:')}}
      {{ Form::file('media') }}
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit('Save', array('class' => 'btn btn-success btn-block' ))}}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
      @endforeach
  </div>
</div>
@endsection
