@extends('backend.partials.master')

@section('title')
    Merchant create | Your Express
@endsection

@section('style')
    <style type="text/css">
        .custom-control-label {
            text-transform: capitalize;
            font-size: 12px;
            line-height: 1.25rem!important;
        }
        .custom-col-div {
        	display: inline-grid;
        }
    </style>
@endsection

@section('content')
	<!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Create Merchant</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Add new Merchant for Your Express</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                        <em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <a href="{{ route('merchants.index') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                                <a href="{{ route('merchants.index') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
                                                    <em class="icon ni ni-eye"></em>
                                                    <span>view</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-xl-12 col-xxl-8">
                                <div class="card card-preview">
                                        <div class="card-inner">
                                            <form action="{{ route('merchants.store') }}" method="post" enctype="multipart/form-data">
								                @csrf
								                <div class="row ml-2 mr-2">
                                                    <div class="small-txt col-md-12 mb-2">
                                                        <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
                                                    </div>
								                    <div class="col-md-6">
                                                        <h5 class="mb-2">Personal Information</h5>
                                                        
								                        <div class="form-group">
								                            <label class="form-label" for="name">Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
								                            <div class="form-control-wrap">
								                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="abc" >
								                                @error('name')
								                                <span class="invalid-feedback" role="alert">
								                                    <strong>{{ $message }}</strong>
								                                </span>
								                                @enderror
								                            </div>
								                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone">Phone<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('name') }}" id="phone" name="phone" placeholder="0123456789" >
                                                                @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
								                        <div class="form-group">
                                                            <label class="form-label" for="email">E-mail</label>
                                                            <div class="form-control-wrap">
                                                                <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="abc@domain.com" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="identity">NID/Passport<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('identity') is-invalid @enderror" id="identity" name="identity" placeholder="NID / Passport no.">
                                                                @error('identity')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="customFile">Upload Photo</label>
                                                            <div class="form-control-wrap">
                                                                <div class="custom-file">
                                                                    <input type="file" class="form-control" id="customFile" name="photo">
                                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-bottom: 8px;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="password">Password
                                                                        <small>(no need to type)</small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="******" value="123123">
                                                                        @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="password_confirm">Confirm Password
                                                                        <small>(no need to type)</small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirm" name="password_confirmation" placeholder="******" value="123123">
                                                                        @error('password_confirm')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
								                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #fce4d2;">
                                                        <h5 class="mb-2">Company Information</h5>
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label" for="company">Company Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Compnay">
                                                                @error('company')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="website">Company Website</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="www.company-domain.com">
                                                                @error('website')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="address">Company Address<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="123 company-address">
                                                                @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="pickup">Pickup Address<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('pickup') is-invalid @enderror" id="pickup" name="pickup" placeholder="123 pickup-address">
                                                                @error('pickup')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Pickup Type<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control @error('pickup_type') is-invalid @enderror" id="select2_pickup" name="pickup_type[]" data-search="on" multiple="multiple" data-placeholder="Choose pickup type">
                                                                    <option value="Grocery">Grocery</option>
                                                                    <option value="Medical">Medical</option>
                                                                    <option value="Clothings">Clothings</option>
                                                                    <option value="Electronics">Electronics</option>
                                                                </select>
                                                                @error('pickup_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Delivery Zone<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control @error('zone') is-invalid @enderror" id="select2_zone" name="zone[]" data-search="on" multiple="multiple" data-placeholder="Choose delivery zone">
                                                                    <option value="Inside Dhaka">Inside Dhaka</option>
                                                                    <option value="Outside Dhaka">Outside Dhaka</option>
                                                                    <option value="Dhaka Suburb">Dhaka Suburb</option>
                                                                </select>
                                                                @error('zone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
								                </div>
								                <div class="row ml-2 mr-2 mb-2 mt-2">
								                    <div class="col-md-12">
								                        <div class="form-group">
								                            <button type="submit" class="btn btn-md btn-primary btn-sm">save</button>
								                        </div>
								                    </div>
								                </div>
								            </form>
                                        </div>
                                    </div>
                            </div><!-- .col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection

@section('script')
    
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