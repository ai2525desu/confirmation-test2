<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'price' => 'required|integer|between:0,10000',
            'image' => 'required|mimes:png,jpeg',
            'seasons' => 'required|array',
            'description' => 'required|max:120',
        ];

        if ($this->isMethod('post')) {
            $rules['image'] = 'required|mimes:png,jpeg';
        }

        if ($this->isMethod('patch')) {
            if (!$this->hasFile('image') && !$this->input('existing_image')) {
                $rules['image'] = 'required|mimes:png,jpeg';
            } else {
                $rules['image'] = 'sometimes|file|mimes:png,jpeg';
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' => '数値で入力してください',
            'price.between' => '0~10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'seasons.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
        ];
    }
}
