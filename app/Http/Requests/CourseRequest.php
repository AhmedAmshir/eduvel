<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'course_title' => 'required',
            'teacher_name' => 'required',
            'course_start' => 'required',
            'course_price' => 'required',
            'course_image' => 'required|image',
            'course_video' => 'required',
            'course_description' => 'required',
            'category_id' => 'required',
            'course_time' => 'required',
            'what_will_you_learn_title' => 'required',
            'what_will_you_learn_description' => 'required',
            'video_title' => 'required',
            'video_category' => 'required',
            'video_url' => 'required',

            'course_expire' => [],
            'course_discount_price' => [],
            'coupon_code' => [],
            'coupon_code_discount_price' => [],
            'whats_includes' => [],
        ];

        if($this->user()->hasRole('Admin')){
            $rules += [
                'isActive' => []
            ];
        }
        return $rules;
    }
}
