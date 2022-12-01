<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'total',
        'tax',
        'subtotal',
        'date',
    ];
    const isInActive = 0;
    const isActive = 1;
    const isTrash = 2;
}
