<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    function __contstruct()
    {
        $this->middleware('permission:anime-list');
        $this->middleware('permission:anime-create', ['only' => ['create','store']]);
        $this->middleware('permission:anime-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:anime-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anime = Anime::where('is_archived',0)->latest()->paginate(10);
        return view('anime.index',compact('anime'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anime.create');
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
            'title' => 'required',
            'episodes' => 'required',
            'description' => 'required',
            'aired' => 'required',
        ]);


        anime::create($request->all());


        return redirect()->route('anime.index')
            ->with('success','anime created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime)
    {
        return view('anime.show',compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        return view('anime.edit',compact('anime'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {
        request()->validate([
            'title' => 'required',
            'episodes' => 'required',
            'description' => 'required',
            'aired' => 'required',
        ]);


        $anime->update($request->all());


        return redirect()->route('anime.index')
            ->with('success','anime updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();


        return redirect()->route('anime.archivedIndex')
            ->with('success','Anime deleted successfully');
    }

    public function archive(Anime $anime)
    {
        $anime->is_archived = 1;
        $anime->save();
        return redirect()->route('anime.index')
            ->with('success','Anime archived successfully');
    }

    public function reuse(Anime $anime)
    {
        $anime->is_archived = 0;
        $anime->save();
        return redirect()->route('anime.index')
                         ->with('success','Anime re-used successfully');
    }

    public function archivedIndex()
    {
        $anime = Anime::where('is_archived',1)->latest()->paginate(5);
        return view('anime.archived',compact('anime'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function search(){
        $anime = Anime::where('title', 'LIKE', '%' . request('title') . '%')->paginate(5);
        return view('anime.index', compact('anime'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
