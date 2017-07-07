<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class CreateStudentRequest extends FormRequest
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
            'firstname' => 'required|Alpha',
            'lastname' => 'required|Alpha',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:student',
            'password' => 'required|min:5|max:255|Confirmed',
            'password_confirmation' =>'required|max:255',
        ];
    }


}
