<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     /**
     * Method formatJsonResponse
     *
     * @param $response $response [explicite description]
     * @param $data $data [explicite description]
     *
     * @return void
     */
    public function formatJsonResponse($response, $data = null)
    {
        $format_response = new \StdClass();
        $errors = [];
        $stdData = new \StdClass();
        if (array_key_exists("data", $response)) {
            foreach ($response["data"] as $key => $value) {
                $stdData->{$key} = $value;
            }
        }
        // errors
        if (array_key_exists("errors", $response)) {
            $objError = new \StdClass();
            foreach ($response["errors"] as  $field => $error) {
                $objError->{$field} = $error;
            }
            $errors[] = $objError;
        }
        $format_response->errors = $errors;
        $format_response->data = $stdData;
        return $format_response;
    }
}
