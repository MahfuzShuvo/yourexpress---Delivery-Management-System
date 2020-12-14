{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
@endsection --}}


@extends('backend.merchant.auth.auth_master')

@section('auth_style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <style type="text/css">
        .error-cls {
            background: #e85347;
            border-radius: 3px;
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
@endsection

@section('auth_content')
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Merchant Register</h4>
                    <div class="nk-block-des">
                        <p style="font-size: 12px;">Create an account as Merchant</p>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="mb-4">
                    @foreach ($errors->all() as $error)
                         <span class="error-cls">
                            <small><strong style="color: #fff;">** {{ $error }}</strong></small><br>
                        </span>
                     @endforeach
                </div>
            @endif

            <form action="{{ route('merchant.register.submit') }}" class="nk-wizard nk-wizard-simple is-alter" id="formReg" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="nk-wizard-head">
                    <h5>First Step</h5>
                </div>
                <div class="small-txt">
                    <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
                </div>
                <div class="nk-wizard-content">
                    <div class="form-group">
                        <label class="form-label" for="name">Merchant Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-user" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="text" data-msg="Merchant name required" class="form-control required" id="name" name="name" placeholder="Merchant">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company">Company Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-home" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="text" data-msg="Compnay name required" class="form-control required" id="company" name="company" placeholder="Compnay">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="website">Company Website</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-link" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="text" data-msg="Company website required" class="form-control required" id="website" name="website" placeholder="www.company-domain.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address">Company Address<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-map-pin" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="text" data-msg="Company address required" class="form-control required" id="address" name="address" placeholder="123 company-address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pickup">Pickup Address<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-location" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="text" data-msg="Pickup address required" class="form-control required" id="pickup" name="pickup" placeholder="123 pickup-address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pickup Type<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <select class="form-control required" data-msg="Pickup type required" id="select2_pickup" name="pickup_type[]" data-search="on" multiple="multiple" data-placeholder="Choose pickup type">
                                <option value="Grocery">Grocery</option>
                                <option value="Medical">Medical</option>
                                <option value="Clothings">Clothings</option>
                                <option value="Electronics">Electronics</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Delivery Zone<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <select class="form-control required" data-msg="Delivery zone required" id="select2_zone" name="zone[]" data-search="on" multiple="multiple" data-placeholder="Choose delivery zone">
                                <option value="Inside Dhaka">Inside Dhaka</option>
                                <option value="Outside Dhaka">Outside Dhaka</option>
                                <option value="Dhaka Suburb">Dhaka Suburb</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="nk-wizard-head">
                    <h5>Second Step</h5>
                </div>
                <div class="nk-wizard-content">
                    <div class="form-group">
                        <label class="form-label" for="customFile">Upload Merchant's Photo<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" data-msg="Valid merchant photo required" class="form-control required" id="customFile" name="photo">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="identity">NID/Passport<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-toolbar" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="text" data-msg="NID or Passport number required" class="form-control required" id="identity" name="identity" placeholder="NID / Passport no.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Contact Number<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-call" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="tel" data-msg="A valid phone number required" class="form-control required" id="phone" name="phone" placeholder="Contact number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">E-mail</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-mail" style="color: #b7c2d0;"></em>
                            </div>
                            <input type="email" data-msg="Required" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    
                </div>
                <div class="nk-wizard-head">
                    <h5>Third Step</h5>
                </div>
                <div class="nk-wizard-content">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="password">Password<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-lock-alt" style="color: #b7c2d0;"></em>
                                    </div>
                                    <input type="password" data-msg="Required" class="form-control required" id="password" name="password">
    
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="password-confirm">Re-Password<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-lock-alt" style="color: #b7c2d0;"></em>
                                    </div>
                                    <input type="password" data-msg="Required" class="form-control required" id="password-confirm" name="password_confirmation">
    
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" data-msg="Required" class="custom-control-input custom-control-sm required" name="fw-policy" id="fw-policy">
                                <label class="custom-control-label" for="fw-policy">
                                    <small>
                                        I agreed all the <a href="#">Terms and condition</a> of Your Express
                                    </small>
                                </label>
                            </div>
                        </div>
                    </div><!-- .row -->
                </div>
                
            </form>
            <div class="form-note-s2 text-center pt-4"> Already have a merchant account? <a href="{{ route('merchant.login') }}">SIGN IN</a>
            </div>
        </div>
    </div>
@endsection

@section('auth_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select2_pickup').select2();
        });
        $(document).ready(function() {
            $('#select2_zone').select2();
        });
    </script>
    
@endsection