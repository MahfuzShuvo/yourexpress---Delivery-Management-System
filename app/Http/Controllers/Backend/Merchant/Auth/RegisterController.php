<?php

namespace App\Http\Controllers\Backend\Merchant\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Merchant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::MERCHANT_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'company' => ['required', 'string', 'max:100'],
            'website' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'pickup' => ['required', 'string'],
            'photo' => ['required', 'max:2048'],
            'identity' => ['required', 'unique:merchants'],
            'zone' => ['required'],
            'pickup_type' => ['required'],
            'phone' => ['required', 'max:11', 'unique:merchants'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $merchantCount = Merchant::all()->count() + 1;
        $date = Carbon::now()->format('ymd');
        $merId = $date.$merchantCount;

        if ($data['photo']) {
            $image = $data['photo'];

            $imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/merchant/', $image_title);
            // $merchant->photo = "public/assets/images/merchant/".$image_title;
        }

        return Merchant::create([
            'name' => $data['name'],
            'merchantID' => $merId,
            'phone' => $data['phone'],
            'company' => $data['company'],
            'website' => $data['website'],
            'address' => $data['address'],
            'pickup' => $data['pickup'],
            'pickup_type' => implode(',', $data['pickup_type']),
            'zone' => implode(',', $data['zone']),
            'identity' => $data['identity'],
            'photo' =>"public/assets/images/merchant/".$image_title,
            'email' => $data['email'],
            'status' => 0,
            'password' => Hash::make($data['password']),
        ]);

    }

    public function showRegistrationForm()
    {
        return view('backend.merchant.auth.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        session()->flash('success', 'Registered Successfully');
        return $this->registered($request, $user)
                        ?: redirect('/merchant/login');
    }

    protected function registered(Request $request, $user)
    {
        // dd('success');
    }
}
