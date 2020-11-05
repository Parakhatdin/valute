<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    protected $visible = [
        'id',
        'name'
    ];

    public function last_rate() {
        return $this->hasMany('App\Models\Rate')->orderByDesc('date')->first();
    }
}
