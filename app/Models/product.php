<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 
class product extends Model
{
    use HasFactory;

    protected $table = 'products';  
    protected $fillable = ['name', 'stok', 'price', 'code','created', 'update', 'desc'];
    public $timestamps = true;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->code = Str::random(6);
        });
    }
}
