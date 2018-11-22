<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyHistory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usd = CurrencyHistory::where('foreing_exchange_id','=',1)->get()->last();
        $sol = CurrencyHistory::where('foreing_exchange_id','=',2)->get()->last();
        
        return view('home',compact('usd','sol'));
    }
}
