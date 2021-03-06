@extends('backend.partials.master')

@section('title')
    Parcel create | Your Express
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
        .button-calculate {

        }
        .price-div {
            text-align: -webkit-center;
            display: flex;
        }
        .price-div label {
            margin-right: 25px;
            transform: translate(0, 40%);
        }
        .text-div {
            text-align: center;
            background: #081627;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            box-shadow: 0px 0px 0px 4px #f5832b59;
        }
        .text-div h1 {
            top: 50%;
            left: 50%;
            position: relative;
            transform: translate(-50%, -50%);
            font-size: 30px;
            font-weight: 900;
            color: #fff;
        }
        @media (max-width: 768px) {
            .price-div {
                margin: 20px 0;
            }
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
                                <h3 class="nk-block-title page-title">Create Parcel</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Add new Parcel for <b>{{ Auth::user()->company }}</b></p>
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
                                                <a href="{{ route('parcels.index') }}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    <em class="icon ni ni-eye"></em>
                                                </a>
                                                <a href="{{ route('parcels.index') }}" class="btn btn-primary d-none d-md-inline-flex btn-sm">
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
                                            <form action="{{ route('parcels.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row ml-2 mr-2">
                                                    <div class="small-txt col-md-12 mb-2">
                                                        <small class="font-italic text-soft">The field labels marked with * are required input fields.</small>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="form-label">Merchant<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control @error('merchant_id') is-invalid @enderror" id="select2_merchant" name="merchant_id" data-search="on" data-placeholder="Choose a merchant for create parcel">
                                                                    <option></option>
                                                                    @foreach (App\Merchant::all() as $merchant)
                                                                        <option value="{{ $merchant->id}}">{{ $merchant->name }} <small>({{ $merchant->company }})</small></option>
                                                                    @endforeach
                                                                </select>
                                                                @error('merchant_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="mb-2">Parcel Information</h5>
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Product<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('product') is-invalid @enderror" id="product" name="product" placeholder="abc" >
                                                                @error('product')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="merchant_inv">Merchant INV no.<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('merchant_inv') is-invalid @enderror" id="merchant_inv" name="merchant_inv" placeholder="0123456789" >
                                                                @error('merchant_inv')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="pickup_address">Pickup Address<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control @error('pickup_address') is-invalid @enderror" id="pickup_address" name="pickup_address" placeholder="123 Pickup Address" rows="2"></textarea>
                                                                @error('pickup_address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group">
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
                                                        </div> --}}
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label" for="amount">Amount <small>(COD amount for the product)</small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" class="form-control" id="amount" name="amount" placeholder="000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #fce4d2;">
                                                        <h5 class="mb-2">Recipient Information</h5>
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Name<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('recipient_name') is-invalid @enderror" id="recipient_name" name="recipient_name" placeholder="Recipient Name">
                                                                @error('recipient_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone">Phone</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('recipient_phone') is-invalid @enderror" id="recipient_phone" name="recipient_phone" placeholder="Recipient Phone">
                                                                @error('recipient_phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">Recipient Address<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control @error('recipient_address') is-invalid @enderror" id="recipient_address" name="recipient_address" placeholder="Recipient Address" rows="2"></textarea>
                                                                @error('recipient_address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Note <small>(optional)</small></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="note" name="note" placeholder="Any notes?">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5 class="mb-2 mt-3">Billing Information</h5>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">Delivery Package<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-control @error('package_id') is-invalid @enderror" id="select2_package" name="package_id" data-search="on" data-placeholder="Choose a package for delivery">
                                                                            {{-- <option disabled selected hidden>Choose a package for delivery</option> --}}
                                                                            <option></option>
                                                                            @foreach (App\Package::all() as $package)
                                                                                <option value="{{ $package->id}}">{{ $package->name }} <small>({{ $package->area }})</small></option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('package_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="weight">Weight <small>(in kg)</small><small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="000" >
                                                                        @error('weight')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="button-calculate">
                                                                    <a onclick="calculate();" class="btn btn-md btn-primary btn-sm">Calculate Price</a>
                                                                </div> --}}
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                {{-- <div class="form-group">
                                                                    <label class="form-label" for="delivery_charge">Delivery Charge<small><span style="color: red; font-weight: bold;"> *</span></small></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control @error('delivery_price') is-invalid @enderror" id="delivery_price" name="delivery_price" placeholder="000" hidden>
                                                                        @error('delivery_price')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div> --}}
                                                                <div class="price-div">
                                                                    <label class="form-label" for="delivery_charge">Delivery Charge</label> 
                                                                    <div class="text-div">
                                                                        <h1><span id="del-price">00</span> <ex-small> tk.</ex-small></h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="delivery_price" id="delivery_price" value="">
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
            $('#select2_merchant').select2();
        });
        $(document).ready(function() {
            $('#select2_zone').select2();
        });
        $(document).ready(function() {
            $('#select2_package').select2();
        });
    </script>

{{-- delivery price calculation --}}
    <script type="text/javascript">
        // $(document).ready(function() {
            var weight = 0;
            var package_id = 0;
            
            $('#select2_package').change(function () {
                package_id = $('#select2_package').val();
                $("#weight").val(1);
                calculate();
            });
            $('#weight').change(function () {
                weight = $('#weight').val();
                calculate();
            });
            
            function calculate() {
                var delivery;
                // console.log('Package Id:'+package_id+', Weight: '+weight);
                $.get("{{ url('/parcels/pricing') }}/"+package_id,
                    function(data){
                        // console.log(data.price_1*weight);
                        if (weight <= 3) {
                            if (weight <= 1) {
                                delivery = data.price_1;
                            }
                            else if (weight <= 2) {
                                delivery = data.price_2;
                            }
                            else {
                                delivery = data.price_3;
                            }
                        } else {
                            delivery = data.price_3 + (data.price_extra*(weight-3));
                        }
                        delivery = Math.round(delivery);

                        $("#del-price").html(`<span id="del-price">`+delivery+`</span>`);
                        $("#delivery_price").val(delivery);
                });
            };
        // });
    </script>

@endsection