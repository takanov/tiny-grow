<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Inertia\Inertia;


class BoardController extends Controller
{
    public function index(){
        return Inertia::render('Boards', [
            'boards' => auth()->user()->boards
        ]);
    }


    public function show(){
        return Inertia::render('Board');
    }

    public function update(Board $board){
        request()->validate([
            'name' => ['required', 'max:255']
        ]);
        $board->update(['name'=> request('name')]);
        return redirect()->back();
    }


    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);

        Board::create([
            'name' => request('name'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }
}
