@extends('layouts.main')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-4">
  <div class="col-md-8">
    <h1>All Downloads</h1>
  </div>
  <div class="col-md-4">
    <a href="{{route('downloads.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add a new file</a>
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
        <th>Files</th>
        <th>Category</th>
        <th>Actions</th>
      </thead>
      <tbody>
        @foreach( $downloads as $download )
          <tr>
            <th>{{ $download->id }}</th>
            <td>{{ $download->title }}</td>
            <td>{{ $download->download_media }}</td>
            <td>
               <div class="categories">
                @foreach ( $download->categories as $category )
                  <span class="label label-default">{{ $category->category_name }}</span>
                @endforeach
              </div>
            </td>
            <td><a href="{{ route('downloads.show', $download->id) }}" class="btn btn-default">view</a> <a href="{{ route('downloads.edit', $download->id) }}" class="btn btn-default">Edit</a></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
