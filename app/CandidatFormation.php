<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatFormation extends Model
{
    protected $fillable = [
        'school', 'debut','fin','diplome_obtenue','mention','candidat_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class,'candidat_id')->withDefault();
    }
}
