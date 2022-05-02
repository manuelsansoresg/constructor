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
        $titulos = array('Encabezado', 'Slider', 'Texto', '2 columnas',
        'Parallax', 'Productos', 'Video', 'Galería', 'Contacto', 'Pie de página');
       
        $execute = array('header', 'carusel', 'texto', 'two_column',
        'parallax', 'product', 'video', 'vallery', 'contact', 'footer');
        
        foreach ($titulos as $key => $titulo) {
            $widget = new Widget();
            $widget->name = $titulo;
            $widget->execute_widget = $execute[$key];
            $widget->save();
        }
        $page = new Builder();
        $page->name = 'Inicio';
        $page->slug = '/';
        $page->save();
    }
}
