<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coachtech</title>
</head>
<body>
    <div>認証しました
</div>
<h1>ようこそ {{ Auth::user()->name }} さん！</h1>
<p>ここは会員専用ページです。</p>
<form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit">ログアウト</button>
</form>
</body>
</html>