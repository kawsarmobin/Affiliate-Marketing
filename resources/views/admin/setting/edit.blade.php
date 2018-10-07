@extends('layouts.admin')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Password Change
        </div>

        <div class="panel-body">

            @include('includes.errors')

            <form class="form-horizontal" action="{{ route('changePass') }}" method="post">
                {{ csrf_field() }} {{ method_field('put') }}

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ ucwords($user->name) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Old Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="old_password">
                            <p style="color: #777">Please enter your old password</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">New Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">
                            <p style="color: #777">Please enter your new password</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            <p style="color: #777">Please enter confirm password</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-xs btn-primary">
                                Password Update
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
