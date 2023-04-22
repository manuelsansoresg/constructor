<?php

namespace App\Http\Controllers;

use App\Mail\EmailSend;
use App\Models\Builder;
use App\Models\ContactElement;
use App\Models\Domain;
use App\Models\Setting;
use App\Models\WidgetBuilder;
use App\Models\WidgetContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $domain = 'pruebamotosmexico.com';
        $get_domain = Domain::where('name', $domain)->first();
        $domain_id = $get_domain->id;
        $page           = ($request->segment(1) === null) ? '/' : $request->segment(1);
        $setting        = Setting::get($domain_id);
        $page_actual    = Builder::where('slug', $page)
                            ->where('setting_id', $setting->id)
                            ->first();
        //dd($page_actual);
        $my_widgets     = WidgetBuilder::getMyWidgets($page_actual->id, $domain_id);
        $my_setting     = Setting::get($domain_id);
        $pages          = Builder::where('slug', '!=', '/')
                            ->where('setting_id', $setting->id)
                            ->get();
        return view('content_landing', compact('page_actual', 'my_widgets', 'page', 'my_setting', 'pages', 'domain_id'));
    }

    public function sendEmail(Request $request)
    {
        $data = $request->data;
        $data_contact = array('contacts' => $data);
        Mail::to($data['correo'])->send(new EmailSend($data_contact));
        return response()->json(200);
    }
}
