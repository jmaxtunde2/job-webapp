<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    //
    protected $fillable = [
        'title', 'langue','github','linkedIn','nbView','dob','competence','candidat_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class,'candidat_id')->withDefault();
    }

    
}
