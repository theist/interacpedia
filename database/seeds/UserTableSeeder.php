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
            'newsletter' => true
        ] );
        $emails = [
            'lucasosorio@gmail.com',
            'slalindeg@hotmail.com',
            'andrea.gutierrez@procables.com.co',
            'andreruizres@gmail.com',
            'lucasosorio@hotmail.com',
            'caro.tejada.alvarez@gmail.com',
            'sbuiles7@gmail.com',
            'fernandaescobarv@gmail.com'
        ];
        foreach($emails as $mail){
            User::create( [
                'name'       => $mail,
                'email'      => $mail,
                'password'   => '123',
                'newsletter' => true
            ] );
        }
    }
}