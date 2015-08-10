<?php
use App\Interacpedia\Company;
use App\Interacpedia\Position;
use App\Interacpedia\Sector;
use Illuminate\Database\Seeder;
use App\Interacpedia\University;
use App\Interacpedia\Career;
use App\Interacpedia\Course;

class TutorialTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'tutorial' )->delete();
        Tutorial::create( [ 'title' => 'Bienvenido a Interacpedia',
                            'image' => '/images/tutorials/bienvenida.jpg' ] );
        Tutorial::create( [ 'title' => '¿Listo para bloggear?',
                            'image' => '/images/tutorials/blogger.jpg' ] );
        Tutorial::create( [ 'title' => '¿Tienes dudas con tu reto?',
                            'image' => '/images/tutorials/comentario_reto.jpg' ] );
        Tutorial::create( [ 'title' => 'Tienes muchas opciones de contacto',
                            'image' => '/images/tutorials/contactos.jpg' ] );
    }
}