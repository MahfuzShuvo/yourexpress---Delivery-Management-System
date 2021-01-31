@extends('backend.partials.master')

@section('title')
    Parcels - {{ $parcel->parcelID }} | Your Express
@endsection

@section('style')
    <style type="text/css">
        .custom-control-label {
            text-transform: capitalize;
            font-size: 12px;
        }
        .nk-tb-col {
		    position: relative;
		    display: table-cell;
		    vertical-align: middle;
		    padding: .3rem .5rem!important;
		    border-bottom: none!important;
		    font-size: 12px;
		}
        .root-parcel {
          padding: 1rem;
          border-radius: 5px;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        figure {
          display: flex;
        }
        figure img {
          width: 8rem;
          height: 8rem;
          border-radius: 15%;
          border: 1.5px solid #f05a00;
          margin-right: 1.5rem;
          padding:1rem;
        }
        figure figcaption {
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;
        }
        /*figure figcaption h4 {
          font-size: 1.4rem;
          font-weight: 500;
        }
        figure figcaption h6 {
          font-size: 1rem;
          font-weight: 300;
        }
        figure figcaption h2 {
          font-size: 1.6rem;
          font-weight: 500;
        }*/

        .order-track {
            /* margin-top: 2rem; */
            padding: 0 1rem;
            border-top: 1px dashed #2c3e50;
            padding-top: 1rem;
            display: flex;
            flex-direction: column;
        }
        .order-track-step {
          display: flex;
          height: 4rem;
        }
        .order-track-step:last-child {
          overflow: hidden;
          height: 4rem;
        }
        .order-track-step:last-child .order-track-status span:last-of-type {
          display: none;
        }
        .order-track-status {
          margin-right: 1.5rem;
          position: relative;
        }
        .order-track-status-dot {
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #f05a00;
        }
        .order-track-status-line {
          display: block;
          margin: 0 auto;
          width: 2px;
          height: 4rem;
          background: #f05a00;
        }
        .order-track-text-stat {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 0px;
        }
        .order-track-text-sub {
          font-size: 11px;
          font-weight: 400;
          color: #8094ae;
        }
        .order-track-text {
            margin-top: -5px;
        }
        .order-track {
          transition: all .3s height 0.3s;
          transform-origin: top center;
        }
        .status-action {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 8px;
        }
        .status-action a:last-child {
            grid-column: 1 / 3;
        }
        .status-action a {
            justify-content: center;
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
                                <h3 class="nk-block-title page-title">Parcel {{-- <ex-small>( <span style="color: #f5832b;">{{ $parcel->parcelID }}</span> )</ex-small> --}}</h3>
                                {{-- <div class="nk-block-des text-soft">
                                    <p>
                                    	@if ($parcel->status == 0)
                                            <span class="badge badge-dot badge-primary" style="font-size: 11px; font-weight: bold;">Created</span>
                                        @endif
                                        @if ($parcel->status == 1)
                                            <span class="badge badge-dot badge-info" style="font-size: 11px; font-weight: bold">Confirm</span>
                                        @endif
                                        @if ($parcel->status == 2)
                                            <span class="badge badge-dot badge-warning" style="font-size: 11px; font-weight: bold">Processing</span>
                                        @endif
                                        @if ($parcel->status == 3)
                                            <span class="badge badge-dot badge-dark" style="font-size: 11px; font-weight: bold">Shipping</span>
                                        @endif
                                        @if ($parcel->status == 4)
                                            <span class="badge badge-dot badge-success" style="font-size: 11px; font-weight: bold">Done</span>
                                        @endif
                                        @if ($parcel->status == 8)
                                            <span class="badge badge-dot badge-secondary" style="font-size: 11px; font-weight: bold">Rescheduled</span>
                                        @endif
                                        @if ($parcel->status == 9)
                                            <span class="badge badge-dot badge-danger" style="font-size: 11px; font-weight: bold">Returned</span>
                                        @endif
                                    </p>
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
                                                <a href="{{ route('parcels.index') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                                <a href="{{ route('parcels.index') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
                                                    <em class="icon ni ni-eye"></em>
                                                    <span>view all</span>
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
                                    	<div class="row">
                                    		<div class="col-md-4">
                                    			<div class="mb-5">
                                                    <div class="root-parcel">
                                                        <figure>
                                                            <img src="{{ asset('public/assets/images/parcel.jpg') }}" style="box-shadow: 1px 1px 7px #00000026;">
                                                            <figcaption>
                                                            <h5>Parcel Tracking</h5>
                                                            <p><b>Parcel ID:</b> {{ $parcel->parcelID }}</p>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="order-track">
                                                            {{-- @switch($parcel->status)
                                                                @case(0)
                                                                    <div class="order-track-step">
                                                                        <div class="order-track-status">
                                                                            <span class="order-track-status-dot"></span>
                                                                            <span class="order-track-status-line"></span>
                                                                        </div>
                                                                        <div class="order-track-text">
                                                                            <p class="order-track-text-stat">Parcel Created</p>
                                                                            <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    @break
                                                                @case(1)
                                                                    <div class="order-track-step">
                                                                        <div class="order-track-status">
                                                                            <span class="order-track-status-dot"></span>
                                                                            <span class="order-track-status-line"></span>
                                                                        </div>
                                                                        <div class="order-track-text">
                                                                            <p class="order-track-text-stat">Parcel Created</p>
                                                                            <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="order-track-step">
                                                                        <div class="order-track-status">
                                                                            <span class="order-track-status-dot"></span>
                                                                            <span class="order-track-status-line"></span>
                                                                        </div>
                                                                        <div class="order-track-text">
                                                                            <p class="order-track-text-stat">Processing</p>
                                                                            <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    @break
                                                                @case(2)
                                                                    <div class="order-track-step">
                                                                        <div class="order-track-status">
                                                                            <span class="order-track-status-dot"></span>
                                                                            <span class="order-track-status-line"></span>
                                                                        </div>
                                                                        <div class="order-track-text">
                                                                            <p class="order-track-text-stat">Parcel Created</p>
                                                                            <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="order-track-step">
                                                                        <div class="order-track-status">
                                                                            <span class="order-track-status-dot"></span>
                                                                            <span class="order-track-status-line"></span>
                                                                        </div>
                                                                        <div class="order-track-text">
                                                                            <p class="order-track-text-stat">Processing</p>
                                                                            <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="order-track-step">
                                                                        <div class="order-track-status">
                                                                            <span class="order-track-status-dot"></span>
                                                                            <span class="order-track-status-line"></span>
                                                                        </div>
                                                                        <div class="order-track-text">
                                                                            <p class="order-track-text-stat">Shipping</p>
                                                                            <span class="order-track-text-sub">1st November, 2019</span>
                                                                        </div>
                                                                    </div>
                                                                    @break
                                                                @case(3)
                                                                    First case...
                                                                    @break
                                                                @case(4)
                                                                    First case...
                                                                    @break
                                                                @case(5)
                                                                    First case...
                                                                    @break

                                                                @default
                                                                        Oops!! Something went wrong ...
                                                            @endswitch --}}
                                                            
                                                            @if ($parcel->status >= 0)
                                                                <div class="order-track-step">
                                                                    <div class="order-track-status">
                                                                        <span class="order-track-status-dot"></span>
                                                                        <span class="order-track-status-line"></span>
                                                                    </div>
                                                                    <div class="order-track-text">
                                                                        <p class="order-track-text-stat">Parcel Created</p>
                                                                        <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($parcel->status >= 1)
                                                                <div class="order-track-step">
                                                                    <div class="order-track-status">
                                                                        <span class="order-track-status-dot"></span>
                                                                        <span class="order-track-status-line"></span>
                                                                    </div>
                                                                    <div class="order-track-text">
                                                                        <p class="order-track-text-stat">Processing</p>
                                                                        <span class="order-track-text-sub">{{ \Carbon\Carbon::parse($parcel->created_at)->format('jS F, Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($parcel->status >= 2)
                                                                <div class="order-track-step">
                                                                    <div class="order-track-status">
                                                                        <span class="order-track-status-dot"></span>
                                                                        <span class="order-track-status-line"></span>
                                                                    </div>
                                                                    <div class="order-track-text">
                                                                        <p class="order-track-text-stat">Shipping - <small>(TTD: {{ \Carbon\Carbon::parse(App\Shipping::where('parcel_id', $parcel->id)->orderBy('id', 'desc')->first()->time)->format('jS F, Y') }})</small></p>
                                                                        <span class="order-track-text-sub">{{ \Carbon\Carbon::parse(App\Shipping::where('parcel_id', $parcel->id)->orderBy('id', 'desc')->first()->created_at)->format('jS F, Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($parcel->status == 4)
                                                                <div class="order-track-step">
                                                                    <div class="order-track-status">
                                                                        <span class="order-track-status-dot"></span>
                                                                        <span class="order-track-status-line"></span>
                                                                    </div>
                                                                    <div class="order-track-text">
                                                                        <p class="order-track-text-stat">Returned</p>
                                                                        <span class="order-track-text-sub">3rd November, 2019</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($parcel->status == 3)
                                                                <div class="order-track-step">
                                                                    <div class="order-track-status">
                                                                        <span class="order-track-status-dot"></span>
                                                                        <span class="order-track-status-line"></span>
                                                                    </div>
                                                                    <div class="order-track-text">
                                                                        <p class="order-track-text-stat">Rescheduled - {{ \Carbon\Carbon::parse(App\Reschedule::where('parcel_id', $parcel->id)->orderBy('id', 'desc')->first()->time)->format('jS F, Y') }}</p>
                                                                        <span class="order-track-text-sub">{{ \Carbon\Carbon::parse(App\Reschedule::where('parcel_id', $parcel->id)->orderBy('id', 'desc')->first()->created_at)->format('jS F, Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($parcel->status == 5)
                                                                <div class="order-track-step">
                                                                    <div class="order-track-status">
                                                                        <span class="order-track-status-dot"></span>
                                                                        <span class="order-track-status-line"></span>
                                                                    </div>
                                                                    <div class="order-track-text">
                                                                        <p class="order-track-text-stat">Delivered</p>
                                                                        <span class="order-track-text-sub">3rd November, 2019</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                    				
                                    			</div>
                                    			<div class="status-action">
                                                    @switch($parcel->status)
                                                        @case(0)
                                                            <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm">Mark as Confirm</a>
                                                            <a href="{{ url('/parcels/status_ship', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Sent to Shipping</a>
                                                            <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Rescedule</a>
                                                            <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                            <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                            @break
                                                        @case(1)
                                                            <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Mark as Confirm</a>
                                                            <a data-toggle="modal" href="#shippingModal{{ $parcel->id }}" class="btn btn-secondary btn-sm">Sent to Shipping</a>
                                                            <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Rescedule</a>
                                                            <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                            <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                            @break
                                                        @case(2)
                                                            <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Mark as Confirm</a>
                                                            <a href="{{ url('/parcels/status_ship', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Sent to Shipping</a>
                                                            <a data-toggle="modal" href="#recheduleModal{{ $parcel->id }}" class="btn btn-secondary btn-sm">Rescedule</a>
                                                            <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm">Return</a>
                                                            <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm">Delivery Done</a>
                                                            @break
                                                        @case(3)
                                                            <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Mark as Confirm</a>
                                                            <a data-toggle="modal" href="#shippingModal{{ $parcel->id }}" class="btn btn-secondary btn-sm">Sent to Shipping</a>
                                                            <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Rescedule</a>
                                                            <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                            <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                            @break
                                                        @case(4)
                                                            <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Mark as Confirm</a>
                                                            <a href="{{ url('/parcels/status_ship', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Sent to Shipping</a>
                                                            <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Rescedule</a>
                                                            <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                            <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                            @break
                                                        @case(5)
                                                            <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Mark as Confirm</a>
                                                            <a href="{{ url('/parcels/status_ship', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Sent to Shipping</a>
                                                            <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Rescedule</a>
                                                            <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                            <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                            @break

                                                        @default
                                                                Oops!! Something went wrong ...
                                                    @endswitch

                                                    <!-- rechedule Modal start -->
                                                        <div class="modal fade" tabindex="-1" id="recheduleModal{{ $parcel->id }}">
                                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                                <div class="modal-content">
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Reschedule</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ url('/parcels/status_reschedule', $parcel->id) }}" method="post" class="form-validate is-alter">
                                                                            @csrf
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="default-06">Time<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                                <div class="form-control-wrap">
                                                                                    <div class="form-icon form-icon-left">
                                                                                        <em class="icon ni ni-calendar"></em>
                                                                                    </div>
                                                                                    <input type="text" class="form-control date-picker @error('time') is-invalid @enderror" data-date-format="yyyy-mm-dd" name="time" placeholder="yyyy-mm-dd">
                                                                                    @error('time')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="form-control-wrap">
                                                                                    <label class="form-label" for="default-06">Note<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                                    <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" placeholder="Reschedule note">
                                                                                    @error('note')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-md btn-primary">save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- rechedule Modal end -->

                                                        <!-- shipping Modal start -->
                                                        <div class="modal fade" tabindex="-1" id="shippingModal{{ $parcel->id }}">
                                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                                <div class="modal-content">
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Sent to Shipping</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ url('/parcels/status_ship', $parcel->id) }}" method="post" class="form-validate is-alter">
                                                                            @csrf

                                                                            <div class="form-group">
                                                                                <label class="form-label">Assign Rider<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                                <div class="form-control-wrap">
                                                                                    <select class="form-control @error('rider_id') is-invalid @enderror" id="select2_rider" name="rider_id" data-search="on" data-placeholder="Choose a rider">
                                                                                        <option></option>
                                                                                        @foreach (App\User::all() as $rider)
                                                                                            @foreach ($rider->roles as $r)
                                                                                                @if ($r->name == 'Rider')
                                                                                                    <option value="{{ $rider->id}}">{{ $rider->name }}</option>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('rider_id')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="default-06">Time to deliver<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                                <div class="form-control-wrap">
                                                                                    <div class="form-icon form-icon-left">
                                                                                        <em class="icon ni ni-calendar"></em>
                                                                                    </div>
                                                                                    <input type="text" class="form-control date-picker @error('time') is-invalid @enderror" data-date-format="yyyy-mm-dd" name="time" placeholder="yyyy-mm-dd">
                                                                                    @error('time')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-md btn-primary">save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- shipping Modal end -->
                                                    
                                    				{{-- @if ($parcel->status == 0)
                                                        <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm">Mark as Confirm</a>
                                                    @else
                                                        <a href="{{ url('/parcels/status_confirm', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Mark as Confirm</a>
                                                    @endif
                                    				@if ($parcel->status == 1 && $parcel->status == 3)
                                                        <a href="{{ url('/parcels/status_ship', $parcel->id) }}" class="btn btn-secondary btn-sm">Sent to Shipping</a>
                                                    @else 
                                                        <a href="{{ url('/parcels/status_ship', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Sent to Shipping</a>
                                                    @endif
                                    				@if ($parcel->status == 2)
                                                        <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm">Rescedule</a>
                                                        <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm">Return</a>
                                                        <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm">Delivery Done</a>
                                                    @else
                                                        <a href="{{ url('/parcels/status_reschedule', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Rescedule</a>
                                                        <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                        <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                    @endif
                                                    @if ($parcel->status == 3)
                                                        <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm">Return</a>
                                                        <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm">Delivery Done</a>
                                                    @else
                                                        <a href="{{ url('/parcels/status_return', $parcel->id) }}" class="btn btn-secondary btn-sm disabled">Return</a>
                                                        <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                    @endif --}}
                                    				
                                                    {{-- @if ($parcel->status == 4)
                                                        <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm disabled">Delivery Done</a>
                                                    @else
                                                        <a href="{{ url('/parcels/status_done', $parcel->id) }}" class="btn btn-primary btn-sm">Delivery Done</a>
                                                    @endif --}}
                                    			</div>
                                    		</div>
                                    		<div class="col-md-8">
                                    			<div class="row">
                                    				<div class="col-md-4">
                                    					<h5 class="mb-2">Product Information</h5>
		                                    			<table class="nk-tb-list nk-tb-ulist">
		                                    				<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Invoice</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->merchant_inv }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Name</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->product }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Amount <small>(COD)</small></td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->amount }} &#2547;</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Weight</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->weight }} kg</td>
															</tr>
		                                    			</table>
                                    				</div>
                                    				<div class="col-md-4">
                                    					<h5 class="mb-2">Merchant Information</h5>
		                                    			<table class="nk-tb-list nk-tb-ulist">
		                                    				<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">ID</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->merchant->merchantID }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Name</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->merchant->name }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Company</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->merchant->company }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Phone</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->merchant->phone }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Email</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->merchant->email }}</td>
															</tr>
		                                    			</table>
                                    				</div>
                                    				<div class="col-md-4">
                                    					<h5 class="mb-2">Recipient Information</h5>
		                                    			<table class="nk-tb-list nk-tb-ulist">
		                                    				<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Name</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->recipient_name }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Phone</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->recipient_phone }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Address</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->recipient_address }}</td>
															</tr>
		                                    			</table>
                                    				</div>
                                    				<div class="col-md-6">
                                    					<h5 class="mb-2">Parcel Information</h5>
		                                    			<table class="nk-tb-list nk-tb-ulist">
		                                    				<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Parcel ID</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->parcelID }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Pickup Address</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->pickup_address }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Package</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->package->name }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Zone</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->package->area }}</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">Delivery Charge</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    <td class="nk-tb-col">{{ $parcel->delivery_price }} &#2547;</td>
															</tr>
															<tr class="nk-tb-item">
															    <td class="nk-tb-col" style="font-weight: bold;">**Note</td>
															    <td class='nk-tb-col' style="font-weight: bold;">:</td>
															    @if ($parcel->note)
															    	<td class="nk-tb-col">{{ $parcel->note }}</td>
															    @else
															    	<td class="nk-tb-col">N / A</td>
															    @endif
															</tr>
		                                    			</table>
                                    				</div>
                                    			</div>
                                    		</div>
                                    	</div>
                                    </div>
                                </div>
                            </div>
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

        $(document).ready(function() {
            $('#select2_rider').select2();
        });
    </script>

   
@endsection