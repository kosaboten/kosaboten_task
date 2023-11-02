<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>タスク一覧</h1>
    @foreach ($tasks as $task)
        <div style="display: flex;">
            <a href="{{ route('tasks.show', $task) }}" style="margin-right: 10px">{{ $task->title }}</a>
            <form action="{{ route('tasks.destroy', $task) }}"method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false;}">
            </form>
        </div>
    @endforeach

    <hr>

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
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <label for="title">タイトル</label><br>
        <input type="text" name="title" value="{{ old('title') }}"><br>
        <br>
        <label for="body">内容</label><br>
        <textarea name="body">{{ old('body') }}</textarea><br>
        <br>
        <input type="submit" value="Create Task">
    </form>
</body>

</html>
