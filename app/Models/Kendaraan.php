<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $collection ='kendaraans';
    protected $guarded =[];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'kendaraan_id');
    }
}
