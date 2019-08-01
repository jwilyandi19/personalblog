@extends('layouts.main')

@section('style')

@endsection


@section('content')
    @if ($errors->count()>0)
        <div class="alert alert-dismissible alert-danger center-block" >
        	<button type="button" class="close fade" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form class="form-horizontal" role="form" method="POST">
        <div class="row">
            <div class="col-md-9">
                <h2>Login</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group has-danger">
                    <label for="username">Username</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="username" class="form-control" id="username"
                                required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        Example error message
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group has-danger">
                    <label for="password">Password</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="password" name="password" class="form-control" id="password"
                                required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        Example error message
                    </span>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 1rem">
            {{csrf_field()}}
            <div class="col-md-9">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </div>

    </form>
@endsection

@section('script')

@endsection