<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'email' => 'required|email|unique:users,email,'.$this->id,
            'full_name' => 'required',
            'phone' => 'required|digits:10'
        ];
    }
    public function messages():array 
    {
        return [
            'email.required' => 'vui lòng nhập tên email',
            'email.unique' => 'email khong hop le',
            'email.email' => 'ban phai nhap email',
            'password.min' => 'password phai tu 8 ki tu tro len',
            'name.unique' => 'tên đã tồn tại',
            'full_name.required' => 'vui long nhap ten',
            'phone.required' => 'vui long nhap phone',
            'phone.digits' => 'phone max 10'
        ];
    }
}
