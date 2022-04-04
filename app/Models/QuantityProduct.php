<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuantityProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'products_id',
        'quantity'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function product() {
        return $this->hasMany(Admin::class);
    }
}
