@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">

    <div class="col-md-8">
      <h1>{{ $category->category_name }} Category <small>{{$category->downloads()->count()}} files</small></h1>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div class="row">
          <div class="col-sm-6">
            {!! Html::LinkRoute('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block' ))}}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
<hr>

    <div class="row">
      <div class="col-md-12">
        <h2>files associate with the category</h2>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>name of file</th>
              <th>Categories</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($category->downloads as $download)
            <tr>
              <th>{{ $download->id }}</th>
              <td>{{ $download->title }}</td>
              <td>@foreach($download->categories as $category)
                <span class="label label-default">{{$category->category_name}}</span>
                  @endforeach
              </td>
              <td><a href="{{ route('downloads.show',$download->id ) }}" class="btn btn-default btn-xs">view file</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

  </div>
</div>
@endsection
