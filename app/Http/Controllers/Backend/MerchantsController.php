<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merchant;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;
use File;

class MerchantsController extends Controller
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
        $merchants = Merchant::all();
        return view('backend.pages.merchants.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.merchants.create');
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
            'name' => 'required|max:100',
            'phone' => 'required|max:11|unique:users',
            'company' => 'required',
            'address' => 'required',
            'pickup' => 'required',
            'identity' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // create merchant 
        $merchantCount = Merchant::all()->count() + 1;
        $date = Carbon::now()->format('ymd');
        $merId = $date.$merchantCount;

        $merchant = new Merchant;

        $merchant->merchantID = 'YEM-'.$merId;

        $merchant->name = $request->name;
        $merchant->company = $request->company;
        $merchant->website = $request->website;
        $merchant->address = $request->address;
        $merchant->pickup = $request->pickup;
        $merchant->pickup_type = implode(", ", $request->pickup_type);
        $merchant->zone = implode(", ", $request->zone);
        $merchant->phone = $request->phone;
        $merchant->identity = $request->identity;
        $merchant->status = 0;
        $merchant->password = Hash::make($request->password);

        if ($request->file('photo')) {
            $image = $request->file('photo');

            $imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/merchant/', $image_title);
            $merchant->photo = "public/assets/images/merchant/".$image_title;
        } else {
            $merchant->photo = "public/assets/images/merchant/no_image.png";
        }

        if ($request->email) {
            $merchant->email = $request->email;
        }
        // dd($merchant);
        $merchant->save();
        session()->flash('success', 'Merchant created successfully');
        return redirect()->route('merchants.index');
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
        $merchant = Merchant::find($id);

        return view('backend.pages.merchants.edit', compact('merchant'));
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
        $merchant = Merchant::find($id);

        $merchant->name = $request->name;
        $merchant->company = $request->company;
        $merchant->website = $request->website;
        $merchant->address = $request->address;
        $merchant->pickup = $request->pickup;
        if ($request->pickup_type) {
            $merchant->pickup_type = implode(", ", $request->pickup_type);
        }
        if ($request->zone) {
            $merchant->zone = implode(", ", $request->zone);
        }
        
        $merchant->phone = $request->phone;
        $merchant->identity = $request->identity;
        $merchant->status = 0;
        $merchant->password = Hash::make($request->password);

        if ($request->file('photo')) {

            if ($merchant->photo != "public/assets/images/merchant/no_image.png") {
                if (File::exists($merchant->photo)) {
                    File::delete($merchant->photo);
                }
            }

            $image = $request->file('photo');

            $imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/merchant/', $image_title);
            $merchant->photo = "public/assets/images/merchant/".$image_title;
        }

        if ($request->email) {
            $merchant->email = $request->email;
        }
        // dd($merchant);
        $merchant->save();
        session()->flash('success', 'Merchant updated successfully');
        return redirect()->route('merchants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::find($id);

        if (!is_null($merchant)) {
            if ($merchant->photo != "public/assets/images/merchant/no_image.png") {
                if (File::exists($merchant->photo)) {
                    File::delete($merchant->photo);
                }
            }

            $merchant->delete();
        }

        session()->flash('success', 'Merchant deleted successfully');
        return redirect()->back();
    }

    public function status($id)
    {
        $merchant = Merchant::find($id);

        if ($merchant->status == 0) {
            $merchant->status = 1;

            $merchant->save();

            session()->flash('success', 'Merchant status activated');
            return redirect()->back();
        } else  {
            $merchant->status = 0;

            $merchant->save();

            session()->flash('success', 'Merchant banned');
            return redirect()->back();
        }
    }
}
