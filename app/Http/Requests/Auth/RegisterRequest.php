<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'over_name' => ['required', 'string', 'max:10'],
            'under_name' => ['required', 'string', 'max:10'],
            'over_name_kana' => ['required', 'string', 'regex:/^[ァ-ヶー]+$/u', 'max:30'],
            'under_name_kana' => ['required', 'string', 'regex:/^[ァ-ヶー]+$/u', 'max:30'],
            'mail_address' => ['required', 'email', 'max:100', 'unique:users,mail_address'],
            'sex' => ['required', 'in:1,2,3'],
            'old_year' => ['required', 'min:2000', 'max:' . now()->year],
            'old_month' => ['required', 'between:1,12'],
            'old_day' => ['required', 'between:1,31'],
            'role' => ['required', 'in:1,2,3,4'],
            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed'],
            'subject' => ['nullable', 'array'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $this->validateBirthDate($validator);
        });
    }

    private function validateBirthDate($validator)
    {
        if(
            $this->input('old_year') === 'none' ||
           $this->input('old_month') === 'none' ||
           $this->input('old_day') === 'none'
        ) {
            $validator->errors()->add('old_day', '生年月日を正しく選択してください。');
            return;
        }

        $year  = (int) $this->input('old_year');
        $month = (int) $this->input('old_month');
        $day   = (int) $this->input('old_day');

        if (!checkdate($month, $day, $year)) {
            $validator->errors()->add('old_day', '正しい日付を選択してください。');
            return;
        }

        $birthDate = sprintf('%04d-%02d-%02d', $year, $month, $day);
        if ($birthDate < '2000-01-01' || $birthDate > now()->format('Y-m-d')) {
            $validator->errors()->add('old_day', '2000年1月1日以降、今日以前の日付を選択してください。');
        }
    }

    public function messages()
    {
        return [
            'over_name.required' => '姓は必須項目です。',
            'over_name.string' => '文字列で入力してください。',
            'over_name.max' => '10文字以下で入力してください。',
            'under_name.required' => '名は必須項目です。',
            'under_name.string' => '文字列で入力してください。',
            'under_name.max' => '10文字以下で入力してください。',
            'over_name_kana.required' => 'セイは必須項目です。',
            'over_name_kana.regex'  => 'セイは全角カタカナで入力してください。',
            'under_name_kana.required' => 'メイは必須項目です。',
            'under_name_kana.regex' => 'メイは全角カタカナで入力してください。',
            'mail_address.required' => 'メールアドレスは必須項目です。',
            'mail_address.email' => 'メールアドレスの形式で入力してください。',
            'mail_address.max' => '100文字で入力してください。',
            'mail_address.unique' => '登録済みのメールアドレスです。',
            'sex.required' => '性別は必須項目です。',
            'old_year.required' => '年は必須項目です。',
            'old_year.date' => '正しい年で入力してください。',
            'old_year.after' => '2000年以降で入力してください。',
            'old_year.before' => '今日まで入力してください。',
            'old_month.required' => '月は必須項目です。',
            'old_month.data' => '正しい月で入力してください。',
            'old_month.after' => '2000年以降で入力してください。',
            'old_month.before' => '今日まで入力してください。',
            'old_day.required' => '日は必須項目です。',
            'old_day.data' => '正しい日で入力してください。',
            'old_day.after' => '2000年以降で入力してください。',
            'old_day.before' => '今日まで入力してください。',
            'role.required' => '権限は必須項目です。',
            'password.required' => 'パスワードは必須項目です。',
            'password.max' => 'パスワードは30文字以内入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }
}
