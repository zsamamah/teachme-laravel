@extends('layouts.template')

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin:5em 0">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="register_form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                            <div class="col-md-6">
                            <select class="form-control mb-3" name="role" required>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">City</label>
                            <div class="col-md-6">
                            <select class="form-control mb-3" name="city" required>
                                <option value="Irbid">Irbid</option>
                                <option value="Ajloun">Ajloun</option>
                                <option value="Jerash">Jerash</option>
                                <option value="Mafraq">Mafraq</option>
                                <option value="Zarqa">Zarqa</option>
                                <option value="Amman">Amman</option>
                                <option value="Salt">Salt</option>
                                <option value="Madaba">Madaba</option>
                                <option value="Karak">Karak</option>
                                <option value="Tafila">Tafila</option>
                                <option value="Maan">Maan</option>
                                <option value="Aqaba">Aqaba</option>
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Verification</label>
                            <div class="col-md-6">
                            <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6Le-Eq8lAAAAAEL_ZtZhdNG9hXbOMKUtfiU-V8lI"></div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

@section('scripts')
    <!-- Google reCaptch js -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
  document.getElementById("register_form").addEventListener("submit",function(evt)
  {
  var response = grecaptcha.getResponse();
  if(response.length == 0) 
  { 
    //reCaptcha not verified
    alert("Please verify you are human!"); 
    evt.preventDefault();
    return false;
}
});
</script>
@endsection