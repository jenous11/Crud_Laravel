<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    //
    protected $fillable=['title','text','category_id','image','user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
