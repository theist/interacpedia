<?php
use Illuminate\Database\Seeder;
use App\Interacpedia\University;
use App\Interacpedia\Career;
use App\Interacpedia\Course;

class UniversityTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'universities' )->delete();
        University::create( [ 'name' => 'Todas'] );
        University::create( [ 'name' => 'Universidad EAFIT'] );
        University::create( [ 'name' => 'Universidad Pontificia Bolivariana'] );
        University::create( [ 'name' => 'Corporación Universitaria Remington'] );

        DB::table( 'careers' )->delete();
        Career::create( [ 'name' => 'Todas'] );
        Career::create( [ 'name' => 'Administración de negocios internacionales'] );
        Career::create( [ 'name' => 'Ingeniería de sistemas'] );
        Career::create( [ 'name' => 'Diseño gráfico'] );

        DB::table( 'courses' )->delete();
        Course::create( [ 'name' => 'Todos'] );
        Course::create( [ 'name' => 'Tecnologías de innovación administrativa'] );
        Course::create( [ 'name' => 'Algoritmos'] );
        Course::create( [ 'name' => 'Teoría del color'] );
    }
}