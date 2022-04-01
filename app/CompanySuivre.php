<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySuivre extends Model
{
    protected $fillable = [
        'recruteur_id', 'candidat_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class,'candidat_id')->withDefault();
    }
    public function recruteur() {
        return $this->belongsTo(User::class,'recruteur_id')->withDefault();
    }
}
