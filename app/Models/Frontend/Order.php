<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'division_id',
        'district_id',
        'zip_code',
        'message',
        'product_finalPrice',
        'pricewithcoupon',
        'is_paid',
        'payment_id',
        'transection_id'
    ];
}
