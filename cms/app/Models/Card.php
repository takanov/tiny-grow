<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Card extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'board_id',
        'card_list_id',
        'user_id',
        'title',
        //'name',
        'description',
    ];


    const POSITION_GAP = 60000;
    const POSITION_MIN = 0.00002;

    public static function booted() {
        static::creating(function ($model) {
            $model->position = self::query()->where('card_list_id', $model->card_list_id)->orderByDesc('position')->first()?->position + self::POSITION_GAP;
        });

        static::saved(function ($model) {
            if ($model->position < self::POSITION_MIN) {
                DB::statement("SET @previousPosition := 0");
                DB::statement("
                    UPDATE cards
                    SET position = (@previousPosition := @previousPosition + ?)
                    WHERE card_list_id = ?
                    ORDER BY position
                ", [
                        self::POSITION_GAP,
                        $model->card_list_id
                    ]
                );
            }
        });
    }
    public function cardList()
    {
      return $this->belongsTo(CardList::class);
    }
}
