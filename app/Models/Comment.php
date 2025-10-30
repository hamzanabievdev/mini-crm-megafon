<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appeal;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'backoffice_id',
        'appeal_id'
    ];

     public function appeal()
    {
        return $this->belongsTo(Appeal::class, 'appeal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'backoffice_id');
    }
}
