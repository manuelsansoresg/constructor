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
        'widget_contact_id', 'name', 'placeholder', 'required'];

    public static function getElements($widget_id)
    {
        
        $elements             = null;
        $contact              = null;
        $widget_contact_id    = $widget_id;

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
        return array('contact' => $contact , 'content_form' => $view_elements, 'widget_id' => $widget_contact_id);
        return $view_elements;
    }

    public static function editElements($request, $contacto_id)
    {
        ContactElement::where('widget_contact_id', $contacto_id)->delete();
        $name       = $request->name;
        $leyenda    = $request->leyenda;
        $requerido  = $request->requerido;

        for ($i=0; $i < count($name); $i++) {
            $data_elements = array(
                'widget_contact_id' => $contacto_id,
                'name' => $name[$i],
                'placeholder' => $leyenda[$i],
                'required' => $requerido[$i],
            );
            $contact_elements = new ContactElement($data_elements);
            $contact_elements->save();
        }
    }
}
