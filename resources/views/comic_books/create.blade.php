@extends('partials.home')

@section('content')
@dump($errors->all())
@foreach ($errors->all as $error)
   <ul>
     <li>{{$error}}</li>
   </ul>
@endforeach
<form action="{{route('comic_books.store')}}" method="post">
  @csrf
  <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
      <label class="form-label">Descrizione</label>
      <input type="text" class="form-control" name="description">
    </div>
    <div class="mb-3">
      <label class="form-label">Immagine</label>
      <input type="text" class="form-control" name="thumb">
    </div>
    <div class="mb-3">
      <label class="form-label">Prezzo</label>
      <input type="number"  class="form-control" name="price">
    </div>
    <div class="mb-3">
      <label class="form-label">Serie</label>
      <input type="text" class="form-control" name="series">
    </div>
    <div class="mb-3">
      <label class="form-label">Sale data</label>
      <input type="datetime-local" class="form-control" name="sale_date">
    </div>
    <div class="mb-3">
      <label class="form-label">Tipo</label>
      <input type="text" class="form-control" name="type">
    </div>
  <button type="reset ">Indietro</button>
  <button type="submit">Crea</button>
</form>
@endsection

