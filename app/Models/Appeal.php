<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Appeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'personal_account',
        'subject',
        'message',
        'status',
        'operator_id'
    ];

     public function comments()
    {
        return $this->hasMany(Comment::class, 'appeal_id');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

}
