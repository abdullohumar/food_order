<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['order_id', 'menu', 'quantity', 'price', 'total'];
}
