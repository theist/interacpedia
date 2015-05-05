<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'users' )->delete();
        User::create( [
            'name'       => 'Juan Carlos Orrego',
            'email'      => 'jcorrego@gmail.com',
            'password'   => 'jcorrego',
            //'newsletter' => true
        ] );
    }
}