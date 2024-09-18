<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить прикол</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; }
        .form-group button { padding: 10px 15px; background-color: #007BFF; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Изменить прикол</h1>
        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif
        <form action="{{ route('jokes.update', $joke->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название анекдота</label>
                <input type="text" name="title" id="title" value="{{ $joke->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Текст</label>
                <textarea name="content" id="content" rows="5" required>{{ $joke->content }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit">Обновить прикол</button>
            </div>
        </form>
    </div>
</body>
</html>