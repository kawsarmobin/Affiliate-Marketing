@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      All Category
    </div>

    <div class="panel-body">

      @include('includes.message')

      <table class="table table-data">
        <thead>
          <th>Name</th>
          <th>Action</th>
        </thead>
        <tbody>
          @if ($categories)
            @foreach ($categories as $category)
              <tr>
                <td>{{ $category->name }}</td>
                <td>
                  <form class="" action="{{ route('category.destroy', $category->id) }}" method="post">
                    {{ csrf_field() }} {{ method_field('delete') }}
                    <a class="btn btn-xs btn-info" href="{{ route('category.edit', $category->id) }}">Edit</a>
                    <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
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
