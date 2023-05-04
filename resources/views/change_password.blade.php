@extends('layouts.template')

@section('title')
    Change password
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin:5em 0">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    <form id="login_form" method="POST" action="{{ route('validate_new_password', $user_id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Current Password</label>

                            <div class="col-md-6">
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="n_password" class="col-md-4 col-form-label text-md-end">New Password</label>

                            <div class="col-md-6">
                                <input id="n_password" minlength="8" type="password" class="form-control" name="n_password" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="c_password" class="col-md-4 col-form-label text-md-end">Password Confirmation</label>

                            <div class="col-md-6">
                                <input id="c_password" type="password" class="form-control" name="c_password" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection