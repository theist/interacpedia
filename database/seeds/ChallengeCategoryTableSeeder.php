<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\ChallengeCategory;

class ChallengeCategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'challenge_categories' )->delete();
        $names = [ 'Animales',
            'Arte',
            'Comics',
            'Comunidad',
            'Baile',
            'Diseño',
            'Educación',
            'Medio Ambiente',
            'Mode',
            'Cine',
            'Comida',
            'Juegos',
            'Salud',
            'Musica',
            'Fotografía',
            'Política',
            'Religión',
            'Negocios',
            'Deportes',
            'Tecnología',
            'Teatro',
            'Aplicaciones',
            'Mercadeo',
            'Ventas',
            'Finanzas',
            'Sociedad',
            'Procesos',
            'Legal',
            'Desarrollo',
            'Sitio Web' ];
        foreach ( $names as $name )
        {
            ChallengeCategory::create( [
                'name' => $name
            ] );
        }
    }
}