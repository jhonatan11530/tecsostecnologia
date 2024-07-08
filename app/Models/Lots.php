<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lots extends Model
{
    use HasFactory;

    protected $table = "lots";

    protected $fillable = [
        'kf_customer_Id',
        'customer_name',
        'lot_no',
        'awb',
        'carrier',
        'broker',
        'supplier',
        'shipper',
        'temp',
        'qty',
        'weight',
        'driver',
        'eta_date',
        'eta_time',
        'arrival_date',
        'arrival_time',
        'consignee',
        'product',
        'url',
        'reGel',
        'reIce',
    ];
}
