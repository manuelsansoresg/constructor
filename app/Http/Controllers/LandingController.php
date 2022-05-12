<?php

namespace App\Http\Controllers;

use App\Models\Builder;
use App\Models\WidgetBuilder;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        
        $page           = ($request->segment(1) == null) ? 'Inicio' : $request->segment(1);
        $page_actual    = Builder::where('name', $page)->first();
        $my_widgets     = WidgetBuilder::getMyWidgets($page_actual->id);
        
        return view('content_landing', compact('page_actual', 'my_widgets'));
    }
}
