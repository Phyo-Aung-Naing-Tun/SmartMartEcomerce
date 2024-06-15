<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'images',
        'price',
        'description',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}