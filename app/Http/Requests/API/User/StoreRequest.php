<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'username' => 'bail|required|unique:users,username',
                'last_name'=>'required',                
                'role_id' => 'bail|required|numeric|exists:roles,id',
                'city_id' => 'bail|required|numeric|exists:cities,id',
                'email' => 'bail|required|unique:users,email',
                'name' =>  'required',               
        ];
    }
}
