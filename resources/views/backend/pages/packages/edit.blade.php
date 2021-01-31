@extends('backend.partials.master')

@section('title')
    Package edit | Your Express
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
                                <h3 class="nk-block-title page-title">Edit package <span>( <ex-small style="color: #f5832b;">{{ $package->name }}</ex-small> )</span></h3>
                                <div class="nk-block-des text-soft">
                                    <p><b>Delivery Area: </b>{{ $package->area }}</p>
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
                                            <form action="{{ route('packages.update', $package->id) }}" method="post" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="row ml-2 mr-2">
                                                    {{-- <div class="small-txt col-md-12 mb-2">
                                                        <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
                                                    </div> --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <label class="form-label" for="schedule">Schedule for Delivery <small>(in Hrs)</small></label>
                                                        <div class="form-control-wrap">
                                                            <input type="schedule" class="form-control" value="{{ $package->schedule }}" id="schedule" name="schedule" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="price_1">Price up to 1 kg <small>(&#2547;)</small></label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="price_1" name="price_1" value="{{ $package->price_1 }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="price_2">Price up to 2 kg <small>(&#2547;)</small></label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="price_2" name="price_2" value="{{ $package->price_2 }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="price_3">Price up to 3 kg <small>(&#2547;)</small></label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="price_3" name="price_3" value="{{ $package->price_3 }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="price_extra">Price over 3 kg <small>(&#2547;/kg)</small></label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="price_extra" name="price_extra" value="{{ $package->price_extra }}">
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row ml-2 mr-2 mb-2 mt-2">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-md btn-primary btn-sm">update</button>
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