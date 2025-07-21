<x-sidebar>
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area mx-auto w-75 vh-100 d-flex flex-wrap gap-2 p-2">
    @foreach($users as $user)
    <div class="one_person rounded shadow p-2 flex-shrink-1 d-flex flex-column justify-content-between">
      <div>
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>
      <div>
        <span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="text-info text-decoration-none">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span>カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span>性別 : </span><span>女</span>
        @else
        <span>性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span>権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span>権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span>権限 : </span><span>講師(英語)</span>
        @else
        <span>権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span>選択科目 :</span>
        @foreach($user->subjects as $subject) {{ $subject->subject }}  @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 border">
    <div class="px-2 py-3">
      <p class="mb-2 fs-4">検索</p>
      <div>
        <input type="text" class="free_word form-control" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="mb-2">
        <label class="form-label mb-0">カテゴリ</label>
        <select form="userSearchRequest" name="category" class="form-select w-50">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="mb-2">
        <label class="form-label mb-0">並び替え</label>
        <select name="updown" form="userSearchRequest" class="form-select w-50">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="">
        <p class="mb-1 search_conditions border-bottom p-2 d-flex justify-content-between align-items-center">
          <span>検索条件の追加</span>
          <i class="fa-solid fa-chevron-down"></i>
        </p>
        <div class="search_conditions_inner mb-2 pt-2">
          <div class="mb-2">
            <label class="d-block">性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div class="mb-2">
            <label class="d-block">権限</label>
            <select name="role" form="userSearchRequest" class="engineer form-select w-50">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label class="d-block">選択科目</label>
            <div class="d-flex justify-content-start align-items-center flex-wrap gap-3">
              @foreach($subjects as $subject)
              <div>
                <span>{{ $subject->subject }}</span>
                <input type="checkbox" name="subject[]" value="{{ $subject->id }}" form="userSearchRequest">
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="my-2">
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="btn btn-primary w-100">
      </div>
      <div>
        <input type="reset" value="リセット" form="userSearchRequest" class="btn btn-secondary w-100">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
</x-sidebar>
