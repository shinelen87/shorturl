<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorten Your URL</title>
    <link rel="stylesheet" href="style.css"> <!-- Переконайтеся, що шлях до вашого CSS файлу вірний -->
</head>
<body>
<div class="container">
    <h1>Paste the URL to be shortened</h1>
    <form action="{{ route('short-links.store') }}" method="POST">
        @csrf
        <input type="url" name="url" placeholder="Enter your URL here" required>
        <input type="datetime-local" name="expires_at" placeholder="Expiration Date and Time">
        <button type="submit">Shorten URL</button>
    </form>
</div>
</body>
</html>
