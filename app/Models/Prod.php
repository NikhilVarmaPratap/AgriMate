<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod extends Model
{
    use HasFactory;

    protected $fillable = ['f_id', 'product', 'market_val'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'f_id');
    }
}
