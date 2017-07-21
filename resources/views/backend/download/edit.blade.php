@extends('layouts.main')
@section('stylesheets')
  <link rel="stylesheet" href="{{URL::to('/css/select2.min.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    @foreach ( $download as $down )
    {!! Form::model( $down, ['route' => ['downloads.update', $down->id], 'method' => 'PUT' ,'files' => 'true']) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, array('class' => 'form-control')) }}

      {{ Form::label('media', 'Upload media:')}}
      {{ Form::file('media') }}

      <!-- {{ Form::label('categories', 'Categories:')}}
        <select class="form-control select2-multi" name="categories[]" multiple="multiple">
          @foreach( $categories as $category)
            <option>{{  strtoupper($category) }}</option>
          @endforeach
        </select> -->

      {{ Form::label('categories', 'Categories:', ['class' => 'form-spacing-top']) }}
      {{ Form::select('categories[]', $categories, null, ['class' => 'form-control select2-multi',
      'multiple'=>'multiple']) }}
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('downloads.show', 'Cancel', array($down->id), array('class' => 'btn btn-danger btn-block')) !!}
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

@section('scripts')
  <script src="{{URL::to('js/select2.min.js')}}"></script>
  <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($down->categories()->allRelatedIds()) !!}).trigger('change');﻿
  </script>
@endsection
