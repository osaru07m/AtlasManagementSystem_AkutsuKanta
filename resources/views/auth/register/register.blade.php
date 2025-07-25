<x-guest-layout>
  <form action="{{ route('registerPost') }}" method="POST">
    <div class="w-100 min-vh-100 d-flex" style="align-items:center; justify-content:center;">
      <div class="w-50 vh-75 border p-4 shadow" style="border-radius: 1rem; background-color: #fff; max-width: 450px;">
        <div class="register_form">
          <div class="d-flex mt-3 gap-1" style="justify-content:space-between; gap:2rem;">
            <div class="flex-grow-1">
              @error('over_name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <label class="d-block m-0" style="font-size:13px">姓</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 over_name" name="over_name">
              </div>
            </div>
            <div class="flex-grow-1">
              @error('under_name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <label class="d-block m-0" style="font-size:13px">名</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 under_name" name="under_name">
              </div>
            </div>
          </div>
          <div class="d-flex mt-3" style="justify-content:space-between; gap:2rem;">
            <div class="flex-grow-1">
              @error('over_name_kana')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <label class="d-block m-0" style="font-size:13px">セイ</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 over_name_kana" name="over_name_kana">
              </div>
            </div>
            <div class="flex-grow-1">
              @error('under_name_kana')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <label class="d-block m-0" style="font-size:13px">メイ</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 under_name_kana" name="under_name_kana">
              </div>
            </div>
          </div>
          <div class="mt-3">
            @error('mail_address')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            <label class="m-0 d-block" style="font-size:13px">メールアドレス</label>
            <div class="border-bottom border-primary">
              <input type="mail" class="w-100 border-0 mail_address" name="mail_address">
            </div>
          </div>
        </div>
        <div class="mt-3">
          @error('sex')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="d-flex justify-content-around align-items-center">
            <div>
              <input type="radio" name="sex" class="sex" value="1">
              <label style="font-size:13px">男性</label>
            </div>
            <div>
              <input type="radio" name="sex" class="sex" value="2">
              <label style="font-size:13px">女性</label>
            </div>
            <div>
              <input type="radio" name="sex" class="sex" value="3">
              <label style="font-size:13px">その他</label>
            </div>
          </div>
        </div>
        <div class="mt-3">
          @error('old_day')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label class="d-block m-0 aa" style="font-size:13px">生年月日</label>
          <div class="d-flex align-items-center" style="gap:.5rem;">
            <div class="border-bottom border-primary flex-grow-1">
              <select class="old_year border-0 w-100" name="old_year">
                <option value="none">-----</option>
                @for($year = 2000; $year <= date('Y'); $year++)
                <option value="{{ $year }}">{{ $year }}</option>
                @endfor
              </select>
            </div>
            <label class="mb-0" style="font-size:13px">年</label>
            <div class="border-bottom border-primary flex-grow-1">
              <select class="old_month border-0 w-100" name="old_month">
                <option value="none">-----</option>
                @for($month = 1; $month <= 12; $month++)
                <option value="{{ sprintf('%02d', $month) }}">{{ $month }}</option>
                @endfor
              </select>
            </div>
            <label class="mb-0" style="font-size:13px">月</label>
            <div class="border-bottom border-primary flex-grow-1">
              <select class="old_day border-0 w-100" name="old_day">
                <option value="none">-----</option>
                @for ($day = 1; $day <= 31; $day++)
                <option value="{{ sprintf('%02d', $day) }}">{{ $day }}</option>
                @endfor
              </select>
            </div>
            <label class="mb-0" style="font-size:13px">日</label>
          </div>
        </div>
        <div class="mt-3">
          @error('role')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label class="d-block m-0" style="font-size:13px">役職</label>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <input type="radio" name="role" class="admin_role role" value="1">
              <label style="font-size:13px">教師(国語)</label>
            </div>
            <div>
              <input type="radio" name="role" class="admin_role role" value="2">
              <label style="font-size:13px">教師(数学)</label>
            </div>
            <div>
              <input type="radio" name="role" class="admin_role role" value="3">
              <label style="font-size:13px">教師(英語)</label>
            </div>
            <div>
              <input type="radio" name="role" class="other_role role" value="4">
              <label style="font-size:13px" class="other_role">生徒</label>
            </div>
          </div>
        </div>
        <div class="select_teacher d-none">
          @error('subject')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label class="d-block m-0" style="font-size:13px">選択科目</label>
          @foreach($subjects as $subject)
          <div class="">
            <input type="checkbox" name="subject[]" value="{{ $subject->id }}">
            <label>{{ $subject->subject }}</label>
          </div>
          @endforeach
        </div>
        <div class="mt-3">
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label class="d-block m-0" style="font-size:13px">パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100 password" name="password">
          </div>
        </div>
        <div class="mt-3">
          @error('password_confirmation')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label class="d-block m-0" style="font-size:13px">確認用パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100 password_confirmation" name="password_confirmation">
          </div>
        </div>
        <div class="mt-5 text-right">
          <input type="submit" class="btn btn-primary register_btn" disabled value="新規登録" onclick="return confirm('登録してよろしいですか？')">
        </div>
        <div class="text-center">
          <a href="{{ route('loginView') }}">ログイン</a>
        </div>
      </div>
      {{ csrf_field() }}
    </div>
  </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/register.js') }}" rel="stylesheet"></script>
</x-guest-layout>
