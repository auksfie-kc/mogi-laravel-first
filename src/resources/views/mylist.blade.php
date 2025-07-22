<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coachtech</title>
</head>
<body>
    <header>
      <div class="header__inner">
        <a class="header__logo" href="/register">
        Coachtech
        </a>
        <nav>
         <ul class="header-nav">
         @if (Auth::check())
           <li class="header-nav__item">
             <form action="/logout" method="POST">
             @csrf 
             <button class="header-nav__button">
             ログアウト</button>
           </li>
         @endif
         </ul>
        </nav>
      </div>
    </header>

    <main>
    <div class="register-form__content">
      <div class="register-form__heading">
        <h2>商品一覧トップ画面（ログイン後）</h2>
      </div>
      <h2>ようこそ {{ Auth::user()->name }} さん！</h2>
      <p>ここは会員専用ページです。マイリスト</p>
      
      <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit">ログアウト</button>
      </form>
    </div>
</main>
</body>
</html>