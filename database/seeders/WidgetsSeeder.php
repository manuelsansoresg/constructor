<?php

namespace Database\Seeders;

use App\Models\Builder;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class WidgetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titulos = array('Encabezado', 'Slider', 'Título', 'Descripción', '2 columnas',
        'Parallax', 'Productos', 'Video', 'Galería', 'Contacto', 'Pie de página');
       
        $execute = array('header', 'carusel', '', '', '',
        '', '', '', '', '', '');
        
        foreach ($titulos as $key => $titulo) {
            $widget = new Widget();
            $widget->name = $titulo;
            $widget->execute_widget = $execute[$key];
            $widget->save();
        }
        $page = new Builder();
        $page->name = 'Inicio';
        $page->save();
    }
}
