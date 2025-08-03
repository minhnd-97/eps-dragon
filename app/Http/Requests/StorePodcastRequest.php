<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePodcastRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép mọi user gọi request này, nếu cần auth thì thay đổi logic tại đây
    }

    public function rules()
    {
        //$this->dd($this->all());
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'blank_text' => 'required|string',
            'description' => 'required|nullable|string',
            'source' => 'nullable|string',
            'audio_file' => 'nullable|file|mimes:mp3,wav|max:10240', // Tối đa 10MB
            'image' => 'nullable|image|max:2048', // validate ảnh (2MB)
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'content.required' => 'Nội dung là bắt buộc.',
            'blank_text.required' => 'Blank text là bắt buộc.',
            'audio_file.mimes' => 'Chỉ chấp nhận tệp mp3 hoặc wav.',
        ];
    }
}
