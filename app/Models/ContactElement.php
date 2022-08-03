<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;
use View;

class ContactElement extends Model
{
    use HasFactory;
    protected $fillable = [
        'widget_contact_id', 'name', 'placeholder', 'required', 'type_field'];

    public static function getElements($widget_id, $page_actual)
    {
        
        $elements             = null;
        $contact              = null;
        $widget_contact_id    = $widget_id;

        $order = WidgetBuilder::where([
            'builder_id' => $page_actual, 'id_rel' => 9, 'widget_id' => $widget_contact_id
        ])
            ->first();
        
        if ($widget_contact_id != 'null') {
            $contact = WidgetContact::find($widget_contact_id);
            $elements = ContactElement::where('widget_contact_id', $widget_contact_id)
            ->get();
        } else {
            /* $object = new stdClass(); */
            $get_elements = config('enums.contact');
            $widget_contact_id = null;
            $data_contact = array(
                'name' => ''
            );
            
            $get_element = WidgetContact::where($data_contact)->first();
            
            if ($get_element == null) {
                $contact = new WidgetContact($data_contact);
                $contact->save();

                $widget_contact_id = $contact->id;
                foreach ($get_elements as $key => $element) {
                    $data_elements    = array(
                        'widget_contact_id' => $widget_contact_id,
                        'name' =>$element ,
                        'placeholder' => $element,
                    );
                    $required = true;
                    if ($element === 'name') {
                        $required = false;
                    }
                    $data_elements['required'] = $required;
                    $add_elements = new ContactElement($data_elements);
                    $add_elements->save();
                }
            } else {
                $widget_contact_id = $get_element->id;
            }
            $elements = ContactElement::where('widget_contact_id', $widget_contact_id)->get();
        }
        
        
        $view_elements =  View::make('element_contact', compact('elements'))->render();
        $get_order = ($order!= null) ? $order->order : 0;
        return array('contact' => $contact , 'content_form' => $view_elements, 'widget_id' => $widget_contact_id, 'order' => $get_order);
    }

    public static function fillElementWithContact($content_contact_id, $content_old_contact_id)
    {
        $get_content        = WidgetContact::find($content_contact_id);
        $get_old_content    = WidgetContact::find($content_old_contact_id);

        if ($get_old_content !== null) {
            $content_contact_id   = $get_old_content->id;
            $contacts             = ContactElement::where('widget_contact_id', $content_contact_id)->get();

            foreach ($contacts as $element) {
                $data_element = array(
                    'widget_contact_id' => $get_content->id,
                    'name' => $element->name,
                    'placeholder' => $element->placeholder,
                    'type_field' => $element->type_field
                );
                $contact_element = new ContactElement($data_element);
                $contact_element->save();
            }
        }
    }

    public static function editElements($request, $contacto_id)
    {
        ContactElement::where('widget_contact_id', $contacto_id)->delete();
        $name       = $request->name;
        $leyenda    = $request->leyenda;
        $requerido  = $request->requerido;
        $type_field = $request->type_field;

        for ($i=0; $i < count($name); $i++) {
            $val_requerido = (isset($requerido[$i])) ? $requerido[$i] : 0;
            $data_elements = array(
                'widget_contact_id' => $contacto_id,
                'name' => $name[$i],
                'placeholder' => $leyenda[$i],
                'type_field' =>  $type_field[$i],
                'required' => $val_requerido,
            );
            $contact_elements = new ContactElement($data_elements);
            $contact_elements->save();
        }
    }
}
