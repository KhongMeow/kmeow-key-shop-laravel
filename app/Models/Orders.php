<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'UserID'
    ];
    public function orderItems()
    {
        return $this->hasMany(Orders::class);
    }
}
