@extends('backend.merchant.partials.master')

@section('title')
    - Parcels | Your Express
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
                                <h3 class="nk-block-title page-title">Parcels</h3>
                                <div class="nk-block-des text-soft">
                                    <p>You have total {{ $parcels->count() }} Parcels</p>
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
                                                <a href="{{ route('merchant_parcels.create') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-plus"></em>
                                                </a>
                                                <a href="{{ route('merchant_parcels.create') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
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
                                                        <th class="nk-tb-col"><span class="sub-text">Parcel ID</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Merchant INV</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Product</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Recipient</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">COD Amount</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Weight <small>(in kg)</small></span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Delivery Charge</span></th>
                                                        {{-- <th class="nk-tb-col"><span class="sub-text">Phone</span></th> --}}
                                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                                        {{-- <th class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></th>
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Last Login</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th> --}}
                                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($parcels as $key => $parcel)
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                {{ $key + 1 }}
                                                            </td>
                                                            {{-- <td class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                                    <label class="custom-control-label" for="uid1"></label>
                                                                </div>
                                                            </td> --}}
                                                            <td class="nk-tb-col">
                                                                {{ $parcel->parcelID }}
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-info">
                                                                    {{ \Carbon\Carbon::parse($parcel->created_at)->format('d/m/Y')}}
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                {{ $parcel->merchant_inv }}
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                {{ $parcel->product }}
                                                            </td>
                                                            {{-- <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                                <span class="tb-amount">35040.34 <span class="currency">USD</span></span>
                                                            </td> --}}
                                                            {{-- <td class="nk-tb-col tb-col-md">
                                                                <span>+811 847-4958</span>
                                                            </td> --}}
                                                            <td class="nk-tb-col tb-col-md">
                                                                <div class="user-info">
                                                                    <span class="tb-lead"><b>{{ $parcel->recipient_name }}</b> <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    <span>
                                                                        <b>Phone: </b>{{ $parcel->recipient_phone }}<br>
                                                                        <b>Address: </b>{{ $parcel->recipient_address }}
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                {{ $parcel->amount }}
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                {{ $parcel->weight }}
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <b>{{ $parcel->delivery_price }}</b>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                @if ($parcel->status == 0)
                                                                    <span class="badge badge-dot badge-primary" style="font-size: 11px; font-weight: bold;">pending</span>
                                                                @endif
                                                                @if ($parcel->status == 1)
                                                                    <span class="badge badge-dot badge-info" style="font-size: 11px; font-weight: bold">confirm</span>
                                                                @endif
                                                                @if ($parcel->status == 2)
                                                                    <span class="badge badge-dot badge-warning" style="font-size: 11px; font-weight: bold">processing</span>
                                                                @endif
                                                                @if ($parcel->status == 3)
                                                                    <span class="badge badge-dot badge-dark" style="font-size: 11px; font-weight: bold">sent to ship</span>
                                                                @endif
                                                                @if ($parcel->status == 4)
                                                                    <span class="badge badge-dot badge-success" style="font-size: 11px; font-weight: bold">Done</span>
                                                                @endif
                                                                @if ($parcel->status == 8)
                                                                    <span class="badge badge-dot badge-secondary" style="font-size: 11px; font-weight: bold">rescheduled</span>
                                                                @endif
                                                                @if ($parcel->status == 9)
                                                                    <span class="badge badge-dot badge-danger" style="font-size: 11px; font-weight: bold">returned</span>
                                                                @endif
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
                                                            <td class="nk-tb-col text-center">
                                                                {{-- @if ($parcel->status == 0)
                                                                    <a href="{{ url('/parcels/status', $parcel->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Mark as Active">
                                                                        <em class="icon ni ni-check-circle-cut" style="color: #1ee0ac;"></em>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('/parcels/status', $parcel->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Ban Merchant">
                                                                        <em class="icon ni ni-cross-circle" style="color: #e85347;"></em>
                                                                    </a>
                                                                @endif --}}
                                                                
                                                                <a href="{{ route('merchant_parcels.edit', $parcel->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit Parcel">
                                                                    <em class="icon ni ni-edit"></em>
                                                                </a>
                                                                <span data-target="#deleteModal{{ $parcel->id }}" data-toggle="modal">
                                                                	<a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete Parcel">
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
				                                        <div class="modal fade" tabindex="-1" id="deleteModal{{ $parcel->id }}">
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
				                                                        <form action="{{ route('merchant_parcels.destroy', $parcel->id) }}" method="post">
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