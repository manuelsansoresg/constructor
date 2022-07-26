<?php

namespace App\Http\Controllers;

use App\Mail\EmailSend;
use App\Models\Builder;
use App\Models\ContactElement;
use App\Models\Setting;
use App\Models\WidgetBuilder;
use App\Models\WidgetContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        
        $page           = ($request->segment(1) === null) ? '/' : $request->segment(1);
        $page_actual    = Builder::where('slug', $page)->first();
        $my_widgets     = WidgetBuilder::getMyWidgets($page_actual->id);
        $my_setting     = Setting::find(1);
        $pages          = Builder::where('slug', '!=', '/')->get();

        return view('content_landing', compact('page_actual', 'my_widgets', 'page', 'my_setting', 'pages'));
    }

    public function sendEmail(Request $request)
    {
        $data = $request->data;
        $data_contact = array('contacts' => $data);
        Mail::to($data['correo'])->send(new EmailSend($data_contact));
        return response()->json(200);
    }
}
