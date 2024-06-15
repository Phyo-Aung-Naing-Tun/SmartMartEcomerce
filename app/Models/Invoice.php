<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_info',
        'total',
        'payment',
        'sended_to',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}