@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-3">
    <div class="col-md-8">
      <h1>categories</h1>
      <table class="table">
        <thead>
          <tr>
            <th>no</th>
            <th>name</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($categories as $category)
            <th>{{ $category->id }}</th>
            <td>
              <a href="{{ route('categories.show', $category->id)}}">{{ $category->category_name }}</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  <div class="col-md-4">
    <div class="well">
      {!! Form::open(['route' => 'categories.store']) !!}
        <h2 style="font-size:25px">New Category</h2>
        {{ Form::label('category_name', 'Category:')}}
        {{ Form::text('category_name', null, array('class' => 'form-control')) }}

        {{Form::submit('Create Category', array('class' => 'btn btn-primary btn-lg btn-block' ,'style' => 'margin-top:20px;'))}}
      {!! Form::close() !!}
    </div>
  </div>
</div><!--End of .col-md-8 with offset -->
</div>
@endsection
