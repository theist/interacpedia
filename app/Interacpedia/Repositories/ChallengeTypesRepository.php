<?php namespace App\Interacpedia\Repositories;

use App\Interacpedia\ChallengeType;

class ChallengeTypesRepository implements ChallengeTypesRepositoryInterface{

    public function getAll()
    {
        return ChallengeType::all();
    }
    public function selectList()
    {
        return ChallengeType::lists('name','id');
    }
}