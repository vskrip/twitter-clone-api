<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Twitt extends Model
{
    protected $fillable = ['user_id', 'body'];

    protected $table = 'twitts';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The method returns list of followed twitts for user by passed user identifier
     *
     * @var $id - user's identirier
     * @return \App\Twitt
     */
    public static function latestTwitts($id)
    {
        // TODO: tix the issue "Call to a member function pluck() on null"

        $followed_users = User::find($id)->following->pluck('id');

        $followed_twitts = self::whereIn('user_id', $followed_users)
            ->orWhere('user_id', $id)
            ->orderBy('twitts.created_at', 'desc');

        return $followed_twitts;
    }
}
