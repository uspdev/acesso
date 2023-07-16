<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Predio;

class Acesso extends Model
{
    use HasFactory;

    public function predio(){
        return $this->belongsTo(Predio::class);
    }
}
