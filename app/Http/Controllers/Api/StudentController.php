<?php

namespace App\Http\Controllers\Api;

use App\Contracts\StudentContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Traits\JSONResponse;

class StudentController extends Controller
{

    use JSONResponse;

    private $studentRepo;

    public function __construct(StudentContract $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function add(StudentRequest $request)
    {
        $student = $this->studentRepo->add(
            $request->validated()
        );

        return new StudentResource($student);

        return $this->created($student);
    }
    
    public function update(StudentRequest $request, int $id) {
        $student = $this->studentRepo->findById($id);

        if( $student ) {
            $data = $request->validated();
            $this->studentRepo->update( $id, $data );

            $this->ok($student);
        }

        return $this->invalid('No Student info found.');
    }

    public function delete(int $id) {
        $this->studentRepo->delete($id);

        return $this->noContent();
    }

}
