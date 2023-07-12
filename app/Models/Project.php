<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public static function slugger($string)
    {
        // Project::slugger($title)

        // generare lo slug base
        $baseSlug = Str::slug($string);
        $i = 1;
        $slug = $baseSlug;
        // verificare se è già presente nella colonna slug del db
        // self punta a Project
        // usiamo while perchè non sappiamo quante volte dobbiamo iterare
        while (self::where('slug', $slug)->first()) {
            $slug = $baseSlug . '-' . $i;
            // se presente incrementare un contatore e concatenare il numero allo slug base
            $i++;
            // ripetere finchè non generiamo uno slug non presente
        }
        // ritornare lo slug trovato
        return $slug;
    }
}
