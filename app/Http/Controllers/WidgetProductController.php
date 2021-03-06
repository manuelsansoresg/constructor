<?php

namespace App\Http\Controllers;

use App\Models\ContentProduct;
use App\Models\TemplateWidget;
use App\Models\WidgetProduct;
use Illuminate\Http\Request;

class WidgetProductController extends Controller
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
        $query    = ContentProduct::find($widget_id);

        $section_id = 6;
        return view('page_widgets.producto', compact('query', 'page', 'section_id'));
    }

    public function isExistTemplate($widget_id, $type)
    {
        $is_exist = TemplateWidget::isExist($widget_id, $type);
        return response()->json($is_exist);
    }
    /**
     * crea el template guardando widget y type
     *
     * @param Request $request
     * @return void
     */
    public function createTemplate(Request $request)
    {
        TemplateWidget::saveTemplate($request);
        return response()->json('ok');
    }

    /**
     * guarda todo el widget entero dependiendo del id del template seleccionado
     * que se encuentra vinculado con el widget
     *
     * @param Request $request
     * @return void
     */
    public function storeTemplate(Request $request)
    {
        $template = TemplateWidget::createTemplate($request);
        return response()->json($template);
    }

    public function getProduct($product_id)
    {
        $product = WidgetProduct::find($product_id);
        return response()->json($product);
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
