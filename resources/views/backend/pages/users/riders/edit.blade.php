@extends('backend.partials.master')

@section('title')
    Roles create | Your Express
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
                                <h3 class="nk-block-title page-title">Edit Rider</h3>
                                {{-- <div class="nk-block-des text-soft">
                                    <p>Add new Team Member for Your Express</p>
                                </div> --}}
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                        <em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <a href="{{ route('riders.index') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                                <a href="{{ route('riders.index') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
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
                                            <form action="{{ route('riders.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="row ml-2 mr-2">
                                                    <div class="col-md-12">
                                                        <div class="small-txt">
                                                            <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone">Phone</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" id="phone" name="phone" placeholder="0123456789" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" id="name" name="name" placeholder="abc" >
                                                                @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">E-mail<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="email" name="email" placeholder="abc@domain.com" >
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-bottom: 8px;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="password">Password<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="******" >
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
                                                                    <label class="form-label" for="password_confirm">Confirm Password<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirm" name="password_confirmation" placeholder="******" >
                                                                        @error('password_confirm')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label class="form-label">Assign Role<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control" id="select2_role" name="role[]" data-search="on" multiple="multiple" data-placeholder="Please assign role">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected':'' }}>{{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> --}}
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
            $('#select2_role').select2();
        });
    </script>
@endsection