<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Contracts\SchoolContract;
use App\Models\School;

class SchoolRepository extends BaseRepository implements SchoolContract {

    protected $model;

    public function __construct(School $model)
    {
        $this->model = $model;
    }

}