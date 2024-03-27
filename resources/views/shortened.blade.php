<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortened URL</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Your Shortened URL</h1>
    <div id="formurl" class="mw450">
        <input id="shortenurl" type="text" value="{{ $shortenedUrl }}" onclick="this.select();">
        <div id="formbutton">
            <button data-clipboard-target="#shortenurl" class="copy">Copy URL</button>
        </div>
        <div id="balloon" style="display: none;">URL Copied</div>
    </div>
    <div class="mw450dblock">
        <p class="boxtextleft">
            Long URL: <a href="{{ $originalUrl }}" target="_blank">{{ $originalUrl }}</a><br><br>
            <a href="/stats/{{ $code }}" class="colorbuttonsmall">Total clicks of your short URL</a><br>
            <a href="/" class="colorbuttonsmall">Shorten another URL</a><br><br>
        </p>
    </div>
</div>
<script>
    new ClipboardJS('.copy');
    document.querySelector('.copy').addEventListener('click', function() {
        document.querySelector('#balloon').style.display = 'block';
        setTimeout(function() {
            document.querySelector('#balloon').style.display = 'none';
        }, 2000);
    });
</script>
</body>
</html>
