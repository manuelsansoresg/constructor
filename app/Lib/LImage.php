<?php

namespace App\Lib;

use App\Models\WidgetCarusel;
use App\Models\WidgetHeader;

class LImage
{
    public $type;
    public $widget_id;
    public $request;
    public $name_image;

    /**
     * adjuntado de imagenes segun widget y tipo
     *
     * @param object $request
     * @param int $type 1=encabezado
     * @param int $widget_id
     * @param int $name_image nombre de la imagen a actualizar en bd
     */
    public function __construct($request)
    {
        $this->request    = $request;
        $this->type       = $request->type;
        $this->widget_id  = $request->widget_id;
        $this->name_image = $request->name_image;
    }

    public function add()
    {
        if ($this->request->hasFile('image') != false) {
            $document   = $this->request->file('image');
            $name_full  = rand(1, 999).'-'.$document->getClientOriginalName();
            if ($document->move('files', $name_full)) {
                return self::updateModel($name_full);
            }
        }
    }
    
    /**
     * Actualizar nombre de imagen modelo segun tipo
     *
     * @param string $name_file
     * @return void
     */
    private function updateModel($name_file)
    {
        
        switch ($this->type) {
            case '2':
                # carusel
                $name_image         = $this->name_image;
                $model              = WidgetCarusel::find($this->widget_id);
                $imagen_anterior    = $model->$name_image;
                $model->$name_image  = $name_file;

                break;
            
            default:
                # header
                $name_image         = $this->name_image;
                $model              = WidgetHeader::find($this->widget_id);
                $imagen_anterior    = $model->$name_image;
                $model->$name_image = $name_file;
                break;
        }
        
        @unlink('files/'.$imagen_anterior);

        $model->update();
        return $model;
    }
}
