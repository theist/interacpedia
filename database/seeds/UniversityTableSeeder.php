<?php
use App\Interacpedia\Company;
use App\Interacpedia\Position;
use App\Interacpedia\Sector;
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

        DB::table( 'companies' )->delete();
        Company::create( [ 'name' => 'Idea Minds Group SAS'] );
        Company::create( [ 'name' => 'Metro de Medellín'] );

        DB::table( 'careers' )->delete();
        Career::create( [ 'name' => 'Todas'] );
        Career::create( [ 'name' => 'Administración de negocios internacionales'] );
        Career::create( [ 'name' => 'Ingeniería de sistemas'] );
        Career::create( [ 'name' => 'Diseño gráfico'] );

        DB::table( 'sectors' )->delete();
        Sector::create( [ 'name' => 'Educación'] );
        Sector::create( [ 'name' => 'Salud'] );

        DB::table( 'courses' )->delete();
        Course::create( [ 'name' => 'Todos'] );
        Course::create( [ 'name' => 'Tecnologías de innovación administrativa'] );
        Course::create( [ 'name' => 'Algoritmos'] );
        Course::create( [ 'name' => 'Teoría del color'] );

        DB::table( 'positions' )->delete();
        Position::create( [ 'name' => 'Gerente General'] );
        Position::create( [ 'name' => 'Director Creativo'] );
    }
}