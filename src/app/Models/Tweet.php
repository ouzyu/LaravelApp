<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * ツイートモデル
     * 
     * @property string $text
     */

     protected $fillable = [
        'text'
     ];

     public function user()
     {
        return $this->belongsTo(User::class);
     }

     public function favorites()
     {
        return $this->hasMany(favorite::class);
     }

     public function comments()
     {
        return $this->hasMany(Comment::class);
     }
}
