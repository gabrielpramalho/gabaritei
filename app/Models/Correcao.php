<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correcao extends Model
{
    use HasFactory;

    public function gabarito(){
        return $this->belongsTo('App\Models\Gabarito');
    }
}
