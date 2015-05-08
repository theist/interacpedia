<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\ChallengeCategory;

class ChallengeCategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'challenge_categories' )->delete();
        $names = [ 'Animals',
            'Art',
            'Comic',
            'Community',
            'Dance',
            'Design',
            'Education',
            'Enviroment',
            'Fashion',
            'Film',
            'Food',
            'Gaming',
            'Health',
            'Music',
            'Photography',
            'Politics',
            'Religion',
            'Small Business',
            'Sports',
            'Technology',
            'Theater',
            'Trans media',
            'Apps',
            'Marketing',
            'Sales',
            'Finances',
            'Society',
            'Process',
            'Legal',
            'Development',
            'Website' ];
        foreach ( $names as $name )
        {
            ChallengeCategory::create( [
                'name' => $name
            ] );
        }
    }
}