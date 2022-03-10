@extends('partials.home')

@section('content')
<a href="{{route('comic_books.edit',$comicBook->id)}}">Modifica</a>
<form action="{{route('comic_books.destroy',$comicBook->id)}} " method="POST">
    @csrf
    @method("delete")
    <button type="submit">Elimina</button>
</form>
@endsection