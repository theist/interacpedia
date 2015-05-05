<?php
use Illuminate\Database\Seeder;
use App\Interacpedia\Reward;

class RewardTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'rewards' )->delete();
        Reward::create( [ 'name' => 'Products', 'image' => 'images/icons/rewards/products.png' ] );
        Reward::create( [ 'name' => 'Scholarship', 'image' => 'images/icons/rewards/scholarship.png' ] );
        Reward::create( [ 'name' => 'Internship', 'image' => 'images/icons/rewards/internship.png' ] );
        Reward::create( [ 'name' => 'Funds', 'image' => 'images/icons/rewards/funds.png' ] );
        Reward::create( [ 'name' => 'Prizes', 'image' => 'images/icons/rewards/prizes.png' ] );
        Reward::create( [ 'name' => 'Sponsorship', 'image' => 'images/icons/rewards/sponsorships.png' ] );
        Reward::create( [ 'name' => 'Grade Bonus', 'image' => 'images/icons/rewards/grade-bonus.png' ] );
    }
}