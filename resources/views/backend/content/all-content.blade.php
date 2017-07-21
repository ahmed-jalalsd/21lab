@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
  <div class="col-md-8">
    <h1>All content</h1>
  </div>
  <div class="col-md-4">
    <a href="{{route('contents.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create a new post</a>
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
        @foreach( $contents as $content )
          <tr>
            <th>{{ $content->id }}</th>
            <td>{{ $content->title }}</td>
            <td>{{ substr(strip_tags($content->body),0,50) }}{{ strlen(strip_tags($content->body)) > 50 ? "...." : "" }}</td>
            <td><a href="{{ route('contents.show', $content->id) }}" class="btn btn-default">view</a> <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-default">Edit</a></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
