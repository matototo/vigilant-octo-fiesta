<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show PDF</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
</head>
<body>
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->description }}</p>
    <hr>
    <ul>
        <li><strong>Author :</strong> {{ $article->user->name }}</li>
        <li><strong>Category :</strong> {{ $article->category ? $article->category->category[app()->getLocale()] ?? $article->category->category['en'] : '' }}</li>
    </ul>
    
    <hr>   
</body>
</html>