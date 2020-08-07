<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Twitt extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function latestTwitts()
    {
        $followed_users = User::find(auth()->user()->id)->following->pluck('id');

        $followed_twitts = self::whereIn('user_id', $followed_users)
            ->orWhere('user_id', auth()->user()->id)
            ->orderBy('twitts.created_at', 'desc')
            ->paginate(10);

        return $followed_twitts;
    }
}
