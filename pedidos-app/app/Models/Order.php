<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
