<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Challenge;

class ChallengeTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'challenges' )->delete();
        Challenge::create( [
            'name'        => 'StreetAdventure',
            'description' => 'Como aprender a recorrer ciudades de una forma divertida, utilizando una metodología preventiva que permita aprender que hacer en caso de un desastre.',
            'image'       => '/images/challenges/streetadventure.png',
            'user_id'     => 3
        ] );
        Challenge::create( [
            'name'        => 'Crear aplicación de "Car Pooling" para universidades',
            'description' => 'Ayúdanos a mejorar la congestión de vehículos en nuestras universidades y en otros lugares.',
            'image'       => '/images/challenges/carpooling.jpg',
            'user_id'     => 1
        ] );
        for($i=2; $i<=4;$i++){
            Challenge::create( [
                'name'        => 'Reto número '.$i,
                'description' => 'Texto descriptivo creado de manera aleatoria para un reto aleatorio creado con el número '.$i.'.',
                'image'       => '/images/challenges/ch0'.$i.'.jpg',
                'user_id'     => 1
            ] );
        }
    }
}