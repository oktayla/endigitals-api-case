<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CampusContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampusRequest;

use App\Models\Campus;
use App\Traits\JSONResponse;

class CampusController extends Controller {

    use JSONResponse;

    private $campusRepo;

    public function __construct(CampusContract $campusRepo)
    {
        $this->campusRepo = $campusRepo;
    }

    public function add(CampusRequest $request) {
        $campus = $this->campusRepo->add(
            $request->validated()
        );

        return $this->created($campus);
    }

    public function update(CampusRequest $request, int $id) {
        $campus = $this->campusRepo->findById($id);

        if( $campus ) {
            $data = $request->validated();
            $this->campusRepo->update( $id, $data );
    
            return $this->ok($campus);
        }

        return $this->invalid('No Campus info found.');
    }

    public function delete(int $id) {
        $this->campusRepo->delete($id);

        return $this->noContent();
    }

}
