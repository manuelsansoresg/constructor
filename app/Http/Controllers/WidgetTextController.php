<?php

namespace App\Http\Controllers;

use App\Models\WidgetText;
use Illuminate\Http\Request;

class WidgetTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                // Use move() to move the uploaded file
                $file->move(public_path('image_server'), $fileName);
                $url = asset('image_server/' . $fileName);
            }
        }
        return response()->json('Imagen guardada');
    }

    public function imageServer()
    {
        // Ruta a la carpeta donde se guardan las imágenes
        $images_folder = "image_server/";
        // Obtener todas las imágenes en la carpeta
        $images = glob($images_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        $images = \View::make('image_server', compact('images'))->render();
        return $images;
    }

    public function deleteImageServer(Request $request)
    {
        $image = $request->image;
        unlink($image);
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
    public function edit($page, $widget_id)
    {
        $query = WidgetText::find($widget_id);
        $section_id = 3;
        return view('page_widgets.texto', compact('query', 'page', 'section_id'));
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
