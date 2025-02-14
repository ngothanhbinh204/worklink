<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileUpdateRequest extends FormRequest
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
            'email' => 'sometimes|email|unique:users,email,' . $this->user()->id,

            'contact_info.phone' => 'sometimes|string|max:20',
            'contact_info.address' => 'sometimes|string|max:255',
            'contact_info.social_links' => 'sometimes|json|max:255',
            'contact_info.website' => 'sometimes|url|max:255',

            'basic_info.first_name' => 'sometimes|string|max:255',
            'basic_info.last_name' => 'sometimes|string|max:255',
            'basic_info.gender' => 'sometimes|in:Male,Female,Other',
            'basic_info.birth_day' => 'sometimes|date_format:d/m/Y',
            // 'basic_info.bio' => 'sometimes|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',

            'contact_info.phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'contact_info.phone.max' => 'Số điện thoại không được quá 20 ký tự.',
            'contact_info.address.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'contact_info.address.max' => 'Địa chỉ không được quá 255 ký tự.',
            'contact_info.social_links.json' => 'Liên kết mạng xã hội phải là định dạng JSON hợp lệ.',
            'contact_info.website.url' => 'Website phải là URL hợp lệ.',

            'basic_info.first_name.string' => 'Họ phải là chuỗi ký tự.',
            'basic_info.first_name.max' => 'Họ không được quá 255 ký tự.',
            'basic_info.last_name.string' => 'Tên phải là chuỗi ký tự.',
            'basic_info.last_name.max' => 'Tên không được quá 255 ký tự.',
            'basic_info.gender.in' => 'Giới tính phải là Male, Female hoặc Other.',
            'basic_info.birth_day.date_format' => 'Ngày sinh phải có định dạng dd/mm/YYYY.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Dữ liệu không hợp lệ',
            'errors' => $validator->errors()
        ], 422));
    }
}
