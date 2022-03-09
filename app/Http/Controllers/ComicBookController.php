<?php

namespace App\Http\Controllers;

use App\ComicBook;
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
    public function store(Request $request)
    {
        $data=$request->all();
        $newComicBook=new ComicBook();
        $newComicBook->title=$data["title"];
        $newComicBook->description=$data["description"];
        $newComicBook->thumb=$data["thumb"];
        $newComicBook->price=$data["price"];
        $newComicBook->series=$data["series"];
        $newComicBook->sale_date=$data["sale_date"];
        $newComicBook->type=$data["type"];
        $newComicBook->save();
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
    public function edit($id)
    {
        $comicBook=ComicBook::findOrFail($id);

        return view('comic_books.edit',compact("comicBook"));
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
        $comicBook=ComicBook::findOrFail();
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
