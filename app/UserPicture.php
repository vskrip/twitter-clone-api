<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserPicture extends Model
{
    protected $table = 'user_pictures';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
