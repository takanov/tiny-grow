<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function store(Request $request)
    {
        logger($request);
        request()->validate([
            'board_id' => ['required', 'exists:boards,id'],
            'card_list_id' => ['required', 'exists:card_lists,id'],
            'title' => ['required']
        ]);

        Card::create([
            'board_id' => request('board_id'),
            'card_list_id' => request('card_list_id'),
            'title' => request('title'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Card created successfully.');
    }

    public function update(Card $card)
    {
        request()->validate([
            'title' => ['required']
        ]);

        $card->update(['title' => request('title')]);

        return redirect()->back();
    }

    public function move(Card $card)
    {
        request()->validate([
            'cardListId' => ['required', 'exists:card_lists,id'],
            'position' => ['required', 'numeric']
        ]);

        $card->update([
            'card_list_id' => request('cardListId'),
            'position' => round(request('position'), 5)
        ]);

        return redirect()->back();
    }
}
