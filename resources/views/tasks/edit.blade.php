<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>新規タスク投稿</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.update', $task) }}" method="post">
    @csrf
    @method('PATCH')
        <label for="title">タイトル</label><br>
        <input type="text" name="title" value="{{ old('title', $task->title) }}"><br>
        <br>
        <label for="body">内容</label><br>
        <textarea name="body">{{ old('body', $task->body) }}</textarea><br>
        <br>
        <input type="submit" value="更新">
    </form>
        <button onclick="location.href='{{ route('tasks.show', $task) }}'">詳細に戻る</button>
</body>
</html>
