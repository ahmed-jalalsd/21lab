@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">
      <h1>{{ $download->title }}</h1>
      <h4>{{ $download->download_media }}<h4>
      <a href="images/downloads/{{ $download->title }}" class="btn btn-primary btn-block"
        download"{{ $download->title }}">Download</a>

        <hr>
        <div class="categories">
          @foreach ( $download->categories as $category )
            <span class="label label-default">{{ $category->category_name }}</span>
          @endforeach
        </div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('downloads.edit', 'Edit', array($download->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['downloads.destroy', $download->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
