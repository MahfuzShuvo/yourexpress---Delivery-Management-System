<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Merchant;

use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
    	return view('backend.merchant.auth.register');
    }

    public function register(Request $request)
    {
        // $this->validator($request->all())->validate();

        // event(new Registered($merchant = $this->create($request->all())));

        // $this->guard()->login($merchant);

        // return $this->registered($request, $merchant)
        //                 ?: redirect('/merchant/login')->with('success', 'Successfully registerd as a merchant');

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'company' => ['required', 'string', 'max:100'],
            'website' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'pickup' => ['required', 'string'],
            'photo' => ['required'],
            'identity' => ['required'],
            // 'zone' => ['required'],
            // 'pickup_type' => ['required'],
            'phone' => ['required', 'max:11', 'unique:merchants'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($validator);

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
        }

        if ($request->email) {
            $merchant->email = $request->email;
        }
        // dd($merchant);
        $merchant->save();
        session()->flash('success', 'You are successfully registerd as a merchant');
        return redirect()->route('merchant.login');
    }
}
