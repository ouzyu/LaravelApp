<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    
    /**
     * フォロワーモデル
     * 
     * @property integer $following_id
     * @property integer $followed_id
     */

     protected $primaryKey = [
        'following_id',
        'followed_id'
     ];

     protected $fillable = [
        'following_id',
        'followed_id'
     ];

     public $timestamps = false;
     public $incrementing = false;
}