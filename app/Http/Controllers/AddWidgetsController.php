<?php

namespace App\Http\Controllers;

use App\Models\ContactElement;
use App\Models\ContentProduct;
use App\Models\Setting;
use App\Models\WidgetBuilder;
use App\Models\WidgetCarusel;
use App\Models\WidgetContact;
use App\Models\WidgetGallery;
use App\Models\WidgetHeader;
use App\Models\WidgetParallax;
use App\Models\WidgetProduct;
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
        $data_images['order']   = $request->order;


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
            $name_image1 = 'parallax-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

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
    
    public function storeGallery(Request $request)
    {
        $data_images                = $request->data;
        $data_images['widget_id']   = $request->widget_id;
        $data_images['order']   = $request->order;

        if ($request->hasFile('imagen1') != false) {
            $get_image1 = $request->file('imagen1');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen1'] = $name_image1;
                WidgetGallery::deleteImageWithImage(array('id' => $request->gallery_id), 'imagen1');
            }
        }
        
        if ($request->hasFile('imagen2') != false) {
            $get_image1 = $request->file('imagen2');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen2'] = $name_image1;
                WidgetGallery::deleteImageWithImage(array('id' => $request->gallery_id), 'imagen2');
            }
        }
        
        if ($request->hasFile('imagen3') != false) {
            $get_image1 = $request->file('imagen3');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen3'] = $name_image1;
                WidgetGallery::deleteImageWithImage(array('id' => $request->gallery_id), 'imagen3');
            }
        }
        if ($request->hasFile('imagen4') != false) {
            $get_image1 = $request->file('imagen4');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen4'] = $name_image1;
                WidgetGallery::deleteImageWithImage(array('id' => $request->gallery_id), 'imagen4');
            }
        }
        if ($request->hasFile('imagen5') != false) {
            $get_image1 = $request->file('imagen5');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen5'] = $name_image1;
                WidgetGallery::deleteImageWithImage(array('id' => $request->gallery_id), 'imagen5');
            }
        }
        if ($request->hasFile('imagen6') != false) {
            $get_image1 = $request->file('imagen6');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['imagen6'] = $name_image1;
                WidgetGallery::deleteImageWithImage(array('id' => $request->gallery_id), 'imagen6');
            }
        }

        WidgetGallery::saveEdit($data_images, $request->page_actual, $request->gallery_id);
    }

    public function storeContact(Request $request)
    {
        $data_images['widget_id']   = $request->widget_id;
        $contacto_id = $request->contacto_id;

        WidgetContact::editWidget($request, $request->page_actual, $contacto_id);
        ContactElement::editElements($request, $contacto_id);
    }
    
    public function addElementContact(Request $request)
    {
        $data = $request->data;
        $element = new ContactElement($data);
        $element->save();
    }

    public function storeProduct(Request $request)
    {
        
        ContentProduct::saveEdit($request, $request->page_actual, $request->product_id);
    }

    public function addElementProducto(Request $request)
    {
        WidgetProduct::saveElement($request);
    }

    public function storeSetting(Request $request)
    {
        $data = $request->data;
        
        Setting::saveEdit($data, $request);
    }
}
