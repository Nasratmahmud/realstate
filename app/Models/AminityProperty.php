<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AminityProperty extends Model
{
    use HasFactory;


    public function property()
    {
        return $this->belongsTo('Property'::class,'property_id');
    }

    public function aminity(){
        return $this->belongsTo('Aminities'::class,'aminities_id');
    }
}
