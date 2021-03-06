@extends('partials.home')

@section('content')
<h1>Modifica {{$comicBook->id}}</h1>
<form action="{{route('comic_books.update',$comicBook->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" name="title" value="{{$comicBook->title}}">
      </div>
      <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <input type="text" class="form-control" name="description" value="{{$comicBook->description}}">
      </div>
      <div class="mb-3">
        <label class="form-label">Immagine</label>
        <input type="text" class="form-control" name="thumb" value="{{$comicBook->thumb}}">
      </div>
      <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <input type="number"  class="form-control" name="price" value="{{$comicBook->price}}">
      </div>
      <div class="mb-3">
        <label class="form-label">Serie</label>
        <input type="text" class="form-control" name="series" value="{{$comicBook->series}}">
      </div>
      <div class="mb-3">
        <label class="form-label">Sale data</label>
        <input type="datetime-local" class="form-control" name="sale_date" value="{{$comicBook->sale_date}}">
      </div>
      <div class="mb-3">
        <label class="form-label">Tipo</label>
        <input type="text" class="form-control" name="type" value="{{$comicBook->type}}">
      </div>
    <button type="reset ">Indietro</button>
    <button type="submit">Crea</button>
</form>
@endsection