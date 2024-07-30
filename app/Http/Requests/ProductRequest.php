<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Ảnh phải là một tệp có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Ảnh không được lớn hơn 2048 kilobytes.',
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải ít nhất là 0.',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.integer' => 'Số lượng sản phẩm phải là một số nguyên.',
            'quantity.min' => 'Số lượng sản phẩm phải ít nhất là 0.',
            'description.string' => 'Mô tả phải là một chuỗi ký tự.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category_id.exists' => 'Danh mục sản phẩm không hợp lệ.',
            'status.required' => 'Trạng thái sản phẩm là bắt buộc.',
            'status.boolean' => 'Trạng thái sản phẩm phải là hoạt động hoặc không hoạt động.',
        ];
    }
}
