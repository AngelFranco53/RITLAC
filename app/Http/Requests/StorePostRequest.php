<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if($this->publisher_id == auth()->user()->id) {
            if($this->carreer_id == auth()->user()->carreer_id) {
                return true;
            }else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'status' => 'required|in:1,5',
        ];

        if($this->status == 5) {
            $rules = array_merge($rules, [
                'category_id' => 'required|exists:categories,id',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }

        return $rules;
    }
}
