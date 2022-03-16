<?php

namespace App\Services;
use App\Models\User;
class UserService
{
    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public static function get($id){
        $user = User::findOrFail($id);
        $user->load('role','city');
        return $user;
    }

    /**
     * @return [type]
     */
    public static function list(){
        $users = User::with('city')->get();
        return $users;
    }

    /**
     * @param mixed $request
     * 
     * @return [type]
     */
    public static function store($request){
        $user =new user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->role_id = $request->role_id ;
        $user->password =  bcrypt($request->password);
        $user->save();
        return $user;
    }


    /**
     * @param mixed $request
     * @param mixed $id
     * 
     * @return [type]
     */
    public static function update($request, $id){
        $user = self::get($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->role_id = $request->role_id ;
        $user->active = $request->active ;
        $user->password =  bcrypt($request->password);
        $user->save();
        return $user;
    }

}
