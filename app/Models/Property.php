<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    public function aminites()
    {
        return $this->belongsToMany(Aminities::class,'aminity_properties');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
