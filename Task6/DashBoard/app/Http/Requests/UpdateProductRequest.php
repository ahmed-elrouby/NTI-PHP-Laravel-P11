<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name_en'=>['required','string','max:1000'],
            'name_ar'=>['required','string','max:1000'],
            'price'=>['required','numeric','max:99999,99'],
            'quantity'=>['nullable','integer','min:1','max:999'],
            'status'=>['required','integer','min:0','max:1'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'brand_id'=>['required','integer','exists:brands,id'],
            'desc_en'=>['required','string'],
            'desc_ar'=>['required','string'],
            'image'=>['nullable','max:1000','mimes:jpg,png,jpeg']
        ];
    }
}
