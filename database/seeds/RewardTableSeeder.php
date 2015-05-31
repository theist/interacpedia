<?php
use Illuminate\Database\Seeder;
use App\Interacpedia\Reward;

class RewardTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'rewards' )->delete();
        Reward::create( [ 'name' => 'Productos', 'image' => 'images/icons/rewards/products.png' ] );
        Reward::create( [ 'name' => 'Beca', 'image' => 'images/icons/rewards/scholarship.png' ] );
        Reward::create( [ 'name' => 'Internado', 'image' => 'images/icons/rewards/internship.png' ] );
        Reward::create( [ 'name' => 'Fondos', 'image' => 'images/icons/rewards/funds.png' ] );
        Reward::create( [ 'name' => 'Premios', 'image' => 'images/icons/rewards/prizes.png' ] );
        Reward::create( [ 'name' => 'Patrocinio', 'image' => 'images/icons/rewards/sponsorships.png' ] );
        Reward::create( [ 'name' => 'Bonos de grado', 'image' => 'images/icons/rewards/grade-bonus.png' ] );
    }
}