@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <div class="col-md-8">
      <h1>Right Footer</h1>
    </div>
    <div class="col-md-4">
      <a href="{{route('rightfooter.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">
      Create a new footer</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!--end of row  -->
      


  <div class="row">
    <div class="col-md-8 col-md-offset-4">
      <table class="table">
        <thead>
          <tr>
            <th>no</th>
            <th>Title</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($rights as $right)
            <th>{{ $right->id }}</th>
            <td>
              {{ $right->title }}</a>
            </td>
            <td>
              {{ $right->email }}
            </td>
            <td>
              {{ $right->phone }}
            </td>
            <td>
              <a href="{{ route('rightfooter.edit', $right->id) }}" class="btn btn-default">edit</a> 
              {!! Form::open(['route' => ['rightfooter.destroy', $right->id], 'method' => 'DELETE']) !!}
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
