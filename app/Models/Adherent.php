<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\commission;

class Adherent extends Model
{
    use HasFactory;

    protected $table='adherents';

    protected $guarded = [];

    public function adher_commis()
    {
        return $this->hasMany(Adher_Commi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
