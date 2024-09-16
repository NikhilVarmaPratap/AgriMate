<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    public function prods()
    {
        return $this->hasMany(Prod::class, 'f_id');
    }
}
