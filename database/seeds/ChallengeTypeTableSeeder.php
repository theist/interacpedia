<?php
use App\Interacpedia\ChallengeType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'challenge_types' )->delete();
        $names = [ 'Creative', 'Tech', 'Engineering', 'Social', 'Business' ];
        foreach ( $names as $name )
        {
            ChallengeType::create( [
                'name' => $name
            ] );
        }
    }
}