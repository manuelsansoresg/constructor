<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $domain_id = $request->session()->get('domain_id');
        $domain = null;
        if ($domain_id != '') {
            $domain = Domain::find($domain_id);
        }
        return view('home', compact('domain'));
    }

}
