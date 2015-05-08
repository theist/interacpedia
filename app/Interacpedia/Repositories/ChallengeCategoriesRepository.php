<?php namespace App\Interacpedia\Repositories;

use App\Interacpedia\ChallengeCategory;

class ChallengeCategoriesRepository implements ChallengeCategoriesRepositoryInterface{

    public function getAll()
    {
        return ChallengeCategory::all();
    }

    public function selectList()
    {
        return ChallengeCategory::lists('name','id');
    }
}