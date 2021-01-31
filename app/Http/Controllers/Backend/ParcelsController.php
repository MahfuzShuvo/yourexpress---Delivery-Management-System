<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Parcel;
use App\Package;
use App\Reschedule;
use App\Shipping;

use Carbon\Carbon;

class ParcelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcels = Parcel::orderBy('id', 'desc')->get();
        return view('backend.pages.parcels.index', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.pages.parcels.create');
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
            'merchant_id' => 'required',
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
        $parcel->merchant_id = $request->merchant_id;
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
        return redirect()->route('parcels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parcel = Parcel::find($id);
        return view('backend.pages.parcels.show', compact('parcel'));
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
        return view('backend.pages.parcels.edit', compact('parcel'));
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
        $parcel->merchant_id = $request->merchant_id;
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
        return redirect()->route('parcels.index');
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

    // parcel status operation
    public function status_confirm($id)
    {
        $parcel = Parcel::find($id);
        $parcel->status = 1;
        $parcel->save();

        session()->flash('success', 'Parcel confirmed');
        return redirect()->back();
    }
    public function status_ship(Request $request, $id)
    {
        // validation data
        $request->validate([
            'time' => 'required',
            'rider_id' => 'required',
        ]);

        $ship = Shipping::where('parcel_id', $id)->get();


        if (!is_null($ship)) {
            foreach ($ship as $s) {
                $s->delete();
            }
            $shipping = new Shipping;

            $shipping->rider_id = $request->rider_id;
            $shipping->parcel_id = $id;
            $shipping->time = $request->time;

            $shipping->save();
        } else {
            $shipping = new Shipping;

            $shipping->rider_id = $request->rider_id;
            $shipping->parcel_id = $id;
            $shipping->time = $request->time;

            $shipping->save();
        }

        $parcel = Parcel::find($id);
        $parcel->status = 2;
        $parcel->save();

        session()->flash('success', 'Parcel sent to shipping');
        return redirect()->back();
    }
    public function status_reschedule(Request $request, $id)
    {
        // validation data
        $request->validate([
            'time' => 'required',
            'note' => 'required|max:100',
        ]);

        $re = Reschedule::where('parcel_id', $id)->get();
        if (!is_null($re)) {
            foreach ($re as $r) {
                $r->delete();
            }
            $reschedule = new Reschedule;

            $reschedule->time = $request->time;
            $reschedule->note = $request->note;
            $reschedule->parcel_id = $id;
            $reschedule->save();
        } else {
            $reschedule = new Reschedule;

            $reschedule->time = $request->time;
            $reschedule->note = $request->note;
            $reschedule->parcel_id = $id;
            $reschedule->save();
        }

        $parcel = Parcel::find($id);
        $parcel->status = 3;
        $parcel->save();

        session()->flash('success', 'Parcel rescheduled');
        return redirect()->back();
    }
    public function status_return($id)
    {
        $parcel = Parcel::find($id);
        $parcel->status = 4;
        $parcel->save();

        session()->flash('success', 'Parcel returned');
        return redirect()->back();
    }
    public function status_done($id)
    {
        $parcel = Parcel::find($id);
        $parcel->status = 5;
        $parcel->save();

        session()->flash('success', 'Parcel delivered successfully');
        return redirect()->back();
    }


    // pricing
    public function pricing($id)
    {
        $package = Package::find($id);
        return $package;
    }
}
