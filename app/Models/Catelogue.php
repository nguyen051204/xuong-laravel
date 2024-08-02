<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catelogue extends Model
{
    use HasFactory;

    protected  $fillable=[
        'name',
        'cover',
        'gia'
        ];
    protected $casts=[
        'is_active'=>'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
