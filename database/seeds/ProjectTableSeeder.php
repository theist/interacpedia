<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Project;

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'projects' )->delete();
        for($i=1; $i<=4;$i++){
            Project::create( [
                'name'        => 'Proyecto # '.$i,
                'description' => 'Texto descriptivo de un proyecto aleatorio creado con el número '.$i.'.',
                'image'       => 'images/projects/pr0'.$i.'.jpg',
                'user_id'     => 1
            ] );
        }
    }
}