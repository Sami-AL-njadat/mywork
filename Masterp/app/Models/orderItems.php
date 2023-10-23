<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    protected $table = 'orderitems';
    protected $fillable = [
        "quantity",
        "price",
        "orderId",
        'customerId',
        "productId"
    ];
    use HasFactory;
}
