<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coachtech</title>
</head>
<body>
    <form method="POST" action="{{route('logout')}}">
        @csrf
        <button type="submit">ログアウト</button>
        <div>メールを送信しました。認証ボタンを押してください。</div>
</form>
</body>
</html>