<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'total',
        'qty',
        'code_id',
    ];
    public $timestamps = true;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->code_id = Str::random(8);
        });
    }
}
