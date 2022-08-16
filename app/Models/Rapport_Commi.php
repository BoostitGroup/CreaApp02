<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport_Commi extends Model
{
    use HasFactory;

    protected $fillable = [
        'rapport_id',
        'commission_id',

    ];
    public $table = 'rapports_commis';

    public function rapports()
    {
        return $this->belongsTo(Rapport::class);
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class);
    }
}
