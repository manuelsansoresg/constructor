<?php

namespace App\Http\Controllers;

use App\Models\WidgetBuilder;
use App\Models\WidgetCarusel;
use App\Models\WidgetHeader;
use App\Models\WidgetParallax;
use App\Models\WidgetText;
use App\Models\WidgetTwoColumn;
use App\Models\WidgetVideo;
use Illuminate\Http\Request;

class AddWidgetsController extends Controller
{
    public function storeHeader(Request $request)
    {
        $data = $request->data;
        
        if ($request->hasFile('image') != false) {
            $document = $request->file('image');
            $name_full = rand(1, 999).'-'.$document->getClientOriginalName();

            if ($document->move('files', $name_full)) {
                $data['image']   = $name_full;
            }

            $get_header = WidgetHeader::find($request->header_id);
            if ($get_header != null) {
                $imagen_anterior = $get_header->image;
                @unlink('files/'.$imagen_anterior);
            }
        }
        WidgetHeader::saveEdit($data, $request->page_actual, $request->header_id);
    }

    public function storeCarusel(Request $request)
    {
        $data_images                = array();
        $data_images['widget_id']   = $request->widget_id;

        if ($request->hasFile('imagen1') != false) {
            $get_image1 = $request->file('imagen1');
            $name_image1 = 'carusel-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen1'] = $name_image1;
                WidgetCarusel::deleteImageWithImage(array('id' => $request->carusel_id), 'imagen1');
            }
        }
        
        if ($request->hasFile('imagen2') != false) {
            $get_image1 = $request->file('imagen2');
            $name_image1 = 'carusel-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen2'] = $name_image1;
                WidgetCarusel::deleteImageWithImage(array('id' => $request->carusel_id), 'imagen2');
            }
        }
        
        if ($request->hasFile('imagen3') != false) {
            $get_image1 = $request->file('imagen3');
            $name_image1 = 'carusel-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen3'] = $name_image1;
                WidgetCarusel::deleteImageWithImage(array('id' => $request->carusel_id), 'imagen3');
            }
        }

        

        WidgetCarusel::saveEdit($data_images, $request->page_actual, $request->carusel_id);
    }

    public function storeTexto(Request $request)
    {
        $data = $request->data;
        WidgetText::saveEdit($data, $request->page_actual, $request->texto_id);
    }
    
    public function storeTwoColumns(Request $request)
    {
        $data = $request->data;
        if ($request->hasFile('image') != false) {
            $get_image1 = $request->file('image');
            $name_image1 = 'two-columns-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data['image'] = $name_image1;
                WidgetTwoColumn::deleteImageWithImage(array('id' => $request->two_columns_id), 'image');
            }
        }
        WidgetTwoColumn::saveEdit($data, $request->page_actual, $request->two_columns_id);
    }

    public function storeParallax(Request $request)
    {
        $data = $request->data;
        if ($request->hasFile('image') != false) {
            $get_image1 = $request->file('image');
            $name_image1 = 'two-columns-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data['image'] = $name_image1;
                WidgetParallax::deleteImageWithImage(array('id' => $request->parallax_id), 'image');
            }
        }
        WidgetParallax::saveEdit($data, $request->page_actual, $request->parallax_id);
    }

    public function storeVideo(Request $request)
    {
        $data = $request->data;
        WidgetVideo::saveEdit($data, $request->page_actual, $request->video_id);
    }
}
