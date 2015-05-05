<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Challenge;

class ChallengeTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'challenges' )->delete();
        Challenge::create( [
            'name'        => 'First Challenge',
            'description' => 'First Challenge description text.',
            'image'       => 'images/icons/rewards/products.png',
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