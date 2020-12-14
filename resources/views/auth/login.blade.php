{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('backend.merchant.auth.auth_master')

@section('auth_content')
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Sign-In</h4>
                    <div class="nk-block-des">
                        <p style="font-size: 12px;">Sign-in to your delivery panel</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="phone">Phone</label>
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-user"></em>
                        </div>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="0123456789" name="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>
                        <a class="link link-primary link-sm" href="#">Forgot password?</a>
                    </div>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="*****" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>
            </form>
            {{-- <div class="form-note-s2 text-center pt-4"> Don't have a merchant account? <a href="{{ route('merchant.register') }}">SIGN UP</a>
            </div> --}}
            {{-- <div class="text-center pt-4 pb-3">
                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
            </div>
            <ul class="nav justify-center gx-4">
                <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
            </ul> --}}
        </div>
    </div>
@endsection

@section('auth_script')
    {{-- Sweet alert CDN --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


{{-- alert --}}

<script>
    @if (session('success'))
        swal({
          title: "Success!",
          text: "{{ session('success') }}",
          icon: "success",
          button: "OK",
        });
    @endif

    @if (session('error'))
        swal({
          title: "Error!",
          text: "{{ session('error') }}",
          icon: "error",
          button: "OK",
        });
    @endif

    @if (session('warning'))
        swal({
          title: "Warning!",
          text: "{{ session('warning') }}",
          icon: "warning",
          button: "OK",
        });
    @endif

    @if (session('message'))
        swal({
          // title: "Info!",
          text: "{{ session('message') }}",
          icon: "info",
          button: "OK",
        });
    @endif
    @if (session('delete'))
        swal({
          title: "Removed!",
          text: "{{ session('delete') }}",
          icon: "success",
          button: "OK",
        });
    @endif
</script>
@endsection