<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function properti()
    {
        return $this->belongsTo(Properti::class);
    }

    public function agen()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

}
