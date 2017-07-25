@extends('layouts.main')
@section('stylesheets')
  <link rel="stylesheet" href="{{URL::to('/css/select2.min.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Update a gallery or slider</h1>
    <hr>
    {!! Form::model($image, ['route' => ['images.update', $image->id],  'method' => 'PUT','files' => 'true']) !!}

      @if ($image->flag_zippo == 1)
      {{ Form::label('slider_title', '  Title:')}}
      {{ Form::text('slider_title', null, array('class' => 'form-control')) }}
      @elseif ($image->flag_zippo == 2)
      {{ Form::label('gallery_title', '  Title:')}}
      {{ Form::text('gallery_title', null, array('class' => 'form-control')) }}
      @endif

      @if ($image->flag_zippo == 1)
      {{ Form::label('slider_caption', ' caption:')}}
      {{ Form::textarea('slider_caption', null, array('class' => 'form-control')) }}
      @else
      {{ Form::label('gallery_caption', ' caption:')}}
      {{ Form::textarea('gallery_caption', null, array('class' => 'form-control')) }}
      @endif


      {{ Form::label('slider_image', 'Upload an image:')}}
      {{ Form::file('slider_image') }}

      {{ Form::label('choose', 'choose a slider or a gallery:')}}
        <select class="form-control select2-multi" name="choose" multiple="multiple" id="choose" required>
            <option value="1" >Slider</option>
            <option value="2" >Gallery</option>
        </select>

      {{Form::submit('Create Content', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
    {!! Form::close() !!}
  </div>
</div>
@endsection
@section('scripts')
  <script src="{{URL::to('js/select2.min.js')}}"></script>
  <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($image->id) !!}).trigger('change');﻿
  </script>
@endsection
