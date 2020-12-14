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
                                <h3 class="nk-block-title page-title">Create Role</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Add new roles for Your Express</p>
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
                                                <a href="{{ route('roles.index') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                                <a href="{{ route('roles.index') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
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
                                            <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
								                @csrf
								                <div class="row ml-2 mr-2">
								                    <div class="col-md-12">
								                        <div class="small-txt">
								                            <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
								                        </div>
								                        <div class="form-group">
								                            <label class="form-label" for="default-06">Role Name</label><span style="color: red; font-weight: bold;"> *</span>
								                            <div class="form-control-wrap">
								                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Enter a role name" >
								                                @error('name')
								                                <span class="invalid-feedback" role="alert">
								                                    <strong>{{ $message }}</strong>
								                                </span>
								                                @enderror
								                            </div>
								                        </div>
								                        <div class="form-group">
								                            <label class="form-label" for="default-06">Permissions</label><span style="color: red; font-weight: bold;"> *</span>
								                            <div class="form-control-wrap">
								                                <div class="custom-control custom-control-sm custom-checkbox" style="font-weight: bold;">
								                                    <input type="checkbox" class="custom-control-input" id="permissionCheckAll" value="1">
								                                    <label class="custom-control-label" for="permissionCheckAll">All</label>
								                                </div>
								                                <hr>

								                                @php $i = 1; @endphp
								                                <div class="row">
								                                	@foreach (App\User::getPermissionGroups() as $group)
								                                    	<div class="col-md-6">
									                                		<div class="row">
										                                        <div class="col-3">
										                                            <div class="custom-control custom-control-sm custom-checkbox" style="font-weight: bold;">
										                                                <input type="checkbox" class="custom-control-input" id="{{ $i }}Management" value="{{ $group->group_name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
										                                                <label class="custom-control-label" for="{{ $i }}Management">{{ $group->group_name }}</label>
										                                            </div>
										                                        </div>

										                                        <div class="col-9 role-{{ $i }}-management-checkbox custom-col-div">
										                                            @php
										                                                $permissions = App\User::getpermissionsByGroupName($group->group_name);
										                                                $j = 1;
										                                            @endphp
										                                            @foreach ($permissions as $permission)
										                                                <div class="custom-control custom-control-sm custom-checkbox">
										                                                    <input type="checkbox" class="custom-control-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
										                                                    <label class="custom-control-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
										                                                </div>
										                                                @php  $j++; @endphp
										                                            @endforeach
										                                            <br>
										                                        </div>
										                                    </div>
									                                	</div>
									                                    @php  $i++; @endphp
									                                @endforeach
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
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('.bd-example-modal-lg').modal('show');
        @endif
    </script>

    {{-- check all permission --}}
    <script type="text/javascript">
        $("#permissionCheckAll").click(function () {
            if ($(this).is(':checked')) {
                // check all
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // uncheck all
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');

            // console.log(classCheckBox);
            if(groupIdName.is(':checked')){
                // check all by group name
                classCheckBox.prop('checked', true);
            }else{
                // uncheck all by group name
                classCheckBox.prop('checked', false);
            }
        };
    </script>
@endsection