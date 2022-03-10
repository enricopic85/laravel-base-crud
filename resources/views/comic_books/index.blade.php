@extends('partials.home')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($dati as $dato)
            <div class="col-3">
                <div class="card " style="width: 18rem;">
                    <img class="card-img-top" src={{$dato->thumb}} alt="Card image cap">
                    <div class="card-body ">
                    <h5 class="card-title">{{$dato->title}}</h5>
                    <p class="card-text">{{$dato->description}}</p>
                    <a href="{{route('comic_books.edit',$dato->id)}}">Modifica</a>
                    <form action="{{route('comic_books.destroy',$dato->id)}} " method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit">Elimina</button>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>  
    
@endsection
