<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends Request
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


    public function rules($id = null)
    {

        return [
            'firstname' => 'required|Alpha',
            'lastname' => 'required|Alpha',
            'gender' => 'required',
            'email' => "required|email|unique:student,Email,$id",

        ];
    }


}
