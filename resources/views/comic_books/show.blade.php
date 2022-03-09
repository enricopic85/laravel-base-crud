<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('comic_books.edit'), $comicBook->id}}">Modifica</a>
    <form action="{{route('comic_books.destroy'), $comicBook->id}} " method="POST">
        @csrf
        @method("delete")
        <button type="submit">Elimina</button>
    </form>
</body>
</html>