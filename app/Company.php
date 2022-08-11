<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
        $this->belongsTo(User::class,'id','user_id');
    }
}
