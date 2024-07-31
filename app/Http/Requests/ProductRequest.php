<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $imageValidateRule =null;
        if(isset($this->product)) {
            $imageValidateRule ='image|mimes:png,jpg,jpeg,webp|max:2048';
        }else{
            $imageValidateRule ='required|'. $imageValidateRule;
        }
        return [
        'category_id' => 'required|exists:categories,id',
        'title' => [
            'required' ,
            Rule::unique("products")->ignore($this->product?->id),

        ],
        'price'=>'required',
        'description'=>'required' ,
        'image' =>  $imageValidateRule

        ];
    }
    public function messages(){
        return[
            'title.required' => 'Product have to enter',
            'title.min'=> 'Minimum 5 character is need',
        ];
    }
}
