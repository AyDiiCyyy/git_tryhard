<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $game = Game::query()->latest('id')->paginate(10);
        return view('index',compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->all();
        $data['cover_art'] = $request->file('cover_art')->store('img','public');
        Game::create($data);
        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('edit',compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->all();
        $data['cover_art'] = $game->cover_art;
        if($request->hasFile('cover_art')){
            $data['cover_art'] = $request->file('cover_art')->store('img','public');
            if($game->cover_art!=null){
                if(file_exists('storage/'.$game->cover_art)){
                    unlink('storage/'.$game->cover_art);
                }
            }
        }
        $game->update($data);
        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('game.index');
    }
}
