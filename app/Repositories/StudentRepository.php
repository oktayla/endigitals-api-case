<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Contracts\StudentContract;
use App\Models\Student;

class StudentRepository extends BaseRepository implements StudentContract {

    protected $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

}