<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:2|unique:categories,id',
            'parent_id' => 'nullable|int|exists:categories,id',
            'description' => ['nullable', 'min:5',
                new Filter(['god', 'shut'])],
            'status' => 'required|in:active,draft',
            'image_path' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم التصنيف مطلوب',
            'parent_id.exists' => 'تصنفي يجب ان يكون موجود مسبقا ',
            'status.required' => 'الحالة مطلوبة'
        ];
    }
}
