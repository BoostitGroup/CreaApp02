<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;


    protected $fillable = [
        'Durée',
        'DateCotisation',
        'DateFin',
        'Etat',
        'adherent_id',
        'type_paiment',
    ];

    public function adherent()
    {
        return $this->belongsTo(Adherent::class);
    }
}
