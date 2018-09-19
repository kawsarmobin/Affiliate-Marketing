@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      All Slider Image
    </div>

    <div class="panel-body">

      @include('includes.message')
      
      <table class="table table-data">
        <thead>
          <th>Image</th>
          <th>Action</th>
        </thead>
        <tbody>
          @if ($sliders)
            @foreach ($sliders as $slider)
              <tr>
                <td>
                  <img src="{{  $slider->image }}" alt="No Image" width="200px" height="100px">
                </td>
                <td>
                  <form class="" action="{{ route('sliderimage.destroy', $slider->id) }}" method="post">
                    {{ csrf_field() }} {{ method_field('delete') }}
                    <a class="btn btn-xs btn-info" href="{{ route('sliderimage.edit', $slider->id)}}">Edit</a>
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                  </form>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
