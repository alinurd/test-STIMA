<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Confirmation extends Model
{
    use HasFactory;
    protected $table = 'confirmations';
    protected $fillable = [
        'user_id',
        'token', 
    ];
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($confirmation) {
            $confirmation->token = Str::random(30);
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
