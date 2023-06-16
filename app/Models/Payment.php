<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'form_payment',
        'value',
        'number_card',
        'month',
        'year',
        'code',
        'ag',
        'account',
        'dg',
    ];
}
