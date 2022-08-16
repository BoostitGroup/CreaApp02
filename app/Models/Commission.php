<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\adherent;

class Commission extends Model
{
    use HasFactory;
    protected $table='commissions';

    protected $guarded = [];

    public function adher_commis()
    {
      return $this->hasMany(Adher_Commi::class);
    }
    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}
