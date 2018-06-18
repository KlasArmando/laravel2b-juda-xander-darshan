<?php

namespace App\Http\Controllers;

use App\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backgrounds = Background::all();
        return view('background.index',compact('backgrounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('background.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:backgrounds',
            'color' => 'required',
        ]);

        Background::create($request->all());

        return redirect()->route('background.index')
                        ->with('success','Background created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function show(Background $background)
    {
        return view('background.show',compact('background'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function edit(Background $background)
    {
        return view('background.edit',compact('background'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Background $background)
    {
        $validatedData = request()->validate([
            'name' => 'required|unique:backgrounds,name,'.$background->id,
            'color' => 'required',
        ]);

        $background->update($request->all());

        return redirect()->route('background.index')
                        ->with('success','Background updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function destroy(Background $background)
    {
        $background->delete();

        return redirect()->route('background.index')
                        ->with('success','Background deleted successfully');
    }
}
