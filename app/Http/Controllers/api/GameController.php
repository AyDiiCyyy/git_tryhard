<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $game = Game::query()->latest('id')->paginate(10);
        return response()->json($game);
    }
    public function show(Game $game)
    {
        return response()->json($game);
    }
    public function store(StoreGameRequest $request)
    {
        $data = $request->all();
        $data['cover_art'] = $request->file('cover_art')->store('img','public');
        $game = Game::create($data);
        return response()->json($game);
    }
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
        return response()->json($game);
    }
    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json('xóa thành công');
    }
}
