@extends('layouts.main')
@section('stylesheets')
  <link rel="stylesheet" href="{{URL::to('/css/select2.min.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <h1>Create a gallery or slider</h1>
    <hr>
    {!! Form::open(['route' => 'images.store', 'files' => 'true']) !!}
      {{ Form::label('slider_title', '  Title:')}}
      {{ Form::text('slider_title', null, array('class' => 'form-control')) }}

      {{ Form::label('slider_caption', ' caption:')}}
      {{ Form::textarea('slider_caption', null, array('class' => 'form-control')) }}

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
  </script>
@endsection
