<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = array('Encabezado', 'Carrusel',
         'Título', 'Descripción',
         '2 Columnas texto lado izquierdo y derecho foto',
         'Parallax', 'Productos', 'Vídeo', 'Galería',
         'Contacto', 'Footer'
        );
        foreach ($titles as $title) {
            $data_section = array('nombre' => $title);
            $section = new Section($data_section);
            $section->save();
        }
    }
}
