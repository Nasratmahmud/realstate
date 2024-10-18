<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aminities extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function aminities(){
        return $this->belongsToMany(Property::class,'aminity_properties');
    }
}
