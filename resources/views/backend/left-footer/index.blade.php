@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
  <div class="col-md-8">
    <h1>Left footer</h1>
  </div>
  <div class="col-md-4">
    <a href="{{route('leftfooter.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create a new footer</a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!--end of row  -->
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <table class="table">
      <thead>
        <th></th>
        <th>title</th>
        <th>Body</th>
        <th></th>
      </thead>
      <tbody>
        @foreach( $lefts as $left )
          <tr>
            <th>{{ $left->id }}</th>
            <td>{{ $left->title }}</td>
            <td>{{ substr(strip_tags($left->description),0,50) }}{{ strlen(strip_tags($left->description)) > 50 ? "...." : "" }}</td>
            <td>
            <a href="{{ route('leftfooter.edit', $left->id) }}" class="btn btn-default">Edit</a>
            {!! Form::open(['route' => ['leftfooter.destroy', $left->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger' ))}}
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
