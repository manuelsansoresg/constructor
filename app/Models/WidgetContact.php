<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetContact extends Model
{
    use HasFactory;
    protected $fillable = ['widget_id', 'name'];

    public static function editWidget($request, $page, $contacto_id)
    {
        $data = $request->data;

        $data_contact = array(
            'name' => $data['name'],
            'widget_id' => 9
        );

        $contact = WidgetContact::find($contacto_id);
        $contact->fill($data_contact);
        $contact->update();

        $data_page = array(
            'builder_id' => $page,
            'widget_id' => $contacto_id,
            'id_rel' => 9
        );
        $find_builder = WidgetBuilder::where($data_page)->first();

        if ($find_builder === null) {
            $data_page['order'] = $data['order'];
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
    }
}
