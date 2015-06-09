<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('StoryTableSeeder');
        $this->call('ProjectTableSeeder');
        $this->call('PartnerTableSeeder');
        $this->call('RewardTableSeeder');
        $this->call('SearchingTableSeeder');
        $this->call('ChallengeTableSeeder');
        $this->call('ChallengeCategoryTableSeeder');
        $this->call('ChallengeTypeTableSeeder');
        $this->call('TagTableSeeder');
        $this->call('UniversityTableSeeder');
        $this->call('Alakkad\WorldCountriesCities\CitiesSeeder');
        $this->call('Alakkad\WorldCountriesCities\CountriesSeeder');
    }

}
