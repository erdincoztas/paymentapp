<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'customer_address',
        'product_name',
        'product_pieces',
        'total_price',
        'seller_id'
    ];
}
