<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CountryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;

use App\Traits\JSONResponse;

class CountryController extends Controller {

    use JSONResponse;

    private $countryRepo;

    public function __construct(CountryContract $countryRepo)
    {
        $this->countryRepo = $countryRepo;
    }

    public function index() {
        return $this->countryRepo->getAll();
    }

    public function add(CountryRequest $request) {
        $country = $this->countryRepo->add(
            $request->validated()
        );

        return $this->created($country);
    }

    public function update(CountryRequest $request, int $id) {
        $country = $this->countryRepo->findById($id);

        if( $country ) {
            $data = $request->validated();
            $this->countryRepo->update( $id, $data );
    
            return $this->ok($country);
        }

        return $this->invalid('No Country info found.');
    }

    public function delete(int $id) {
        $this->countryRepo->delete($id);

        return $this->noContent();
    }

}
