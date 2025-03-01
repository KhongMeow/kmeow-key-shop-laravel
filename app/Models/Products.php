<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Name',
        'TypeID',
        'Detail',
        'Description',
        'Image',
        'Price'
    ];
    public function productTypes()
    {
        return $this->belongsTo(ProductTypes::class, 'TypeID');
    }
    public function licenseKeys()
    {
        return $this->hasMany(LicenseKeys::class);
    }
}
