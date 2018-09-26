@extends('layouts.admin')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit User
        </div>

        <div class="panel-body">

            @include('includes.errors')
            @include('includes.message')

            <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="post">
                {{ csrf_field() }} {{ method_field('put') }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ ucwords($user->name) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-xs btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
