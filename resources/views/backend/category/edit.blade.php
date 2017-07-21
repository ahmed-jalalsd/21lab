@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    {!! Form::model( $category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
      {{ Form::label('category_name', 'Category:')}}
      {{ Form::text('category_name',null, ["class" => 'form-control input-lg']) }}
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('categories.show', 'Cancel', array($category->id), array('class' => 'btn btn-danger btn-block')) !!}
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
