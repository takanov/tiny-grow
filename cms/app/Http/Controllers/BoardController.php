<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}