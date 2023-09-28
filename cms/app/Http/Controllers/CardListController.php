<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\CardList;

class CardListController extends Controller
{
    public function store(Board $board)
    {
        request()->validate([
            'name' => ['required']
        ]);

        CardList::create([
            'board_id' => $board->id,
            'user_id' => auth()->id(),
            'name' => request('name')
        ]);

        return redirect()->back();
    }

    public function destroy(CardList $cardList)
    {
        // 確認: 現在のユーザーがこのカードリストを削除する権限があるか
        //$this->authorize('delete', $cardList);

        // カードリストを削除する
        $cardList->delete();
        return redirect()->back();
    }
}
