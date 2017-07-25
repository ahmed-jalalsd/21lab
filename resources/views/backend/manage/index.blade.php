@extends('layouts.main')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-4">
  <div class="col-md-8">
    <h1>All Users</h1>
  </div>
  <div class="col-md-4">
    <a href="{{route('manage.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add a new User</a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!--end of row  -->
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <table class="table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Date Created</th>
        <th>Actions</th>
      </thead>
      <tbody>
        @foreach( $users as $user )
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td><a href="{{ route('manage.edit', $user->id) }}" class="btn btn-default">Edit</a>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
