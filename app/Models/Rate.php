<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id',
        'rate',
        'date',
    ];

    protected $visible = [
        'currency_id',
        'rate',
        'date'
    ];
}
