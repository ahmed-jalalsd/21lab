@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">

      @if ($image->flag_zippo == 1)
        <h1>{{ $image->slider_title }}</h1>
      @elseif ($image->flag_zippo == 2)
        <h1>{{ $image->gallery_title }}</h1>
      @endif
      <hr>
      @if ($image->flag_zippo == 1)
        <img src="{!! '/images/slider/'.$image->slider_image !!}" alt="{{ $image->slider_title }}" height="auto" width="50%">
      @elseif ($image->flag_zippo == 2)
        <img src="{!! '/images/gallery/'.$image->slider_image !!}" alt="{{ $image->gallery_title }}" height="auto" width="50%">
      @endif
      <hr>
      <h3>Caption:</h3>
      @if ($image->flag_zippo == 1)
      <p class="lead">{!! $image->slider_caption !!}</p>
      @elseif ($image->flag_zippo == 2)
      <p class="lead">{!! $image->slider_caption !!}</p>
      @endif
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('images.edit', 'Edit', array($image->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
