@extends('layouts.admin')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      All User
    </div>

    <div class="panel-body">

      @include('includes.message')

      <table class="table table-data">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </thead>
        <tbody>
          @if ($users)
            @foreach ($users as $user)
              <tr>
                <td>{{ ucwords($user->name) }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <form class="" action="{{ route('user.destroy', $user->id) }}" method="post">
                    {{ csrf_field() }} {{ method_field('delete') }}

                    <a class="btn btn-xs btn-info" href="{{ route('user.edit', $user->id) }}">Edit</a>
                    <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">

                    @if ($user->is_admin)
                        <a class="btn btn-xs btn-warning" href="{{ route('regular', $user->id) }}">Regular</a>
                    @else
                        <a class="btn btn-xs btn-success" href="{{ route('admin', $user->id) }}">Admin</a>
                    @endif

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
