<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Package;

class PackagesController extends Controller
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
        $packages = Package::all();
        return view('backend.pages.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.packages.create');
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
            'name' => 'required|unique:packages',
            'area' => 'required',
            'schedule' => 'required',
            'price_1' => 'required',
            'price_2' => 'required',
            'price_3' => 'required',
            'price_extra' => 'required',
        ]);

        // create package
        $package = new Package;

        $package->name = $request->name;
        $package->area = $request->area;
        $package->schedule = $request->schedule;
        $package->price_1 = $request->price_1;
        $package->price_2 = $request->price_2;
        $package->price_3 = $request->price_3;
        $package->price_extra = $request->price_extra;

        $package->save();
        session()->flash('success', 'Package created successfully');
        return redirect()->route('packages.index');
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
        $package = Package::find($id);

        return view('backend.pages.packages.edit', compact('package'));
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
        $package = Package::find($id);

        $package->schedule = $request->schedule;
        $package->price_1 = $request->price_1;
        $package->price_2 = $request->price_2;
        $package->price_3 = $request->price_3;
        $package->price_extra = $request->price_extra;

        $package->save();

        session()->flash('success', 'Package updated successfully');
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);

        $package->delete();

        session()->flash('success', 'Package deleted successfully');
        return redirect()->back();
    }
}
