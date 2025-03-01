<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseKeys extends Model
{
    use HasFactory;
    protected $table = 'license_keys';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ProductID',
        'LicenseKeys',
        'Status'
    ];
    public function products()
    {
        return $this->belongsTo(Products::class, 'ProductID');
    }
}
