<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total URL Clicks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <section id="content">
        <h1>Total URL Clicks</h1>
        <p>The number of clicks from the shortened URL that redirected the user to the destination page.</p>
        <div class="squareboxurl"><a href="{{ $shortUrl }}" target="_blank">{{ $shortUrl }}</a></div>
        <br>
        <div class="squarebox"><div class="squareboxtext">{{ $clicksCount }}</div></div>
        <p>
            <a href="/url-click-counter" class="colorbuttonsmall">Track clicks from another short URL</a><br>
            <a href="/" class="colorbuttonsmall">Shorten another URL</a>
        </p>
    </section>
</div>
</body>
</html>
