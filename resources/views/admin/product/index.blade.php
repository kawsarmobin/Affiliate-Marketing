@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Product List
    </div>

    <div class="panel-body">

      <table class="table table-data">
        <thead>
          <th>Picture</th>
          <th>Name</th>
          <th>Action</th>
        </thead>
        <tbody>
          @if ($products)
            @foreach ($products as $product)
              <tr>
                <td>
                  <img src="{{ $product->picture }}" alt="No Picture" width="200px" height="100px">
                </td>
                <td>{{ ucwords($product->name) }}</td>
                <td>
                  <form class="" action="{{ route('product.destroy', $product->id) }}" method="post">
                    {{ csrf_field() }} {{ method_field('delete') }}
                    <a class="btn btn-xs btn-info" href="{{ route('product.edit', $product->id) }}">Edit</a>
                    <a class="btn btn-xs btn-success" href="{{ route('product.show', $product->id) }}">Show</a>
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
