<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Partner;

class PartnerTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'partners' )->delete();
        Partner::create( [
            'name'  => 'Socios Estratégicos',
            'image' => 'images/partners/socios.png',
        ] );
        Partner::create( [
            'name'  => 'Eafit',
            'image' => 'images/partners/eafit.png',
        ] );
        Partner::create( [
            'name'  => 'UPB',
            'image' => 'images/partners/upb.png',
        ] );
        Partner::create( [
            'name'  => 'Remington',
            'image' => 'images/partners/remington.png',
        ] );
    }
}