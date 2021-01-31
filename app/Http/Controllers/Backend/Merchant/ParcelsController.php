<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Parcel;

use Carbon\Carbon;

use Auth;

class ParcelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:merchant');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcels = Parcel::orderBy('id', 'desc')->get();
        return view('backend.merchant.parcels.index', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.merchant.parcels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation data
        $request->validate([
            'product' => 'required|max:50',
            'merchant_inv' => 'required',
            'pickup_address' => 'required|max:100',
            'recipient_address' => 'required|max:100',
            'recipient_name' => 'required|max:100',
            'recipient_phone' => 'required|max:11',
            // 'pickup_type' => 'required',
            'package_id' => 'required',
            'amount' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        // if($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $parcelCount = Parcel::all()->count() + 1;
        $date = Carbon::now()->format('ymd');
        $pID = $date.$parcelCount;

        $parcel = new Parcel;

        $parcel->parcelID = 'PRCL'.$pID;
        $parcel->product = $request->product;
        $parcel->merchant_inv = $request->merchant_inv;
        $parcel->merchant_id = Auth::user()->id;
        $parcel->pickup_address = $request->pickup_address;
        $parcel->recipient_address = $request->recipient_address;
        $parcel->recipient_phone = $request->recipient_phone;
        $parcel->recipient_name = $request->recipient_name;
        // $parcel->pickup_type = implode(", ", $request->pickup_type);
        $parcel->package_id = $request->package_id;
        $parcel->amount = $request->amount;
        $parcel->weight = $request->weight;
        $parcel->delivery_price = $request->delivery_price;
        $parcel->status = 0;

        if ($request->note) {
            $parcel->note = $request->note;
        }

        $parcel->save();
        session()->flash('success', 'Parcel created successfully');
        return redirect()->route('merchant_parcels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parcel = Parcel::find($id);
        return view('backend.merchant.parcels.edit', compact('parcel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parcel = Parcel::find($id);

        $parcel->product = $request->product;
        $parcel->merchant_inv = $request->merchant_inv;
        $parcel->merchant_id = Auth::user()->id;
        $parcel->pickup_address = $request->pickup_address;
        $parcel->recipient_address = $request->recipient_address;
        $parcel->recipient_phone = $request->recipient_phone;
        $parcel->recipient_name = $request->recipient_name;
        $parcel->package_id = $request->package_id;
        $parcel->amount = $request->amount;
        $parcel->weight = $request->weight;
        $parcel->delivery_price = $request->delivery_price;

        if ($request->note) {
            $parcel->note = $request->note;
        }

        $parcel->save();
        session()->flash('success', 'Parcel updated successfully');
        return redirect()->route('merchant_parcels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parcel = Parcel::find($id);

        $parcel->delete();

        session()->flash('success', 'Parcel deleted successfully');
        return redirect()->back();
    }
}
