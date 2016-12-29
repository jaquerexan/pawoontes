<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * cmp_id:
     *     required
     *     should be exist at companies and active
     * name:
     *     required
     * email:
     *     required
     *     unique
     * password:
     *     required
     * password_confirmation:
     *     required
     *     should be same with password
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules['cmp_id'] = 'required';
        $rules['name'] = 'required';
        $rules['email'] = 'required|unique:users';
        $rules['password'] = 'required';
        $rules['password_confirmation'] = 'required|same:password';
        if($this->id)
        {
            $rules['email'] = 'required|unique:users,email,'.$this->id.',id';
            unset($rules['password']);
            unset($rules['password_confirmation']);
            if($this->editpass)
            {
                unset($rules['cmp_id']);
                unset($rules['name']);
                unset($rules['email']);
                $rules['password'] = 'required';
                $rules['password_confirmation'] = 'required|same:password';
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'cmp_id.required' => 'company must be filled',
            'name.required' => 'name must be filled',
            'email.required' => 'email must be filled',
            'email.unique' => 'email already exist',
            'password.required' => 'password must be filled',
            'password_confirmation.required' => 'password confirmation must be filled',
        ];
    }
}
