<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_name', 'image_path', 'produk_name','produk_price','description'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
