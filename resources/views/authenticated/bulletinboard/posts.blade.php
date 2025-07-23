<x-sidebar>
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p class="text-muted"><span>{{ $post->user->over_name }}</span><span class="ms-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}" class="text-reset text-decoration-none">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="category_badges">
          @foreach ($post->subCategories as $sub_category)
          <span class="badge text-white bg-info">{{ $sub_category->sub_category }}</span>
          @endforeach
        </div>
        <div class="d-flex post_status gap-3">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">{{ $post->commentCounts($post->id)->count() }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $post->postLikes->count() }}</span></p>
            @else
            <p class="m-0"><i class="fa-regular fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $post->postLikes->count() }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25">
    <div class="mx-2 my-4">
      <div class="mb-3"><a href="{{ route('post.input') }}" class="btn btn-info d-block text-white">投稿</a></div>
      <div class="d-flex justify-content-stretch mb-3">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="flex-grow-1 border rounded-start" style="background-color: transparent;">
        <input type="submit" value="検索" form="postSearchRequest" class="border rounded-end bg-info px-3 py-2 text-white">
      </div>
      <div class="d-flex justify-content-center align-items-center gap-1 mb-3">
        <input type="submit" name="like_posts" class="category_btn" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="category_btn" value="自分の投稿" form="postSearchRequest">
      </div>
      <p class="mb-0">カテゴリー検索</p>
      <ul class="list-group list-group-flush">
        @foreach($categories as $category)
        <li class="main_categories border-bottom p-2 d-flex justify-content-between align-items-center" category_id="{{ $category->id }}">
          <span>{{ $category->main_category }}</span>
          <i class="fa-solid fa-chevron-down"></i>
        </li>
        <ul class="sub_categories category_num{{ $category->id }}">
          @foreach($category->subCategories as $sub_category)
          <li class="sub_category" category_id="{{ $category->id }}" sub_category_id="{{ $sub_category->id }}">
            <a href="{{ route('post.show', ['category_word' => $sub_category->sub_category]) }}" class="text-reset text-decoration-none p-2 d-block border-bottom w-75">{{ $sub_category->sub_category }}</a>
          </li>
          @endforeach
        </ul>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
