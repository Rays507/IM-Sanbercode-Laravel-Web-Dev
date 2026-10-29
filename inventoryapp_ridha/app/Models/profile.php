<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = "profile";
    protected $fillable = ['id','age','bio','user_id'];

    public function user()
    {
        return $this->belongsTo(users::class, 'user_id');
    }
}
