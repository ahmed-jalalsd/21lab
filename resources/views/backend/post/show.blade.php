@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">
      @foreach ( $posts as $post )
      <h1>{{ $post->title }}</h1>
      <img src="{!! '/images/media/'.$post->media !!}" alt="{{ $post->title }}" height="auto" width="50%">
      <p class="lead"> {{ $post->body }} </p>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
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
