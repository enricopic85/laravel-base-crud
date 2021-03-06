<?php

namespace App\Http\Controllers;

use App\ComicBook;
use App\Http\Requests\ComicBookStoreRequest;
use Illuminate\Http\Request;

class ComicBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dati=ComicBook::all();

        return view('comic_books.index',compact("dati"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comic_books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicBookStoreRequest $request)
    {
        $data=$request->validate([
            // 'title'=>"required|min:5",
            // 'description'=>"required|min:20",
            // 'thumb'=>"required|url",
            // 'price'=>"required|numeric",
            // 'series'=>"required|min:5",
            // 'sale_date'=>"required|date",
            // 'type'=>"required|min:5"
        ]);
        $data=$request->validated();
        //metodo usando il fill
        // $newComicBook=new ComicBook();
        // $newComicBook->fill($data);
        // $newComicBook->save();
        
        //metodo con create:
        $newComicBook=ComicBook::create($data);
        return redirect()->route("comic_books.show",$newComicBook->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ComicBook $comicBook)
    {
        return view('comic_books.show', compact("comicBook"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ComicBook $comicBook)
    {
        return view('comic_books.edit',compact('comicBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $comicBook=ComicBook::findOrFail($id);
        //esegue sia il fill() che il save()
        $comicBook->update($data);

        return redirect()->route('comic_books.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comicBook=ComicBook::findOrFail($id);
        $comicBook->delete();

        return redirect()->route('comic_books.index');
    }
}
