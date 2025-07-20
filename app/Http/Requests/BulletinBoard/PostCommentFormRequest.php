<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentFormRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:250',
        ];
    }

    public function messages(){
        return [
            'post_id.required' => '投稿IDは必須です。',
            'post_id.exists' => '指定された投稿が存在しません。',
            'comment.required' => 'コメントは必須です。',
            'comment.string' => 'コメントは文字列でなければなりません。',
            'comment.max' => 'コメントは250文字以内で入力してください。',
        ];
    }
}
