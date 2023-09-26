<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * コメントモデル
     * 
     * @property string $text
     */

     protected $fillable [
        'text'
     ];

     public function user()
     {
        return $this->belongsTo(User::class);
     }
}
