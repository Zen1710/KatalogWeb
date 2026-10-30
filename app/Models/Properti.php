<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function foto_property(){
        return $this->hasMany(FotoProperti::class);
    }

    public function foto_denah()
    {
        return $this->hasMany(FotoDenah::class);
    }

}
