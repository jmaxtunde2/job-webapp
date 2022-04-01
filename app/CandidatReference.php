<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatReference extends Model
{
    protected $fillable = [
        'names','relation','phone','email','candidat_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class,'candidat_id')->withDefault();
    }

}
