<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Challenge;

class ChallengeTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'challenges' )->delete();
        Challenge::create( [
            'name'        => 'Crear aplicación de "Car Pooling" para universidades',
            'description' => 'Ayúdanos a mejorar la congestión de vehículos en nuestras universidades y en otros lugares.',
            'image'       => 'images/challenges/carpooling.png',
            'user_id'     => 1
        ] );
        Challenge::create( [
            'name'        => 'Second Challenge',
            'description' => 'Second Challenge description text.',
            'image'       => 'images/icons/rewards/products.png',
            'user_id'     => 1
        ] );
    }
}