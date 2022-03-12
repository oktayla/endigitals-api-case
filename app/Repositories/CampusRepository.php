<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Contracts\CampusContract;
use App\Models\Campus;

class CampusRepository extends BaseRepository implements CampusContract {

    protected $model;

    public function __construct(Campus $model)
    {
        $this->model = $model;
    }

}