<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Project;

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'projects' )->delete();
        Project::create( [
            'name'        => 'First Project',
            'description' => 'First project description text.',
            'image'       => 'images/icons/rewards/products.png',
            'user_id'     => 1
        ] );
        Project::create( [
            'name'        => 'Second Project',
            'description' => 'Second project description text.',
            'image'       => 'images/icons/rewards/products.png',
            'user_id'     => 1
        ] );
    }
}