<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','image','description','price','stock','category_id'];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }
}
