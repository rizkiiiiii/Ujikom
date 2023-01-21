<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function mobil()
    {
        return $this->hasMany(Mobil::class, 'id_merek');
    }
}
