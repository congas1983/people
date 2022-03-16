<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\API\User\StoreRequest;
use App\Http\Requests\API\User\UpdateRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserService::list();
        $response = $this->formatJsonResponse([
            "data" => [
                "status" => 200,
                "type" => "list_users",
                "body" => $users
            ]
        ], null);
        return response()->json($response,200);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = UserService::store($request);
        $response = $this->formatJsonResponse([
            "data" => [
                "status" => 200,
                "type" => "user_success",
                "body" => $user
            ]
        ], null);
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserService::get($id);
        $response = $this->formatJsonResponse([
            "data" => [
                "status" => 200,
                "type" => "user_show",
                "body" => $user
            ]
        ], null);
        return response()->json($response,200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $user = UserService::update($request,$id);
        $response = $this->formatJsonResponse([
            "data" => [
                "status" => 200,
                "type" => "user_update",
                "body" => $user
            ]
        ], null);
        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
