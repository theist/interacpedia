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
            'image'       => 'images/challenges/carpooling.jpg',
            'user_id'     => 1
        ] );
        for($i=2; $i<=4;$i++){
            Challenge::create( [
                'name'        => 'Challenge Number '.$i,
                'description' => 'Random description text for a random challenge that is created with number '.$i.'.',
                'image'       => 'images/challenges/ch0'.$i.'.jpg',
                'user_id'     => 1
            ] );
        }
    }
}