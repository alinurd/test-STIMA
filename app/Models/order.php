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
        'productName',
    ];
    public $timestamps = true;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->code_id = Str::random(8);
        });
    }
    public function order_product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function order_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
