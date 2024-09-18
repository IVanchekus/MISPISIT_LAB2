<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шутеечки</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; }
        .form-group button { padding: 10px 15px; background-color: #007BFF; color: white; border: none; cursor: pointer; }
        .jokes-list { margin-top: 20px; }
        .jokes-list h3 { margin-bottom: 10px; }
        .jokes-list ul { list-style: none; padding: 0; }
        .jokes-list li { margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; }
        .actions { margin-top: 10px; }
        .actions a { margin-right: 10px; text-decoration: none; color: #007BFF; }
        .actions form { display: inline; }
        .actions button { background: none; border: none; color: #FF0000; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добавьте анекдот</h1>
        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif
        <form action="{{ route('jokes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Название анекдота</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="content">Текст</label>
                <textarea name="content" id="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Добавить прикол</button>
            </div>
        </form>

        <div class="jokes-list">
            <h2>Все шутки</h2>
            <ul>
                @foreach($jokes as $joke)
                    <li>
                        <h3>{{ $joke->title }}</h3>
                        <p>{{ $joke->content }}</p>
                        <div class="actions">
                            <a href="{{ route('jokes.edit', $joke->id) }}">Изменить</a>
                            <form action="{{ route('jokes.destroy', $joke->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>