@extends('layouts.main')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-4">
  <div class="col-md-8">
    <h1>all posts</h1>
  </div>
  <div class="col-md-4">
    <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create a new post</a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!--end of row  -->
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <table class="table">
      <thead>
        <th>No</th>
        <th>title</th>
        <th>Body</th>
        <th>Thumbnail</th>
        <th></th>
      </thead>
      <tbody>
        @foreach( $posts as $post )
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ substr(strip_tags($post->body),0,50) }} {{ strlen(strip_tags($post->body)) > 50 ? "...." : "" }}</td>
            <td><img src="{!! '/images/media/'.$post->media !!}" alt="" width="25%" height="auto"></td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">view</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Edit</a></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>



@endsection
