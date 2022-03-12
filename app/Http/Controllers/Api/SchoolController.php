<?php

namespace App\Http\Controllers\Api;

use App\Contracts\SchoolContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;

use App\Traits\JSONResponse;

class SchoolController extends Controller {

    use JSONResponse;

    private $schoolRepo;

    public function __construct(SchoolContract $schoolRepo)
    {
        $this->schoolRepo = $schoolRepo;
    }

    public function all() {
        return $this->schoolRepo->getAll();
    }

    public function add(SchoolRequest $request) {
        $school = $this->schoolRepo->add(
            $request->validated()
        );

        return $this->created($school);
    }

    public function update(SchoolRequest $request, int $id) {
        $school = $this->schoolRepo->findById($id);

        if( $school ) {
            $data = $request->validated();
            $this->schoolRepo->update( $id, $data );

            $this->ok($school);
        }

        return $this->invalid('No School info found.');
    }

    public function delete(int $id) {
        $this->schoolRepo->delete($id);

        return $this->noContent();
    }

}
