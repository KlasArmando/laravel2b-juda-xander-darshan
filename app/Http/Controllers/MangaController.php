<?php

namespace App\Http\Controllers;

use App\Manga;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    function __contstruct()
    {
        $this->middleware('permission:manga-list');
        $this->middleware('permission:manga-create', ['only' => ['create','store']]);
        $this->middleware('permission:manga-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:manga-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manga = Manga::latest()->paginate(5);
        return view('manga.index',compact('manga'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        Manga::create($request->all());


        return redirect()->route('manga.index')
                        ->with('success','Manga created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        return view('manga.show',compact('manga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        return view('manga.edit',compact('manga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manga $manga)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        $manga->update($request->all());


        return redirect()->route('manga.index')
                        ->with('success','Manga updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        $manga->delete();


        return redirect()->route('manga.index')
                        ->with('success','Manga deleted successfully');
    }
}
