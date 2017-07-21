@extends('layouts.main')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-4">
  <div class="col-md-8">
    <h1>Images</h1>
  </div>
  <div class="col-md-4">
    <a href="{{route('images.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create a new image</a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div> <!--end of row  -->
<div class="row">
  <div class="col-md-8 col-md-offset-4">
    <table class="table">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Caption</th>
        <th>preview</th>
        <th></th>
      </thead>
      <tbody>
        @foreach( $images as $image )
          <tr>
            <th>{{ $image->id }}</th>
            <td>
              @if ($image->flag_zippo == 1)
              {{ $image->slider_title }}
              @elseif ($image->flag_zippo == 2)
              {{ $image->gallery_title }}
              @endif
            </td>
            <td>
              @if ($image->flag_zippo == 1)
                {{ substr(strip_tags($image->slider_caption),0,50) }} {{ strlen(strip_tags($image->slider_caption)) > 50 ? "...." : "" }}
              @elseif ($image->flag_zippo == 2)
                {{ substr(strip_tags($image->gallery_caption),0,50) }} {{ strlen(strip_tags($image->gallery_caption)) > 50 ? "...." : "" }}
              @endif
            </td>
            <td>
              @if ($image->flag_zippo == 1)
                <img src="{!! '/images/slider/'.$image->slider_image !!}" alt="{{ $image->slider_title }}" width="50%" height="auto">
              @else
                <img src="{!! '/images/gallery/'.$image->slider_image !!}" alt="{{ $image->slider_title }}" width="50%" height="auto">
              @endif
            </td>
            <td><a href="{{ route('images.show', $image->id) }}" class="btn btn-default">view</a> <a href="{{ route('images.edit', $image->id) }}" class="btn btn-default">Edit</a></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
