<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AtlasBulletinBoard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Oswald:wght@200&display=swap" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>
    <body class="all_content">
        <div class="d-flex">
            <div class="sidebar py-2" style="word-break: keep-all;">
                <p class="mb-0"><a href="{{ route('top.show') }}" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-house"></i>トップ</a></p>
                <p class="mb-0"><a href="/logout" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-arrow-right-from-bracket"></i>ログアウト</a></p>
                <p class="mb-0"><a href="{{ route('calendar.general.show',['user_id' => Auth::id()]) }}" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-calendar"></i>スクール予約</a></p>
                @if (Auth::user()->role !== 4)
                <p class="mb-0"><a href="{{ route('calendar.admin.show',['user_id' => Auth::id()]) }}" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-calendar-check"></i>スクール予約確認</a></p>
                <p class="mb-0"><a href="{{ route('calendar.admin.setting',['user_id' => Auth::id()]) }}" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-calendar-plus"></i>スクール枠登録</a></p>
                @endif
                <p class="mb-0"><a href="{{ route('post.show') }}" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-message"></i>掲示板</a></p>
                <p class="mb-0"><a href="{{ route('user.show') }}" class="d-flex justify-content-start align-items-center p-2 text-decoration-none" style="gap: .25rem;"><i class="fa-solid fa-user-group"></i>ユーザー検索</a></p>
            </div>
            <div class="main-container">
                {{ $slot }}
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/bulletin.js') }}" rel="stylesheet"></script>
        <script src="{{ asset('js/user_search.js') }}" rel="stylesheet"></script>
        <script src="{{ asset('js/calendar.js') }}" rel="stylesheet"></script>
    </body>
</html>
