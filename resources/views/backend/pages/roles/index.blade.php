@extends('backend.partials.master')

@section('title')
    Roles | Your Express
@endsection

@section('style')
    <style type="text/css">
        .custom-control-label {
            text-transform: capitalize;
            font-size: 12px;
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
                                <h3 class="nk-block-title page-title">Role Lists</h3>
                                <div class="nk-block-des text-soft">
                                    <p>You have total {{ $roles->count() }} roles</p>
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
                                                <a href="{{ route('roles.create') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-plus"></em>
                                                </a>
                                                <a href="{{ route('roles.create') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
                                                    <em class="icon ni ni-plus"></em>
                                                    <span>Add</span>
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
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                        {{-- <th class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                                <label class="custom-control-label" for="uid"></label>
                                                            </div>
                                                        </th> --}}
                                                        <th class="nk-tb-col"><span class="sub-text">#</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Roles</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Permissions</span></th>
                                                        {{-- <th class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></th>
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Last Login</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th> --}}
                                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roles as $key => $role)
                                                        <tr class="nk-tb-item">
                                                            {{-- <td class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                                    <label class="custom-control-label" for="uid1"></label>
                                                                </div>
                                                            </td> --}}
                                                            {{-- <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                        <span>AB</span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <span class="tb-lead">Abu Bin Ishtiyak <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                        <span>info@softnio.com</span>
                                                                    </div>
                                                                </div>
                                                            </td> --}}
                                                            {{-- <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                                <span class="tb-amount">35040.34 <span class="currency">USD</span></span>
                                                            </td> --}}
                                                            {{-- <td class="nk-tb-col tb-col-md">
                                                                <span>+811 847-4958</span>
                                                            </td> --}}
                                                            <td class="nk-tb-col" style="width: 10%;">
                                                                {{ $key + 1 }}
                                                            </td>
                                                            <td class="nk-tb-col" style="width: 20%;">
                                                                {{ ucfirst($role->name) }}
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md" style="white-space: normal; width: 50%;">
                                                        		@foreach ($role->permissions as $perm)
                                                                	@if (Str::contains($perm->name, 'view'))
                                                                		<span class="badge badge-outline-success badge-dim">{{ $perm->name }}</span>
                                                                	@elseif (Str::contains($perm->name, 'edit'))
                                                                		<span class="badge badge-outline-warning badge-dim">{{ $perm->name }}</span>
                                                                	@elseif (Str::contains($perm->name, 'create'))
                                                                		<span class="badge badge-outline-primary badge-dim">{{ $perm->name }}</span>
                                                                	@elseif (Str::contains($perm->name, 'delete'))
                                                                		<span class="badge badge-outline-danger badge-dim">{{ $perm->name }}</span>
                                                                	@else
                                                                		<span class="badge badge-outline-info badge-dim">{{ $perm->name }}</span>
                                                                	@endif
                                                                @endforeach
                                                            </td>
                                                            {{-- <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                                <ul class="list-status">
                                                                    <li><em class="icon text-success ni ni-check-circle"></em> <span>Email</span></li>
                                                                    <li><em class="icon ni ni-alert-circle"></em> <span>KYC</span></li>
                                                                </ul>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <span>05 Oct 2019</span>
                                                            </td> --}}
                                                            <td class="nk-tb-col text-center" style="width: 20%;">
                                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit Role">
                                                                    <em class="icon ni ni-edit"></em>
                                                                </a>
                                                                <span data-target="#deleteModal{{ $role->id }}" data-toggle="modal">
                                                                	<a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete Role">
                                                                    <em class="icon ni ni-trash"></em>
                                                                </a>
                                                                </span>
                                                                
                                                            </td>
                                                            {{-- <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Wallet">
                                                                            <em class="icon ni ni-wallet-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                            <em class="icon ni ni-mail-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                                                    <li class="divider"></li>
                                                                                    <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td> --}}
                                                        </tr><!-- .nk-tb-item  -->

                                                        <!-- Delete Modal start -->
				                                        <div class="modal fade" tabindex="-1" id="deleteModal{{ $role->id }}">
				                                            <div class="modal-dialog modal-dialog-top" role="document">
				                                                <div class="modal-content">
				                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                        <em class="icon ni ni-cross"></em>
				                                                    </a>
				                                                    <div class="modal-header">
				                                                        <h6 class="modal-title">Are you sure to delete?</h6>
				                                                    </div>
				                                                    {{-- <div class="modal-body">
				                                                        
				                                                    </div> --}}
				                                                    <div class="modal-footer">
				                                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
				                                                        	@method('delete')
				                                                            {{ csrf_field() }}
				                                                            <button type="submit" class="btn btn-info btn-sm" style="font-size: 13px;">YES, delete permanently</button>
				                                                        </form>
				                                                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
				                                                    </div>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <!-- Delete Modal end -->
                                                    @endforeach
                                                </tbody>
                                            </table>
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
        $("#permissionCheckAll_1").click(function () {
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