<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes: jpg,png,bmp,jpeg'
        ];
    }
    public function messages():array 
    {
        return [
            'name.required' => 'vui lòng nhập tên thể loại',
            'name.unique' => 'tên đã tồn tại',
            'price.required' => 'vui long nhap gia',
            'price.numeric' => 'vui long nhap gia khong hop le',
            'description.required' =>'Pleaes enter description',
            'image.required' => 'pleaes enter image',
            'image.mimes' => 'image cua ban pai la'
        ];
    }
}
