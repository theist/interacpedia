<?php
use Illuminate\Database\Seeder;
use App\Interacpedia\Reward;

class RewardTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'rewards' )->delete();
        Reward::create( [ 'name' => 'Productos', 'image' => '/images/buttons/round/75x75/products-off.png' ] );
        Reward::create( [ 'name' => 'Becas', 'image' => '/images/buttons/round/75x75/scholarship-off.png' ] );
        Reward::create( [ 'name' => 'Prácticas', 'image' => '/images/buttons/round/75x75/internship-off.png' ] );
        Reward::create( [ 'name' => 'Fondos', 'image' => '/images/buttons/round/75x75/funds-off.png' ] );
        Reward::create( [ 'name' => 'Premios', 'image' => '/images/buttons/round/75x75/prizes-off.png' ] );
        Reward::create( [ 'name' => 'Patrocinios', 'image' => '/images/buttons/round/75x75/sponsorships-off.png' ] );
    }
}