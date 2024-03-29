<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_setting = Setting::get();
        return view('setting', compact('my_setting'));
    }

    public function deleteImage($setting_id, $type)
    {
        $setting = Setting::find($setting_id);
        $image = $setting->image;
        $favicon = $setting->favicon;
        if ($type == 1) {
            $setting->image = '';
        } else {
            $setting->favicon = '';
        }
       
        $setting->update();
       
        if ($type == 1) {
            @unlink('files/'.$image);
        } else {
            @unlink('files/'.$favicon);
        }
        
        return redirect('/admin/settings');
    }

    public function setDomain(Request $request)
    {
        $data = $request->data;
        $request->session()->put('domain_id', $data['name']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
