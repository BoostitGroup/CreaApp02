<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adher_Commi extends Model
{
    use HasFactory;
    protected $fillable = [
        'adherent_id',
        'commission_id',

    ];
    public $table = 'adher_commis';

    public function adherent()
    {
        return $this->belongsTo(Adherent::class);
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class);
    }
}
