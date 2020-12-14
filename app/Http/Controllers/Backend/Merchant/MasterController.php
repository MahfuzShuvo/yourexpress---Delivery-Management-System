<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:merchant');
    }

    public function index()
    {
    	return view('backend.merchant.index');
    }
}
