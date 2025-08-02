<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Note PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111;
            padding: 20px;
        }
        h1 {
            color: #2d3748;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ $note->title }}</h1>
    <div class="content">
        {!! $note->content !!}
    </div>
</body>
</html>
