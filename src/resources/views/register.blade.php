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
      </div>
    </header>

    <main>
    <div class="register-form__content">
      
      <div class="register-form__heading">
        <h2>会員登録</h2>
      </div>


    @if ($errors->any())
      <div>
        <ul>
         @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
         @endforeach
        </ul>
      </div>
    @endif

      <!--登録　-->
      <form class="form" action="/register" method="POST">
      @csrf

      <!-- 名前 -->
  <div class="form__group"> 
    <div class="form__group-title">
        <span class="form__label--item">ユーザー名</span>
    </div>
    <div class="form__input--text">
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
  </div>


  <!-- メールアドレス -->
  <div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
    </div>
    <div class="form__input--text">
        <input type="email" name="email" value="{{ old('email') }}" >
    </div>
  </div>


  <!-- パスワード -->
  <div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">パスワード</span>
    </div>
    <div class="form__input--text">
        <input type="password" name="password" >
    </div>
  </div>


  <!-- 確認用パスワード -->
  <div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">確認用パスワード</span>
    </div>
    <div class="form__input--text">
        <input type="password" name="password_confirmation" >
    </div>
  </div>

  <div class="form__button">
      <button class="form__button-submit" type="submit">登録する</button>
  </div>



  <!-- ログイン画面へ行くボタン -->
  <form action="/login" method="GET">
        <button type="submit">ログインはこちら</button>
    </form>

      
    </div>
    </main>
</body>
</html>