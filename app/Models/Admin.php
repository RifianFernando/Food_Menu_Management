<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'namaMenu',
        'kategoriMenu',
        'deskripsiMenu',
        'hargaMenu',
    ];

    public function quantityProduct() {
        return $this->hasMany(QuantityProduct::class);
    }
}
