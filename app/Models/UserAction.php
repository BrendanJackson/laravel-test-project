<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'severity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
