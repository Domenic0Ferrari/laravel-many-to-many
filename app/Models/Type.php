<?php

namespace App\Models;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    use Slugger;
    public $timestamps = false;

    // richiamo la funzione scritta nello Slugger
    public function getRouteKey()
    {
        return $this->slug;
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
