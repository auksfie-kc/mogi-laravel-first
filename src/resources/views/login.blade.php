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
        <h2>ログイン</h2>
      </div>

      <!--送信-->
      <form class="form" action="/login" method="POST">
      @csrf

      

  <!-- メールアドレス -->
  <div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
    </div>
    <div class="form__input--text">
        <input type="email" name="email" value="{{ old('email') }}">
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


  

  <div class="form__button">
      <button class="form__button-submit" type="submit">ログインする</button>
  </div>



  <!-- 会員登録画面へ行くボタン -->
  <form action="/register" method="GET">
        <button type="submit">会員登録はこちら</button>
    </form>

      </>
    </div>
    </main>
</body>
</html>