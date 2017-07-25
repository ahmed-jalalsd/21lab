@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-3">
    <div class="col-md-8">
      <h1>menu</h1>
      <table class="table">
        <thead>
          <tr>
            <th>no</th>
            <th>name</th>
            <th>url</th>
            <th>sub</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($navigations as $navigation)
            <th>{{ $navigation->id }}</th>
            <td>
              <a href="{{ route('navigations.show', $navigation->id)}}">{{ $navigation->menu_name }}</a>
            </td>
            <td>
              {{ $navigation->url }}
            </td>
            <td>
                @if ($navigation->parent_id == '0')
                  <li> main menu</li>
                @else 
                  <li value="{{ $navigation->id }}" > /{{ $navigation->menu_name }}</li>
                @endif 
            </td>
            <td>
              <a href="{{ route('navigations.edit', $navigation->id) }}" class="btn btn-success btn-block">edit</a> 
              {!! Form::open(['route' => ['navigations.destroy', $navigation->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  <div class="col-md-4">
    <div class="well">
      {!! Form::open(['route' => 'navigations.store']) !!}
        <h2 style="font-size:25px">New menu</h2>
        {{ Form::label('menu_name', 'Menu:')}}
        {{ Form::text('menu_name', null, array('class' => 'form-control')) }}

        {{ Form::label('url', 'URL:')}}
        {{ Form::text('url', null, array('class' => 'form-control')) }}

         <div class="form-group">
          <label for="parent_id" class="control-label">Menu:</label>
          <select class="form-control " name="parent_id">
                <option value = "0" > main menu </option>
              @foreach($navigations as $navigation)
                  <option value="{{ $navigation->id }}" > /{{ $navigation->menu_name }}</option>
              @endforeach
          </select>
      </div>

        {{Form::submit('Create menu', array('class' => 'btn btn-primary btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
      {!! Form::close() !!}
    </div>
  </div>
</div><!--End of .col-md-8 with offset -->
</div>
@endsection
