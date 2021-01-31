@extends('backend.partials.master')

@section('title')
    Package create | Your Express
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
                                <h3 class="nk-block-title page-title">Create Package</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Add new Package for Your Express</p>
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
                                                <a href="{{ route('packages.index') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                                <a href="{{ route('packages.index') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
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
                                            <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
								                @csrf
								                <div class="row ml-2 mr-2">
                                                    <div class="small-txt col-md-12 mb-2">
                                                        <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
                                                    </div>
								                    <div class="col-md-12">
                                                        {{-- <h5 class="mb-2">Personal Information</h5> --}}
                                                        
								                        <div class="form-group">
								                            <label class="form-label" for="name">Package Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
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
                                                            <label class="form-label" for="area">Area to delivery<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('area') is-invalid @enderror" value="{{ old('name') }}" id="area" name="area" placeholder="Inside Dhaka, Outside Dhaka, ... " >
                                                                @error('area')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
								                        <div class="form-group">
                                                            <label class="form-label" for="schedule">Schedule for Delivery <small>(in Hrs)</small><small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="schedule" class="form-control @error('schedule') is-invalid @enderror" value="{{ old('schedule') }}" id="schedule" name="schedule" placeholder="24, 48-72, ..." >
                                                                @error('schedule')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price_1">Price up to 1 kg <small>(&#2547;)</small><small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control @error('price_1') is-invalid @enderror" id="price_1" name="price_1" placeholder="00">
                                                                        @error('price_1')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price_2">Price up to 2 kg <small>(&#2547;)</small><small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control @error('price_2') is-invalid @enderror" id="price_2" name="price_2" placeholder="00">
                                                                        @error('price_2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price_3">Price up to 3 kg <small>(&#2547;)</small><small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control @error('price_3') is-invalid @enderror" id="price_3" name="price_3" placeholder="00">
                                                                        @error('price_3')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price_extra">Price over 3 kg <small>(&#2547;/kg)</small><small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control @error('price_extra') is-invalid @enderror" id="price_extra" name="price_extra" placeholder="00">
                                                                        @error('price_extra')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
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