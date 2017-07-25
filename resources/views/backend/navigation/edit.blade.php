@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    {!! Form::model( $navigation, ['route' => ['navigations.update', $navigation->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
      {{ Form::label('menu_name', 'Menu:')}}
        {{ Form::text('menu_name', null, array('class' => 'form-control')) }}

        {{ Form::label('url', 'URL:')}}
        {{ Form::text('url', null, array('class' => 'form-control')) }}


        <div class="form-group">
          <label for="parent_id" class="control-label">Menu:</label>
          <select class="form-control " name="parent_id">
                <option value = "0" > main menu </option>
              @foreach($items as $item)
                  <option value="{{ $item->id }}" > {{ $item->menu_name }}</option>
              @endforeach
          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('navigations.index', 'Cancel', array($navigation->id), array('class' => 'btn btn-danger btn-block')) !!}
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
