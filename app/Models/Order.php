<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_ORDER = [
        'pending' => 'chờ xác nhận',
        'confirmed' => 'Đã xác nhận',
        'preparing_goods' => 'Đang chuẩn bị nhận hàng',
        'Shipping' => 'Chờ vận chuyển',
        'delivered' => 'Đã giao hàng',
        'canceled' => 'Đơn hàng bị hủy',
    ];
    const STATUS_PAYMENT = [
        'unpaid' => 'Chưa thanh toán',
        'paid' => 'Đã thanh toán',

    ];

    const STATUS_ORDER_PENDING = 'pending';
    const STATUS_ORDER_CONFIRMED = 'confirmed';
    const STATUS_ORDER_PREPARING_GOODS = 'preparing_goods ';
    const STATUS_ORDER_DELIVERED = 'delivered';
    const STATUS_ORDER_CANCELED = 'canceled';
    const STATUS_ORDER_UNPAID = 'unpaid';
    const STATUS_ORDER_PAID = 'paid';

    protected $fillable = [
        'user_id',
        'user_Variant_id',
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'user_note',
        'ship_user_name',
        'ship_user_email',
        'ship_user_phone',
        'ship_user_address',
        'ship_user_note',
        'status_order',
         'status_payment',
         'total_price',
          ];
}
