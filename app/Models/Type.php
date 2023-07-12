<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Slugger;

class Type extends Model
{
    use HasFactory;
    use Slugger;
    public $timestamps = false;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // richiamo la funzione scritta nello Slugger

    public function getRouteKey()
    {
        return $this->slug;
    }
}
