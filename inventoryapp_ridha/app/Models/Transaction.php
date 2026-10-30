<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Users;
use App\Models\Products;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['id','type','product_id','user_id','amount','notes'];

    public function user()
    {
        return $this->belongsTo(users::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(products::class, 'product_id');
    }
}
