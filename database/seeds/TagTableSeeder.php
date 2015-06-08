<?php
use Illuminate\Database\Seeder;
use App\Interacpedia\Tag;

class TagTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'tags' )->delete();
        Tag::create( [ 'name' => 'Innovación'] );
    }
}