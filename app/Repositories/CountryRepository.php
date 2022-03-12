<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Contracts\CountryContract;
use App\Models\Country;

class CountryRepository extends BaseRepository implements CountryContract {

    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }

}