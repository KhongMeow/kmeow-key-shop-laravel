<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypes extends Model
{
    use HasFactory;
    protected $table = 'product_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Name'
    ];
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
