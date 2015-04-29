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

        $this->call('RewardTableSeeder');
        $this->command->info('Rewards table seeded!');
        $this->call('ChallengeTableSeeder');
        $this->command->info('Challenge table seeded!');
	}

}
