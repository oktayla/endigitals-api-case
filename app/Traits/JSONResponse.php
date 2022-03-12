<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait JSONResponse {

    /**
     * Custom JSON response for all API actions.
     * 
     * @param string $message
     * @param mixed $data
     * @param int $status_code
     * @param boolean $is_success
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function custom_response(string $message = null, $data = [], int $status_code, bool $is_success = true) {

        $response = ['success' => $is_success];
        if( $message ) {
            $response = array_merge($response, [
                'message' => $message
            ]);
        }
        if( $data ) {
            $response = array_merge($response, [
                'data' => $data
            ]);
        }

        return response()->json($response, $status_code);
    }

    /**
     * Custom JSON Success response for all API actions.
     * 
     * @param string $message
     * @param mixed $data
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function success(string $message = null, $data = []) {
        return $this->custom_response($message, $data, Response::HTTP_OK);
    }

    /**
     * Custom JSON Success response without message variable.
     * 
     * @param string $message
     * @param mixed $data
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function ok($data = []) {
        return $this->success(null, $data);
    }

    /**
     * Custom JSON Success response when newly created a record.
     * 
     * @param mixed $data
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function created($data = []) {
        return $this->custom_response(null, $data, Response::HTTP_CREATED);
    }

    /**
     * Custom JSON Error response for all API actions.
     * 
     * @param string $message
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function error(string $message = null, $data = []) {
        return $this->custom_response($message, $data, Response::HTTP_UNPROCESSABLE_ENTITY, false);
    }


    /**
     * JSON, Unauthorized error response for Login action.
     * 
     * @param string $message
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function unauthorized(string $message) {
        return $this->custom_response($message, [], Response::HTTP_UNAUTHORIZED, false);
    }

    /**
     * JSON, Invalid response instead of Not Found.
     * 
     * @param string $message
     * @param mixed $data
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function invalid(string $message = null, $data = []) {
        return $this->error($message, $data);
    }

    /**
     * JSON NoContent Response for Delete actions
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function noContent() {
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    
}