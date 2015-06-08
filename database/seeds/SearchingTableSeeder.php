<?php
use Illuminate\Database\Seeder;
use App\Interacpedia\Searching;

class SearchingTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'searchings' )->delete();
        Searching::create( [ 'name' => 'Fondos', 'image' => '/images/buttons/round/75x75/funds-off.png' ] );
        Searching::create( [ 'name' => 'Mentor', 'image' => '/images/buttons/round/75x75/mentor-off.png' ] );
        Searching::create( [ 'name' => 'Pasantía', 'image' => '/images/buttons/round/75x75/internship-off.png' ] );
        Searching::create( [ 'name' => 'Plan de Negocios', 'image' => '/images/buttons/round/75x75/businessplan-off.png' ] );
        Searching::create( [ 'name' => 'Desarrollo', 'image' => '/images/buttons/round/75x75/development-off.png' ] );
        Searching::create( [ 'name' => 'Socios', 'image' => '/images/buttons/round/75x75/founders-off.png' ] );
        Searching::create( [ 'name' => 'Plan Mercadeo', 'image' => '/images/buttons/round/75x75/plan-off.png' ] );
        Searching::create( [ 'name' => 'Investigación de Mercado', 'image' => '/images/buttons/round/75x75/research-off.png' ] );
        Searching::create( [ 'name' => 'Pruebas', 'image' => '/images/buttons/round/75x75/testing-off.png' ] );
        Searching::create( [ 'name' => 'Más Ideas', 'image' => '/images/buttons/round/75x75/ideas-off.png' ] );
        Searching::create( [ 'name' => 'Personas', 'image' => '/images/buttons/round/75x75/people-off.png' ] );
        Searching::create( [ 'name' => 'Contactos', 'image' => '/images/buttons/round/75x75/networking-off.png' ] );
        Searching::create( [ 'name' => 'Ventas', 'image' => '/images/buttons/round/75x75/sales-off.png' ] );
    }
}